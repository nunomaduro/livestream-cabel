<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <title>{{ $title ?? 'Page Title' }}</title>
    </head>
    <body>
        <header class="bg-gray-800 text-white py-4">
            <div class="max-w-7xl mx-auto px-6 lg:px-10">
                <div class="flex justify-between items-center">
                    <a href="{{ route('welcome') }}" class="text-xl font-semibold">PHP Todos</a>
                    <nav>
                        <ul class="flex space-x-4">
                            <li>
                                <a href="{{ route('welcome') }}" class="hover:underline">About</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>

        <div class="flex">
            <nav class="min-h-screen min-w-64 bg-gray-200">
                <ul>
                    <li>
                        <a href="{{ route('todos.list') }}" class="block p-4 hover:bg-gray-100">Todos</a>
                    </li>
                    <li>
                        <a href="{{ route('todos.create') }}" class="block p-4 hover:bg-gray-100">-- Create Todo</a>
                    </li>

                    <li>
                        <a href="{{ route('welcome') }}" class="block p-4 hover:bg-gray-100">About</a>
                    </li>
                </ul>
            </nav>

            <main>
                <div class="max-w-7xl mx-auto p-6 lg:p-10">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </body>
</html>
