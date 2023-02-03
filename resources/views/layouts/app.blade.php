<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>todo1livewire</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Open+Sans:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans txt-gray-900 text-sm">
        <header class="flex flex-col md:flex-row items-center justify-between px-8 py-4">
            <a href="#"><img src="{{asset('img/MyLogo.png')}}" class="w-10 h-10 rounded-full" alt="logo"></a>
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
                        <p class="text-xs mt-4">Here you can add your tasks and images</p>
                    </div>

                    <form action="#" method="POST" class="space-y-4 px-4 py-6">
                        <div>
                            <input type="text" class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 px-4 py-2" placeholder="Title of TODO">
                        </div>
                        <div>
                            <select name="category_add" id="category_add" class="w-full text-sm rounded-xl bg-gray-100 px-4 py-2">
                                <option value="Actegory One"> Category one</option>
                                <option value="Actegory Two"> Category two</option>
                                <option value="Actegory Three"> Category three</option>
                                <option value="Actegory Four"> Category four</option>
                            </select>
                        </div>
                        <div>
                            <textarea name="content" id="content" cols="30" rows="4" class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 px-4 py-2" placeholder="Details of TODO"></textarea>
                        </div>
                        <div class="flex items-center space-between space-x-3">
                            <button type="button" class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 -rotate-45">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                                </svg>
                                <span>Add Image</span>
                            </button>
                            <button type="submit" class="flex items-center justify-center w-1/2 h-11 text-xs bg-green-300 font-bold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3 uppercase">
                                <span>Submit</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="w-full md:w-175">
                <nav class="hidden md:flex items-center justify-between text-xs">
                    <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
                        <li><a href="#" class="border-b-4 pb-3 border-blue-300">All Todos (87)</a></li>
                        <li><a href="#" class="text-gray-400 transition duration-100 ease-in border-b-4 pb-3 hover:border-blue-300">Shopping (44)</a></li>
                        <li><a href="#" class="text-gray-400 transition duration-100 ease-in border-b-4 pb-3 hover:border-blue-300">Chores (8)</a></li>
                        <li><a href="#" class="text-gray-400 transition duration-100 ease-in border-b-4 pb-3 hover:border-blue-300">Work (25)</a></li>
                    </ul>

                    <ul class="hidden flex uppercase font-semibold border-b-4 pb-3 space-x-10">
                        <li><a href="#" class="text-gray-400 transition duration-100 ease-in border-b-4 pb-3 hover:border-blue-300">Shopping</a></li>
                        <li><a href="#" class="text-gray-400 transition duration-100 ease-in border-b-4 pb-3 hover:border-blue-300">Chores</a></li>
                        <li><a href="#" class="text-gray-400 transition duration-100 ease-in border-b-4 pb-3 hover:border-blue-300">Work</a></li>
                    </ul>
                </nav>

                <div class="mt-8">
                    {{$slot}}
                </div>
            </div>
        </main>
    </body>
</html>