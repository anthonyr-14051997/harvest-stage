@extends('layouts.connected')

@section('sidebar')
@section('table')

<div class="my-5">
  @foreach ($errors->all() as $error)
      <span class="block text-red-500">{{ $error }}</span>
  @endforeach
</div>

  <h2 class="max-w-6xl mx-auto mt-8 px-4 text-lg leading-6 font-medium text-gray-900 sm:px-6 lg:px-8">Salaires (tva comprises)</h2>

  
  
    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

      <td class="px-6 py-4">
        {{ "salaire au mois = " . $month_tva . " | " }}
      </td>

      <td class="px-6 py-4">
        {{ "salaire à l'année = " . $sum_tva . " | " }}
      </td>

      <td class="px-6 py-4 text-right">
          <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
      </td>
    </tr>

  <h2 class="max-w-6xl mx-auto mt-8 px-4 text-lg leading-6 font-medium text-gray-900 sm:px-6 lg:px-8">Salaires (sans tva)</h2>

  
    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

      <td class="px-6 py-4">
        {{ "salaire au mois = " . $month . " | " }}
      </td>

      <td class="px-6 py-4">
        {{ "salaire à l'année = " . $sum . " | " }}
      </td>

      <td class="px-6 py-4 text-right">
          <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
      </td>
    </tr>

@stop
@stop