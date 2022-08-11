<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-white">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="h-full">{{-- font-sans antialiased  --}}

{{-- --------------------------------------------------------------------------------------------------------- --}}

<div>
  <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
  <div class="relative z-40 md:hidden" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-600 bg-opacity-75"></div>

    <div class="fixed inset-0 flex z-40">
      <div class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-indigo-700">
        <div class="flex-shrink-0 flex items-center px-4">
          <a href="{{ route('dashboard') }}">
            <x-jet-application-logo class="block h-9 w-auto" />
          </a>
        </div>
        <div class="mt-5 flex-1 h-0 overflow-y-auto">
          <nav class="px-2 space-y-1">
            <!-- Current: "bg-indigo-800 text-white", Default: "text-indigo-100 hover:bg-indigo-600" -->
            <a href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="bg-indigo-800 text-white group flex items-center px-2 py-2 text-base font-medium rounded-md">
              <!-- Heroicon name: outline/home -->
              <svg class="mr-4 flex-shrink-0 h-6 w-6 text-indigo-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
              </svg>
              Accueil
            </a>

            <a href="{{ route('flows.index') }}" :active="request()->routeIs('flows.index')" class="text-indigo-100 hover:bg-indigo-600 group flex items-center px-2 py-2 text-base font-medium rounded-md">
              <!-- Heroicon name: outline/calendar -->
              <svg class="mr-4 flex-shrink-0 h-6 w-6 text-indigo-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
              Entrées/Sorties
            </a>

            <a href="{{ route('salaries.index') }}" :active="request()->routeIs('salaries.index')" class="text-indigo-100 hover:bg-indigo-600 group flex items-center px-2 py-2 text-base font-medium rounded-md">
              <!-- Heroicon name: outline/inbox -->
              <svg class="mr-4 flex-shrink-0 h-6 w-6 text-indigo-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
              </svg>
              Salaires
            </a>

            <a href="{{ route('fixeds.index') }}" :active="request()->routeIs('fixeds.index')" class="text-indigo-100 hover:bg-indigo-600 group flex items-center px-2 py-2 text-base font-medium rounded-md">
              <!-- Heroicon name: outline/inbox -->
              <svg class="mr-4 flex-shrink-0 h-6 w-6 text-indigo-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
              </svg>
              Sorties fixe
            </a>
          </nav>
        </div>
      </div>

      <div class="flex-shrink-0 w-14" aria-hidden="true">
        <!-- Dummy element to force sidebar to shrink to fit close icon -->
      </div>
    </div>
  </div>

  <!-- Static sidebar for desktop -->
  <div class="hidden md:flex md:w-64 md:flex-col md:fixed md:inset-y-0">
    <!-- Sidebar component, swap this element with another sidebar if you like -->
    <div class="flex flex-col flex-grow pt-5 bg-indigo-700 overflow-y-auto">
      <!-- Logo -->
      <div class="flex-shrink-0 flex items-center px-4">
        <a href="{{ route('dashboard') }}">
          <x-jet-application-logo class="block h-9 w-auto" />
        </a>
      </div>
      <div class="mt-5 flex-1 flex flex-col">
        <nav class="flex-1 px-2 pb-4 space-y-1">
          <!-- Current: "bg-indigo-800 text-white", Default: "text-indigo-100 hover:bg-indigo-600" -->
          <a href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="bg-indigo-800 text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            <!-- Heroicon name: outline/home -->
            <svg class="mr-4 flex-shrink-0 h-6 w-6 text-indigo-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            Accueil
          </a>

          <a href="{{ route('flows.index') }}" :active="request()->routeIs('flows.index')" class="text-indigo-100 hover:bg-indigo-600 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            <!-- Heroicon name: outline/calendar -->
            <svg class="mr-4 flex-shrink-0 h-6 w-6 text-indigo-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            Entrées/Sorties
          </a>

          <a href="{{ route('salaries.index') }}" :active="request()->routeIs('salaries.index')" class="text-indigo-100 hover:bg-indigo-600 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            <!-- Heroicon name: outline/inbox -->
            <svg class="mr-4 flex-shrink-0 h-6 w-6 text-indigo-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
            </svg>
            Salaires
          </a>

          <a href="{{ route('fixeds.index') }}" :active="request()->routeIs('fixeds.index')" class="text-indigo-100 hover:bg-indigo-600 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            <!-- Heroicon name: outline/inbox -->
            <svg class="mr-4 flex-shrink-0 h-6 w-6 text-indigo-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
            </svg>
            Sorties fixe
          </a>
        </nav>
      </div>
    </div>
  </div>

  <div class="md:pl-64 flex flex-col flex-1">
    <div class="sticky top-0 z-10 flex-shrink-0 flex h-16 bg-white shadow">
      <button type="button" class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden">
        <span class="sr-only">Open sidebar</span>
        <!-- Heroicon name: outline/menu-alt-2 -->
        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h7" />
        </svg>
      </button>
      <div class="flex-1 px-4 flex justify-between">
        <div class="flex-1 flex">
          <form class="w-full flex md:ml-0" action="#" method="GET">
            <label for="search-field" class="sr-only">Search</label>
            <div class="relative w-full text-gray-400 focus-within:text-gray-600">
              <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                <!-- Heroicon name: solid/search -->
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                </svg>
              </div>
              <input id="search-field" class="block w-full h-full pl-8 pr-3 py-2 border-transparent text-gray-900 placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-0 focus:border-transparent sm:text-sm" placeholder="Search" type="search" name="search">
            </div>
          </form>
        </div>
        <div class="ml-4 flex items-center md:ml-6">
          

          {{-- ------ se connecter --}}

            {{-- <div class="mb-3 xl:w-96">
              <select class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                  <option selected>{{ Auth::user()->name }}</option>
                  <option>
                    
                  </option>
              </select>
            </div> --}}

            <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                        @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-jet-responsive-nav-link>
                    </form>

          {{-- fin de se connecter --}}

        </div>
      </div>
    </div>

    {{-- --- verified --}}

      <div class="px-4 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
        <div class="py-6 md:flex md:items-center md:justify-between lg:border-t lg:border-gray-200">
          <div class="flex-1 min-w-0">
            <!-- Profile -->
            <div class="flex items-center">
              <img class="hidden h-16 w-16 rounded-full sm:block" src="{{ Auth::user()->profile_photo_url }}" alt="">
              <div>
                <div class="flex items-center">
                  <img class="h-16 w-16 rounded-full sm:hidden" src="{{ Auth::user()->profile_photo_url }}" alt="">
                  <h1 class="ml-3 text-2xl font-bold leading-7 text-gray-900 sm:leading-9 sm:truncate">Bonjour, {{ Auth::user()->name }}</h1>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    {{-- ---- fin de verified --}}

    <main>
      <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
          @yield('title')
          
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
          <!-- Replace with your content -->
          <div class="py-4">
            <div class="rounded-lg h-96">
              @yield('overview')

              {{-- ----- tableau --}}
              <div class="mt-8 flex-wrap">
                @yield('table')
                    

              </div>
              {{-- ------ fin de tableau --}}

            </div>
          </div>
          <!-- /End replace -->
        </div>
      </div>
    </main>
  </div>
</div>

    </body>
</html>