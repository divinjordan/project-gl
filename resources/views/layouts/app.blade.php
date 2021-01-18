<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="flex">
            <div class="w-1/5 bg-indigo-600 min-h-screen hidden md:block">
                <div class="p-4">
                    <div class="flex items-center mt-4">
                        <div class="mr-2">
                            <img class="w-12 h-12" src="img/logo-trans.svg">
                        </div>
                        <h3 class="text-2xl font-bold text-white"> EvalOnline</h3>
                    </div>
                    <div class="mt-8">
                        @php
                            $menus = [
                                'courses' => [
                                    'text' => 'Cours',
                                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>',
                                ],
                                'questions' => [
                                    'text' => 'Questions',
                                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>'
                                ],
                                'evaluations' => [
                                   'text' => 'Evaluations',
                                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>'
                                ],
                                'rooms' => [
                                    'text' => 'Salons',
                                    'link' => '',
                                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>'
                                ],
                                'students' => [
                                    'text' => 'Etudiants',
                                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>'
                                ],
                                'requests' =>[
                                    'text' => 'Demandes',
                                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>'
                                ]
                        ];
                        @endphp
                        <div>
                            @foreach ($menus as $key => $item)
                            <a href="/{{ $key }}" class="flex items-center p-2 bg-indigo-800 rounded-lg cursor-pointer mt-2">
                                <span class="text-indigo-200 mr-4 block">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    @php
                                        echo $item['icon']
                                    @endphp
                                    </svg>
                                </span>
                                <span class="font-semibold text-indigo-100">
                                    {{ $item['text'] }}
                                </span>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-4/5">
                <main class="bg-gray-100 min-h-screen">
                    <x-dashboard-bar></x-dashboard-bar>
                    {{ $slot }}
                </main>   
            </div>
        </div>
         <!-- Page Content -->
    </body>
</html>
