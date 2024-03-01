<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<style>
    .display-none {
        @apply hidden;
    }

    /* scrollbar */
    ::-webkit-scrollbar {
        width: 5px;
        height: 5px;
    }

    ::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        -webkit-border-radius: 10px;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
        -webkit-border-radius: 10px;
        border-radius: 10px;
        background: rgba(255, 255, 255, 0.3);
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
    }

    ::-webkit-scrollbar-thumb:window-inactive {
        background: rgba(255, 255, 255, 0.3);
    }
</style>
<body class="" style="background-image: url('{{ asset("assets/images/Frame 42.png") }}')">
    <nav class="sm:mx-9 mx-4">
        <div class="navbar">
            <div class="navbar-start">
              <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
                </div>
                <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                  <li><a href="/">Home</a></li>
                </ul>
              </div>
              <a class="btn btn-ghost text-xl font-bold"><svg width="30" height="30" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.75432 0.819537C7.59742 0.726821 7.4025 0.726821 7.24559 0.819537L1.74559 4.06954C1.59336 4.15949 1.49996 4.32317 1.49996 4.5C1.49996 4.67683 1.59336 4.84051 1.74559 4.93046L7.24559 8.18046C7.4025 8.27318 7.59742 8.27318 7.75432 8.18046L13.2543 4.93046C13.4066 4.84051 13.5 4.67683 13.5 4.5C13.5 4.32317 13.4066 4.15949 13.2543 4.06954L7.75432 0.819537ZM7.49996 7.16923L2.9828 4.5L7.49996 1.83077L12.0171 4.5L7.49996 7.16923ZM1.5695 7.49564C1.70998 7.2579 2.01659 7.17906 2.25432 7.31954L7.49996 10.4192L12.7456 7.31954C12.9833 7.17906 13.2899 7.2579 13.4304 7.49564C13.5709 7.73337 13.4921 8.03998 13.2543 8.18046L7.75432 11.4305C7.59742 11.5232 7.4025 11.5232 7.24559 11.4305L1.74559 8.18046C1.50786 8.03998 1.42901 7.73337 1.5695 7.49564ZM1.56949 10.4956C1.70998 10.2579 2.01658 10.1791 2.25432 10.3195L7.49996 13.4192L12.7456 10.3195C12.9833 10.1791 13.2899 10.2579 13.4304 10.4956C13.5709 10.7334 13.4921 11.04 13.2543 11.1805L7.75432 14.4305C7.59742 14.5232 7.4025 14.5232 7.24559 14.4305L1.74559 11.1805C1.50785 11.04 1.42901 10.7334 1.56949 10.4956Z" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path></svg> ToDo-Me</a>
            </div>
            <div class="navbar-start -ml-80 hidden lg:flex">
              <ul class="menu menu-horizontal px-1">
                <li><a href="/">Home</a></li>
              </ul>
            </div>
          </div>
    </nav>

    <div class="sm:mx-16 mx-8 min-h-screen grid grid-cols-1 md:grid-cols-2 mt-6 ">
        <div class="shadow-2xl rounded-sm p-6 h-fit">
            <h1 class="text-5xl font-semibold text-slate-50 mb-1">Reset password<span class="text-blue-500">.</span></h1>
            <div class="flex items-center mb-4">
                <h1>Don't have any account?</h1>
                <a class="btn btn-link" href="/register">Create</a>
            </div>
            <form class="" action="/reset/password/store" method="POST">
                @csrf
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Email</span>
                    </div>
                    <input id="email" type="email" placeholder="someone@example.app" class="input input-bordered rounded-sm w-full bg-slate-700 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </label>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">New password</span>
                    </div>
                    <input id="password" type="password" placeholder="Type your password here" class="input input-bordered rounded-sm w-full bg-slate-700 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </label>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Confirm password</span>
                    </div>
                    <input id="password_confirmation" type="password" placeholder="Type your password here" class="input input-bordered rounded-sm w-full bg-slate-700 @error('password') is-invalid @enderror"  name="password_confirmation" required autocomplete="current-password" />
                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </label>

                <div class="flex justify-center py-6 sm:mt-4">
                    <button type="submit" class="btn btn-outline btn-wide rounded-sm">Reset Password</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
