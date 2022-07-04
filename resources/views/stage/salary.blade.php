@extends('layouts.connected')

@section('sidebar')



@section('table')

  <h2 class="max-w-6xl mx-auto mt-8 px-4 text-lg leading-6 font-medium text-gray-900 sm:px-6 lg:px-8">Salaires</h2>

  

  <!-- Activity list (smallest breakpoint only) -->
  
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Titre
                </th>
                <th scope="col" class="px-6 py-3">
                    salaire
                </th>
                <th scope="col" class="px-6 py-3">
                    periode
                </th>
                <th scope="col" class="px-6 py-3">
                    nom
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
          @foreach ($salaries as $salary)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                    {{ Str::limit($salary->name, 50) }}
                </th>
                <td class="px-6 py-4">
                  {{ $salary->value }}
                </td>
                <td class="px-6 py-4">
                  {{ $salary->periode }}
                </td>
                <td class="px-6 py-4">
                  {{ $salary->user->name }}
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