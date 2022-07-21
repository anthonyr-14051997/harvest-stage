@extends('layouts.connected')

@section('sidebar')
@section('table')

<div class="my-5">
  @foreach ($errors->all() as $error)
      <span class="block text-red-500">{{ $error }}</span>
  @endforeach
</div>

  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
      <h2 class="max-w-6xl mx-auto mt-8 px-4 text-lg leading-6 font-medium text-gray-900 sm:px-6 lg:px-8">Salaires (tva comprises)</h2>
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
                      <dt class="text-sm font-medium text-gray-500 truncate">Salaire Net</dt>
                      <dd>
                        <div class="text-lg font-medium text-gray-900">{{ $flow_month_taxe }}€</div>
                      </dd>
                      <dt class="text-sm font-medium text-gray-500 truncate">CA Net</dt>
                      <dd>
                        <div class="text-lg font-medium text-gray-900">{{ $flow_taxe }}€</div>
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
      </div>
  </div>

  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="max-w-6xl mx-auto mt-8 px-4 text-lg leading-6 font-medium text-gray-900 sm:px-6 lg:px-8">Salaires (sans tva)</h2>
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
                        <dt class="text-sm font-medium text-gray-500 truncate">Salaire Brut</dt>
                        <dd>
                          <div class="text-lg font-medium text-gray-900">{{ $flow_month }}€</div>
                        </dd>
                        <dt class="text-sm font-medium text-gray-500 truncate">CA Brut</dt>
                        <dd>
                          <div class="text-lg font-medium text-gray-900">{{ $flow_year_sum }}€</div>
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
        </div>
  </div>

@stop
@stop