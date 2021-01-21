<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name')}}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="antialiased">
        <x-home-navbar> </x-home-navbar>
        <main class="flex">
            <div class="sm:text-center lg:text-left mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                <span class="block xl:inline">Créer des évaluations pour</span>
                <span class="block text-indigo-600 xl:inline"> vos formations</span>
                </h1>
                <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                    Le service evalOnline vous permet de créer rapidement vos evaluation en ligne et de les mettre à la disposition de vos etudiants.
                </p>
                <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                <div class="rounded-md shadow">
                    <a href="{{ route('register') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                        Commencer maintenant
                    </a>
                </div>
                <div class="mt-3 sm:mt-0 sm:ml-3" x-data="test()">
                    <button x-on:click="send" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 md:py-4 md:text-lg md:px-10">
                        Comment ca marche ?
                    </button>
                </div>
               
                </div>
            </div>
            <div class="lg:inset-y-0 lg:right-0 lg:w-1/2">
                <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="img/bg.jpg" alt="">
            </div>
        </main>
    <!-- This example requires Tailwind CSS v2.0+ -->
<div class="py-24 bg-white">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="lg:text-center">
<p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
 Une meilleure maniere d'evaluer
</p>
<p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
    Faites des evaluations en ligne precises et efficaces.
</p>
</div>

<div class="mt-10">
<dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
  <div class="flex">
    <div class="flex-shrink-0">
      <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
        <!-- Heroicon name: globe-alt -->
        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
        </svg>
      </div>
    </div>
    <div class="ml-4">
      <dt class="text-lg leading-6 font-medium text-gray-900">
        Evaluer vos etudiants partout
      </dt>
      <dd class="mt-2 text-base text-gray-500">
        En effet vos etudiant peuvent avoir acces a vos evaluation partout dans le monde. Internationalisez vos formation.
      </dd>
    </div>
  </div>

  <div class="flex">
    <div class="flex-shrink-0">
      <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
        <!-- Heroicon name: scale -->
        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
        </svg>
      </div>
    </div>
    <div class="ml-4">
      <dt class="text-lg leading-6 font-medium text-gray-900">
        Des evaluations reglementaires
      </dt>
      <dd class="mt-2 text-base text-gray-500">
        Les questions sont generees de maniere aleatoire. Ainsi vos evaluations seront corrects et reglementaires.
      </dd>
    </div>
  </div>

  <div class="flex">
    <div class="flex-shrink-0">
      <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
        <!-- Heroicon name: lightning-bolt -->
        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
        </svg>
      </div>
    </div>
    <div class="ml-4">
      <dt class="text-lg leading-6 font-medium text-gray-900">
        Des evaluations instantannees.
      </dt>
      <dd class="mt-2 text-base text-gray-500">
        Beneficiez de nos systeme de salon d'evalution. Vos etudiants passent vos evaluation tous au meme moment.
      </dd>
    </div>
  </div>

  <div class="flex">
    <div class="flex-shrink-0">
      <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
        <!-- Heroicon name: annotation -->
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
      </div>
    </div>
    <div class="ml-4">
      <dt class="text-lg leading-6 font-medium text-gray-900">
        Un meilleure suivi
      </dt>
      <dd class="mt-2 text-base text-gray-500">
        Vous pouvez suivre vos evaluations en temps reel. Vous avez donc un controle total sur vos evaluations.
      </dd>
    </div>
  </div>
</dl>
</div>
</div>
</div>
<div class="bg-gray-100 border-t border-gray-100"> 
<div class="max-w-7xk mx-auto px-4 py-12 flex justify-center">
    <span class="text-gray-600"> Copyright &copy EvalOnline 2020</span>
</div>
</div> 
    </body>
</html>
