<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use ZipArchive;

class RestoreController extends Controller
{
    public function restore(Request $request)
    {
        // Validasi bahwa file yang diunggah adalah file zip
        $validator = Validator::make($request->all(), [
            'backup_file' => 'required|mimes:zip',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Simpan file zip yang diunggah ke storage Laravel
        $zipPath = $request->file('backup_file')->storeAs('temp', 'backup.zip');

        // Ekstrak file zip
        $zip = new ZipArchive;
        $zip->open(storage_path('app/'.$zipPath));
        $extractPath = storage_path('app/temp/extracted');
        $zip->extractTo($extractPath);
        $zip->close();

        // Baca data dari file histories.csv
        $csvFile = $extractPath . '/histories.csv';
        if (!file_exists($csvFile)) {
            return redirect()->back()->withErrors(['backup_file' => 'Invalid backup file format.'])->withInput();
        }

        // Dapatkan nama tabel dari nama file CSV
        $tableName = 'histories';

        // Baca data dari file CSV
        $csvData = array_map('str_getcsv', file($csvFile));

        // Hapus data existing dari tabel
        DB::table($tableName)->truncate();

        // Ambil baris pertama sebagai header
        $headers = array_shift($csvData);

        // Insert data baru dari file CSV
        foreach ($csvData as $row) {
            $data = array_combine($headers, $row);
            // Simpan data menggunakan model atau menggunakan DB facade
            // Contoh jika menggunakan DB facade:
            DB::table($tableName)->insert($data);
        }

        // Hapus file zip dan folder ekstraksi setelah selesai
        Storage::delete($zipPath);
        Storage::deleteDirectory('temp/extracted');

        return redirect()->back()->with('success', 'Database restored successfully.');
    }
}
