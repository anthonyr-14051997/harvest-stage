@extends('layouts.connected')

@section('sidebar')
{{-- start --}}

{{-- <div class="mb-3 xl:w-96">
    <select class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
        <option selected>Toutes les catégories</option>

        @foreach ($categories as $category)
        <option value="1">{{ __('Se connecter') }}</option>
        @endforeach

    </select>
</div> --}}

@section('overview')

    {{-- ---------- overview --}}

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-lg leading-6 font-medium text-gray-900">Balances</h2>
        <div class="mt-2 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
            <!-- Card -->

            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                    <!-- Heroicon name: outline/scale -->
                    <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                    </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 truncate">Account balance</dt>
                        <dd>
                        <div class="text-lg font-medium text-gray-900">$30,659.45</div>
                        </dd>
                    </dl>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-5 py-3">
                <div class="text-sm">
                    <a href="#" class="font-medium text-cyan-700 hover:text-cyan-900"> View all </a>
                </div>
            </div>
        </div>

        <!-- More items... -->
        </div>
    </div>

    {{-- ------ fin de overview --}}

@stop
{{-- end --}}
@stop