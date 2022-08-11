@extends('layouts.connected')

@section('sidebar')
@section('table')

    @section('title')
    <h2 class="text-2xl font-semibold text-gray-900">Editer</h2>
    @stop

    <div class="my-5">
        @foreach ($errors->all() as $error)
            <span class="block text-red-500">{{ $error }}</span>
        @endforeach
    </div>
    <div class="my-5">
        @if(session('success'))
            {{ session('success') }}
        @endif
    </div>

    {{-- form edit --}}
    <form action="{{ route('flows.update', $flow) }}" method="post" enctype="multipart/form-data" class="form_edit m-6">
        @method('put')
        @csrf
        <div class="border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
            <label for="name" class="block text-sm font-medium text-gray-700">Titre</label>
            <input type="text" name="title" id="title_update" value="{{ $flow->name }}" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Votre titre" required>
        </div>
        <div class="border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
            <label for="price" class="block text-sm font-medium text-gray-700">Valeur</label>
            <div class="mt-1 relative rounded-md shadow-sm">
            <input type="number" step="0.01" name="value" id="value_update" value="{{ $flow->value }}" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0.00" aria-describedby="price-currency" required>
            </div>
        </div>
        <div class="border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
        <label class="block text-sm font-medium text-gray-700">Catégorie</label>
        <div class="mt-1 relative rounded-md shadow-sm">
            <input type="text" id="categories_update" name="categories" @foreach ($categories as $category) value="{{ $category->name }}" @endforeach class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Votre catégorie" aria-describedby="catégories">
        </div>
        </div>
        <div class="border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            @foreach ($categories as $category)
            <td class="px-6 py-4">
                <button type="button" class="all_category inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ $category->name }}
                </button>
            </td>
            @endforeach
            </tr>
        </div>
        <div class="border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
        <select name="flow" class="form-select_update appearance-none block w-full text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
            <option id="inflow_update" value="inflow" name="inflow" @if (old('flow') == "inflow" ) {{ 'selected' }} @endif>Entrée</option>
            <option id="outflow_update" value="outflow" name="outflow" @if (old('flow') == "outflow" ) {{ 'selected' }} @endif>Sortie</option>
        </select>
        {{-- <input type="text" id="flow" name="" value="" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Entrée ou sortie" aria-describedby="type"> --}}
        </div>
        <button type="submit" class="submit_btn inline-flex justify-center w-full rounded-full mt-6 shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        <!-- Heroicon name: outline/plus-sm -->
        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
        </svg>
        </button>
    </form>

    <script type="text/javascript">

        const cat_add = document.querySelector('#categories_update');
        const cat_all = document.querySelectorAll('.all_category');

        // category
    
        cat_all.forEach(element => {
          element.addEventListener('click', function () {
            if(cat_add.value != "" && cat_add.value.substr(-2) != ", ") {
              cat_add.value += ", ";
              cat_add.value += element.firstChild.nodeValue.trim() + ", ";
            } else {
              cat_add.value += element.firstChild.nodeValue.trim() + ", ";
            }
          })
        })
      
    </script>

@stop
@stop