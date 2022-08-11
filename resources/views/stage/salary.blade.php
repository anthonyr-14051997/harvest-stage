@extends('layouts.connected')

@section('sidebar')
@section('table')

@section('title')
    <h2 class="text-2xl font-semibold text-gray-900">Salaire</h2>
@stop

<div class="my-5">
  @foreach ($errors->all() as $error)
      <span class="block text-red-500">{{ $error }}</span>
  @endforeach
</div>
<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
  <thead>
    <tr>
      <th scope="col" class="px-6 py-3">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="max-w-6xl mx-auto mt-8 px-4 text-lg leading-6 font-medium text-gray-900 sm:px-6 lg:px-8">Salaires (tva comprises)</h2>
            <div class="mt-2 grid grid-cols-3 gap-5 sm:grid-cols-4 lg:grid-cols-6">
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
      </th>
      <th scope="col" class="px-6 py-3">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
              <h2 class="max-w-6xl mx-auto mt-8 px-4 text-lg leading-6 font-medium text-gray-900 sm:px-6 lg:px-8">Salaires (sans tva)</h2>
              <div class="mt-2 grid grid-cols-3 gap-5 sm:grid-cols-4 lg:grid-cols-6">
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
      </th>
      <th scope="col" class="px-6 py-3">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
              <h2 class="max-w-6xl mt-8 px-4 text-lg leading-6 font-medium text-gray-900 sm:px-6 lg:px-8">Salaire potentielle</h2>
              <div class="mt-2 mb-6 grid grid-cols-3 gap-5 sm:grid-cols-4 lg:grid-cols-6">
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
                              <dd>
                                <div class="text-lg font-medium text-gray-900">{{ $flow_month_fullOut }}€</div>
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
      </th>
    </tr>
  </thead>
</table>

<form method="POST" action="{{ route('salaries.store') }}" x-data>
  @csrf
  <div class="border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
    <p class="text-2xl font-semibold text-gray-900">Entrer l'épargne que vous souhaitez déduire de votre salaire</p>
    <div class="mt-1 relative rounded-md shadow-sm">
      <input type="text" id="epargne_flow" name="epargne_flow" value="Votre salaire : {{ $flow_month_fullOut }}€" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Entrer votre épargne">
      <input type="text" id="epargne" name="epargne" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="*Entrer votre épargne*">
    </div>
  </div>
  <button type="submit" class="submit_btn inline-flex justify-center w-full rounded-full mt-6 shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
    Epargner
  </button>
</form>

@stop
@stop