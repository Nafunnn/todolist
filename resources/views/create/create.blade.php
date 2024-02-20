@extends('templates.master')

@section('body')
<h1 class="my-6 text-2xl font-semibold dark:text-slate-400">Add New To Do</h1>
    <form action="/create/store" method="POST">
        @csrf
        <div class="grid grid-cols-3 gap-8">
            <div>
                <h1 class="dark:text-slate-400 font-semibold mb-4">Title</h1>
                <input required name="title" type="text" placeholder="Type here" class="input input-bordered rounded-sm dark:bg-neutral dark:border-slate-400 dark:text-slate-400 w-full max-w-xs" />
            </div>
            <div class="row-span-2">
                <h1 class="dark:text-slate-400 font-semibold mb-4">Description</h1>
                <textarea required class="input input-bordered rounded-sm dark:bg-neutral dark:border-slate-400 dark:text-slate-400 h-4/5 w-full max-w-xs" name="desc" id="" placeholder="Type description here"></textarea>
            </div>

            <div>
                <h1 class="dark:text-slate-400 font-semibold mb-4">Priority</h1>
                <select required class="select select-bordered rounded-sm dark:bg-neutral dark:text-slate-400 w-full max-w-xs" name="priority" id="">
                    <option value="Low">Low</option>
                    <option value="Medium">Medium</option>
                    <option value="High">High</option>
                </select>
            </div>
            <div>
                <h1 class="dark:text-slate-400 font-semibold mb-4">Due Date</h1>
                <input required name="due_date" id="tanggal" type="date" placeholder="Type here" class="input input-bordered rounded-sm dark:bg-neutral dark:border-slate-400 dark:text-slate-400 w-full max-w-xs" />
            </div>
            <div>
                <h1 class="dark:text-slate-400 font-semibold mb-4">Status</h1>
                <select required class="select select-bordered rounded-sm dark:bg-neutral dark:text-slate-400 w-full max-w-xs" name="stat" id="">
                    <option value="Not Done">Not Done</option>
                    <option value="To Do">To Do</option>
                    <option value="Need Review">Need Review</option>
                </select>
            </div>
        </div>
        <div class="flex gap-4 mt-8">
            <input class="btn border-slate-300 dark:btn-neutral dark:border-none" type="submit" value="Create">
            <a class="btn btn-outline btn-error" href="/home">Cancel</a>
        </div>
    </form>

    <script>
        // Dapatkan elemen input tanggal
        var inputTanggal = document.getElementById('tanggal');

        // Dapatkan tanggal saat ini
        var tanggalSekarang = new Date();

        // Tambahkan 10 hari ke tanggal saat ini
        tanggalSekarang.setDate(tanggalSekarang.getDate() + 10);

        // Format tanggal ke dalam format yang dapat diterima oleh input tanggal
        var tanggalBatasMaksimum = tanggalSekarang.toISOString().split('T')[0];

        // Set batas minimum input tanggal ke tanggal saat ini
        inputTanggal.min = new Date().toISOString().split('T')[0];

        // Set batas maksimum input tanggal ke 10 hari ke depan
        inputTanggal.max = tanggalBatasMaksimum;
      </script>
@endsection
