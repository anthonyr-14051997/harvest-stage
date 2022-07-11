@extends('layouts.connected')

@section('sidebar')
@section('table')

  @section('title')
  <h2 class="text-2xl font-semibold text-gray-900">Entrées</h2>
  @stop

  <div class="my-5">
    @foreach ($errors->all() as $error)
        <span class="block text-red-500">{{ $error }}</span>
    @endforeach
  </div>

  <form action="{{ route('inflows.store') }}" method="post" enctype="multipart/form-data" class="m-6">
      @csrf
      <div class="border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
          <label for="name" class="block text-sm font-medium text-gray-700">Titre</label>
          <input type="text" name="title" id="title" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Votre titre">
      </div>
      <div class="border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
          <label for="price" class="block text-sm font-medium text-gray-700">Valeur</label>
          <div class="mt-1 relative rounded-md shadow-sm">
            <input type="text" name="value" id="value" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0.00" aria-describedby="price-currency">
          </div>
      </div>
      <div class="border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
        <select class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
          <option selected>Toutes les catégories</option>
          
          @foreach ($categories as $category)
          <option value="{{ $category->id }}">{{ Str::limit($category->name, 50) }}</option>
          @endforeach
      
        </select>
      </div>
      <div class="border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
        <button type="button" class="inline-flex items-center p-3 border border-transparent rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          <!-- Heroicon name: outline/plus-sm -->
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
          </svg>
        </button>
        <span class="">Créer mon entrée</span>
      </div>
  </form>

  

  <!-- Activity list (smallest breakpoint only) -->

  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                  <div class="mb-3 xl:w-76">
                    <select class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                      <option selected>Nom</option>
                      <option value="1">A - Z</option>
                      <option value="1">Z - A</option>
                    </select>
                  </div>
                </th>
                <th scope="col" class="px-6 py-3">
                  <div class="mb-3 xl:w-76">
                    <select class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                      <option selected>Titre</option>
                      <option value="1">A - Z</option>
                      <option value="1">Z - A</option>
                    </select>
                  </div>
                </th>
                <th scope="col" class="px-6 py-3">
                  <div class="mb-3 xl:w-76">
                    <select class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                      <option selected>Date</option>
                      <option value="1">Plus récent</option>
                      <option value="1">Moins récent</option>
                    </select>
                  </div>
                </th>
                <th scope="col" class="px-6 py-3">
                  <div class="mb-3 xl:w-76">
                    <select class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                      <option selected>Valeur</option>
                      <option value="1">Croissant</option>
                      <option value="1">Décroissant</option>
                    </select>
                  </div>
                </th>
                <th scope="col" class="px-6 py-3">
                  <div class="mb-3 xl:w-76">
                    <select class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                      <option selected>Toutes les catégories</option>
                      
                      @foreach ($categories as $category)
                      <option value="1">{{ Str::limit($category->name, 15) }}</option>
                      @endforeach
                  
                    </select>
                  </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
          @foreach ($inflows as $inflow)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                    {{ $inflow->user->name }}
                </th>
                <td class="px-6 py-4">
                  {{ Str::limit($inflow->name, 25) }}
                </td>
                <td class="px-6 py-4">
                  {{ $inflow->created_at }}
                </td>
                <td class="px-6 py-4">
                  {{ $inflow->value }}
                </td>
                <td class="px-6 py-4">
                  {{ $inflow->category }}
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
          @endforeach
        </tbody>
    </table>
  </div>

  <nav class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200" aria-label="Pagination">
    <div class="flex-1 flex justify-between">
      <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:text-gray-500"> Previous </a>
      <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:text-gray-500"> Next </a>
    </div>
  </nav>

@stop
@stop