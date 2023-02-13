<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>todoapp</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Open+Sans:wght@400;600;700&display=swap">

        @livewireStyles

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans txt-gray-900 text-sm">
        <header class="flex flex-col md:flex-row items-center justify-between px-8 py-4">
            <a href="#"><img src="{{asset('img/todoAppLogo.png')}}" class="w-20 h-20 rounded-full border border-green-300" alt="logo"></a>
            <div class="flex items-center mt-2 md:mt-0">
                @if (Route::has('login'))
                    <div class="px-6 py-4">
                        @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a href="{{route('logout')}}"
                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
                <a href="#">
                    <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp" alt="avatar" class="w-10 h-10 rounded-full">
                </a>
            </div>
        </header>
        <main class="container mx-auto flex flex-col md:flex-row px-8" style="max-width:1200px">
            <div class="w-70 mx-auto md:mr-5 md:mx-0">
                <div class="border-2 border-gray-200 rounded-xl md:mt-16 md:sticky md:top-8 ">
                    <div class="text-center px-6 py-2 pt-6">
                        <h3 class="font-semibold text-base">Add a TODO</h3>
                        @auth
                            <p class="text-xs mt-4">Here you can add your tasks and images</p>
                        @else
                              Login to add a TODO!
                        @endauth
                    </div>

                    @auth
                        <livewire:create-todo/>
                    @else
                        <div class="flex items-center space-between space-x-3 my-6 mx-3">
                            <a href="{{route('login')}}" class="flex items-center justify-center w-1/2 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3 uppercase">
                                <span>Login</span>
                            </a>
                            <a href="{{route('register')}}" class="flex items-center justify-center w-1/2 text-xs bg-green-300 font-bold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3 uppercase">
                                <span>Register</span>
                            </a>
                        </div>
                    @endauth

                </div>
            </div>
            <div class="w-full md:w-175">
                <livewire:status-filters/>

                <div class="mt-8">
                    {{$slot}}
                </div>
            </div>
        </main>
        @livewireScripts
    </body>
</html>
