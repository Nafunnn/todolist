@extends('templates.master')

@section('body')
<h1 class="my-6 text-2xl font-semibold dark:text-slate-200">Todo List Settings</h1>
<div class="grid sm:grid-cols-2 md:grid-cols-3 gap-8">
    <div>
        <h1 class="text-xl dark:text-slate-400">History Backup</h1>
        <div class="divider dark:divider-error"></div>
        <div class="">
            <p class="text-sm mb-4 text-slate-500">Press the button below to download all the data in the histories table. The download file will be a zip containing a .csv format file with the title histories.</p>

            <a href="/backup" class="btn w-full btn-outline dark:border-slate-400 dark:text-slate-400 dark:hover:bg-slate-200 dark:hover:text-slate-950 rounded-md">Backup Histories Data</a>
        </div>
    </div>
    <div>
        <h1 class="text-xl dark:text-slate-400">History Restore</h1>
        <div class="divider dark:divider-error"></div>
        <div>
            <p class="text-sm mb-4 text-slate-500">Please select the file to restore the history data table. The only files span, be careful when restoring because the last data in the database will be deleted and then filled with data from the restore file.</p>

            <form action="/restore" method="POST" class="w-full" enctype="multipart/form-data">
                @csrf
                <div class="form-control w-full">
                    <label class="label cursor-pointer w-full">
                        <input class="file-input file-input-bordered w-full rounded-md dark:text-slate-400 dark:bg-slate-600" required type="file" name="backup_file" id="backup_file">
                    </label>
                </div>
                <!-- Tambahkan pesan validasi di sini jika diperlukan -->
                <button type="submit" class="btn btn-error w-full btn-outline rounded-md">Restore Histories Data</button>
            </form>
        </div>
    </div>
    <div>
        <h1 class="text-xl dark:text-slate-400">Seeders Database</h1>
        <div class="divider dark:divider-error"></div>
        <div>
            <p class="text-sm mb-4 text-slate-500">Important!! Please run seeder the first time you use this system, don't use it continuously because it is used to fill in the priorities table and statuses table before starting todo creation after deleting all databases.</p>
            <a class="btn w-full btn-outline rounded-md mb-4 dark:border-slate-400 dark:text-slate-400 dark:hover:bg-slate-200 dark:hover:text-slate-950" href="/run-seeder">Run Seeders</a>
        </div>
    </div>
</div>
@endsection
