<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Process;
use ZipArchive;

class BackupController extends Controller
{
    public function backup()
    {
        $fileName = 'backup_' . date('Y-m-d_H-i-s');
        $csvFiles = [];

        // Daftar semua tabel yang ingin di-backup
        $tables = ['histories'];

        foreach ($tables as $table) {
            // Ambil semua kolom kecuali kolom 'id'
            $data = DB::table($table)->select('*')->get();

            $csvFilePath = storage_path('app/backups/' . $table . '.csv');
            $file = fopen($csvFilePath, 'w');

            // Tulis judul kolom ke file CSV
            fputcsv($file, array_keys((array) $data->first()));

            // Isi file CSV dengan data dari tabel
            foreach ($data as $row) {
                fputcsv($file, (array) $row);
            }

            // Tutup file CSV
            fclose($file);

            // Simpan file CSV ke dalam array
            $csvFiles[] = $csvFilePath;
        }

        // Buat file ZIP
        $zipFilePath = storage_path('app/backups/' . $fileName . '.zip');
        $zip = new ZipArchive();
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
            throw new \RuntimeException('Failed to create ZIP file');
        }

        // Tambahkan file CSV ke dalam file ZIP
        foreach ($csvFiles as $csvFile) {
            $zip->addFile($csvFile, basename($csvFile));
        }

        // Tutup file ZIP
        $zip->close();

        // Hapus file CSV setelah di-zip
        foreach ($csvFiles as $csvFile) {
            unlink($csvFile);
        }

        // Unduh file ZIP
        return response()->download($zipFilePath)->deleteFileAfterSend(true);
    }
}
