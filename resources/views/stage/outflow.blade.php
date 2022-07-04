@extends('layouts.connected')

@section('sidebar')



@section('table')

  <h2 class="max-w-6xl mx-auto mt-8 px-4 text-lg leading-6 font-medium text-gray-900 sm:px-6 lg:px-8">Sorties</h2>

  <div class="mb-3 xl:w-96">
    <select class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
      <option selected>Toutes les catégories</option>
      
      @foreach ($categories as $category)
      <option value="1">{{ $category->name }}</option>
      @endforeach
  
    </select>
  </div>

  <!-- Activity list (smallest breakpoint only) -->

  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    value
                </th>
                <th scope="col" class="px-6 py-3">
                    name
                </th>
                <th scope="col" class="px-6 py-3">
                    periode
                </th>
                <th scope="col" class="px-6 py-3">
                    date
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
          @foreach ($outflows as $outflow)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                    {{ $outflow->value }}
                </th>
                <td class="px-6 py-4">
                  {{ $outflow->name }}
                </td>
                <td class="px-6 py-4">
                  {{ $outflow->periode }}
                </td>
                <td class="px-6 py-4">
                  {{ $outflow->created_at }}
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