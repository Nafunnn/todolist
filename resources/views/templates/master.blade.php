<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="">
    @vite('resources/css/app.css')
    <title>Document</title>
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
</head>
<body class="dark:bg-slate-800">
    {{-- NAVBAR --}}
    <header>
        <nav>
            <div class="navbar dark:bg-slate-700">
                <div class="navbar-start">
                    <div class="dropdown">
                    <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
                    </div>
                    <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                        <li><a href="/home">@if (Auth::user()->role == 'admin')
                            User
                        @else
                            My
                        @endif Todo</a></li>
                        <li><a href="/dashboard">Statistic</a></li>
                        @if (Auth::user()->role == 'admin')
                        <li><a href="/history">History</a></li>
                        @endif
                        @if (Auth::user()->role == 'user')
                        <li><a href="/create">New Todo</a></li>
                        @endif
                        <li><a href="/trash">Trash</a></li>
                    </ul>
                </div>
                    <a class="btn btn-ghost text-xl dark:text-slate-300">ToDo</a>
                </div>
                <div class="navbar-center hidden lg:flex dark:text-slate-300">
                    <ul class="menu menu-horizontal px-1">
                        <li><a href="/home">My Todo</a></li>
                        <li><a href="/dashboard">Statistic</a></li>
                        @if (Auth::user()->role == 'admin')
                        <li><a href="/history">History</a></li>
                        @endif
                        @if (Auth::user()->role == 'user')
                        <li><a href="/create">New Todo</a></li>
                        @endif
                        @if (Auth::user()->role == 'admin')
                            <div class="dropdown dropdown-end">
                                <li tabindex="0" role="button" class=""><a>Trash</a></li>
                                <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 dark:bg-neutral rounded-box w-52">
                                <li><a href="/trash">Todo</a></li>
                                <li><a href="/trash/user">User</a></li>
                                </ul>
                            </div>
                        @else
                        <li><a href="/trash">Trash</a></li>
                        @endif
                  </ul>
                </div>
                <div class="navbar-end gap-8 dark:text-slate-300">
                    <label class="swap swap-rotate">

                        <!-- this hidden checkbox controls the state -->
                        <input type="checkbox" class="theme-controller hidden " value="synthwave" />

                        <!-- sun icon -->
                        <svg class="sun swap-on fill-current w-5 h-5 " xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24">
                            <path
                                d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z" />
                        </svg>

                        <!-- moon icon -->
                        <svg class="moon swap-off fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24">
                            <path
                                d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z" />
                        </svg>

                    </label>
                    <div class="dropdown dropdown-end">
                        <div tabindex="0" role="button" class="btn-sm btn text-xs sm:btn m-1 dark:btn-neutral"><img class="rounded-full w-6 sm:w-8" src="{{ asset(Auth::user()->image) }}" alt=""><h1 class="text-xs sm:text-sm">{{ \Illuminate\Support\Str::limit(Auth::user()->name, 10) }}</h1></div>
                        <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow dark:bg-neutral bg-base-100 rounded-box w-40 sm:w-52">
                          <li>
                                <a href="/profile">Profile</a>
                                @if (Auth::user()->role == 'admin')
                                    <a href="/backup">Backup</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="" style="display: none">
                                    @csrf
                                </form>
                          </li>
                        </ul>
                      </div>
                </div>
            </div>
        </nav>
    </header>
    {{-- NAVBAR --}}

    <div class="mx-12 min-h-screen">
        @yield('body')
    </div>

    {{-- FOOTER --}}
    <footer class="footer footer-center p-4 bg-base-300 text-base-content">
        <aside>
          <p>Copyright © 2024 - All right reserved by Sintya Faiza</p>
        </aside>
      </footer>
    {{-- FOOTER --}}

    <script>
        // Icons
        const sunIcon = document.querySelector(".sun");
        const moonIcon = document.querySelector(".moon");
        // Theme Vars
        const userTheme = localStorage.getItem("theme");
        const systemTheme = window.matchMedia("(prefers-color-scheme: dark)").matches;
        // Icon Toggling
        const iconToggle = () => {
            moonIcon.classList.toggle("display=none");
            sunIcon.classList.toggle("display=none");
        }
        // Initial Theme Check
        const themeCheck = () => {
            if (userTheme === "dark" || (!userTheme & systemTheme)) {
                document.documentElement.classList.add("dark");
                moonIcon.classList.add("display-none");
                return;
            }
            sunIcon.classList.add("display-none");
        }
        // Manual Theme Switch
        const themeSwitch = () => {
            if (document.documentElement.classList.contains("dark")) {
                document.documentElement.classList.remove("dark");
                localStorage.setItem("theme", "light");
                iconToggle();
                return;
            }
            document.documentElement.classList.add("dark");
            localStorage.setItem("theme", "dark");
            iconToggle();
        }
        // Call theme switch on clicking buttons
        sunIcon.addEventListener("click", () => {
            themeSwitch();
        })
        moonIcon.addEventListener("click", () => {
            themeSwitch();
        })
        // Invoke theme check on initial load
        themeCheck();
    </script>
</body>
</html>
