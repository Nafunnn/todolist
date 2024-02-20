<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    <style>
        .display-none {
            @apply hidden;
        }

        /* scrollbar */
        ::-webkit-scrollbar {
            width: 4px;
            height: 4px;
        }

        ::-webkit-scrollbar-track {
            -webkit-box-shadow: ;
            -webkit-border-radius: px;
            border-radius: px;
            background: rgb(203, 213, 225)
        }

        ::-webkit-scrollbar-thumb {
            -webkit-border-radius: ;
            border-radius: ;
            background: rgb(15, 23, 42);
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
        }

        ::-webkit-scrollbar-thumb:window-inactive {
            background: rgba(255, 255, 255, 0.3);
        }
    </style>

</head>
<body class="dark:bg-slate-900">
    {{-- NAVBAR --}}
    <header>
        <nav>
            <div class="navbar dark:bg-slate-800">
                <div class="navbar-start">
                    <div class="dropdown">
                    <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
                    </div>
                    <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">

                    </ul>
                </div>
                    <a class="btn btn-ghost text-xl dark:text-slate-300">ToDo</a>
                </div>
                <div class="navbar-center hidden lg:flex dark:text-slate-300">
                    <ul class="menu menu-horizontal px-1">

                  </ul>
                </div>
                <div class="navbar-end gap-8 dark:text-slate-300">
                    <label class="swap swap-rotate">

                        <!-- this hidden checkbox controls the state -->
                        <input type="checkbox" class="theme-controller hidden" value="synthwave" />

                        <!-- sun icon -->
                        <svg class="sun swap-on fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg"
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
                    <div class="dropdown dropdown-end dark:text-slate-200 ">
                        <a href="/login" class="btn rounded-sm btn-ghost">Login</a>
                        <a href="/register" class="btn btn-outline rounded-sm dark:border-white dark:text-white dark:hover:bg-slate-200 dark:hover:text-slate-800">Register</a>
                      </div>
                </div>
            </div>
        </nav>
    </header>
    {{-- NAVBAR --}}
    <div class="bg-cover min-h-screen" >
        <div class="bg-black dark:bg-slate-800 min-h-screen flex items-center">
            <div class="w-1/2 mx-24">
                <div class="">
                    <h1 class="text-slate-200 dark:text-slate-400 mb-2">WELCOME TO MYTODO WEBSITE</h1>
                    <h1 class="mb-4 dark:text-slate-200 text-slate-100 font-bold text-6xl w-3/5">Manage Your Daily To-Do</h1>
                    <p class="text-slate-200 dark:text-slate-400"><span class="font-semibold">My Todo</span> Don't let busyness beat you. Manage your time and prioritize wisely through your list.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="m-24">
        <div>
            <h1 class="text-4xl font-bold dark:text-slate-200 mb-2">Why choose My Todo Website?</h1>
            <p class="text-slate-500 dark:text-slate-400">We don't just remind you of your assignments, but we also help increase your productivity.</p>
        </div>
        <div class="border-b-4 border-slate-800 dark:border-slate-200 w-1/12 my-12"></div>
        <div class="grid grid-cols-3 gap-12">
            <div>
                <h1 class="text-xl font-bold dark:text-slate-200">SIMPLE DESIGN</h1>
                <p class="mt-2 dark:text-slate-400 text-slate-500">Our simple design offers simplicity that makes it easy for users to focus on their main tasks without confusion. With a clean and intuitive interface, users can easily interact with our products with high efficiency.</p>
            </div>
            <div>
                <h1 class="text-xl font-bold dark:text-slate-200">STATISTICS</h1>
                <p class="mt-2 dark:text-slate-400 text-slate-500">Strong statistics provide a solid foundation for your ongoing strategy, helping you measure progress and achieve your goals more effectively.</p>
            </div>
            <div>
                <h1 class="text-xl font-bold dark:text-slate-200">LOREM</h1>
                <p class="mt-2 dark:text-slate-400 text-slate-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt dolor architecto impedit animi debitis enim, ipsum perspiciatis esse voluptates facilis!</p>
            </div>
        </div>
        <div class="my-6 flex justify-center">
            <a href="" class="btn btn-outline rounded-sm dark:bg-white btn-wide">Get Started</a>
        </div>
    </div>
    <div class="bg-cover" style="background-image: url('/assets/images/compro2.jpeg')">
        <div class="bg-black dark:bg-slate-900 dark:opacity-95 opacity-85">
            <div class="mx-24 py-24">
                <div>
                    <h1 class="text-4xl font-bold text-slate-200">Lorem ipsum dolor sit.</h1>
                    <p class="text-slate-400">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
                <div class="border-b-4 border-slate-200 w-1/12 my-12"></div>
                <div class="grid grid-cols-6 gap-8 text-center text-slate-200">
                    <h1>Lorem, ipsum.</h1>
                    <h1>Lorem, ipsum.</h1>
                    <h1>Lorem, ipsum.</h1>
                    <h1>Lorem, ipsum.</h1>
                    <h1>Lorem, ipsum.</h1>
                    <h1>Lorem, ipsum.</h1>
                </div>
            </div>
        </div>
    </div>
    <div>

    </div>



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
