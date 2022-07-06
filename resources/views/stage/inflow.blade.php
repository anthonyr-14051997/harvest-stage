@extends('layouts.connected')

@section('sidebar')



@section('table')

  <h2 class="max-w-6xl mx-auto mt-8 px-4 text-lg leading-6 font-medium text-gray-900 sm:px-6 lg:px-8">Entrées</h2>

  <div class="my-5">
    @foreach ($errors->all() as $error)
        <span class="block text-red-500">{{ $error }}</span>
    @endforeach
  </div>

  <form action="{{ route('inflows.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
          <label for="name" class="block text-xs font-medium text-gray-900">Titre</label>
          <input type="text" name="title" id="title" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" placeholder="Votre titre">
      </div>
      <div>
          <label for="price" class="block text-sm font-medium text-gray-700">Valeur</label>
          <div class="mt-1 relative rounded-md shadow-sm">
            <input type="text" name="value" id="value" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0.00" aria-describedby="price-currency">
          </div>
      </div>
      <div class="mb-3 xl:w-76">
        <select class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
          <option selected>Toutes les catégories</option>
          
          @foreach ($categories as $category)
          <option value="{{ $category->id }}">{{ Str::limit($category->name, 7) }}</option>
          @endforeach
      
        </select>
      </div>
      <div>
          <button class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-black outline-none">
              Créer mon entrée
          </button>
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