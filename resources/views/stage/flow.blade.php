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
    
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="modal_">
      <div id="modal_bg" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
      <div class="fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0">
          <div class="relative bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-sm sm:w-full sm:p-6">
            <form action="{{ route('flows.store') }}" method="post" enctype="multipart/form-data" class="form m-6">
              @csrf
              <div class="border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                  <label for="name" class="block text-sm font-medium text-gray-700">Titre</label>
                  <input type="text" name="title" id="title" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Votre titre" required>
              </div>
              <div class="border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                  <label for="price" class="block text-sm font-medium text-gray-700">Valeur</label>
                  <div class="mt-1 relative rounded-md shadow-sm">
                    <input type="number" step="0.01" name="value" id="value" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0.00" aria-describedby="price-currency" required>
                  </div>
              </div>
              <div class="border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label class="block text-sm font-medium text-gray-700">Catégorie</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                  <input type="text" id="categories" name="categories" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Votre catégorie" aria-describedby="catégories">
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
                <select name="flow" class="form-select appearance-none block w-full text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                  <option id="inflow" value="inflow" name="inflow" @if (old('flow') == "inflow" ) {{ 'selected' }} @endif>Entrée</option>
                  <option id="outflow" value="outflow" name="outflow" @if (old('flow') == "outflow" ) {{ 'selected' }} @endif>Sortie</option>
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
            <div class="mt-5 sm:mt-6">
              <button type="button" class="modal_bg inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">Go back to dashboard</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <span id="modal_op" class="inline-flex items-center mb-6 px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Créer mon entrée</span>
  

  <!-- Activity list (smallest breakpoint only) -->

  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                  <div class="mb-3 xl:w-76">
                    <select class="form-select appearance-none block w-full text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                      <option>Titre</option>
                      <option>A - Z</option>
                      <option>Z - A</option>
                    </select>
                  </div>
                </th>
                <th scope="col" class="px-6 py-3">
                  <div class="mb-3 xl:w-76">
                    <select class="form-select appearance-none block w-full text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                      <option>Date</option>
                      <option>Plus récent</option>
                      <option>Moins récent</option>
                    </select>
                  </div>
                </th>
                <th scope="col" class="px-6 py-3">
                  <div class="mb-3 xl:w-76">
                    <select class="form-select appearance-none block w-full text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                      <option>Valeur</option>
                      <option>Croissant</option>
                      <option>Décroissant</option>
                    </select>
                  </div>
                </th>
                <th scope="col" class="px-6 py-3">
                  <div class="mb-3 xl:w-76">
                    <select class="form-select appearance-none block w-full text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                      <option>Entrée/Sortie</option>
                      <option>Entrée</option>
                      <option>Sortie</option>
                    </select>
                  </div>
                </th>
                <th scope="col" class="px-6 py-3">
                  <div class="mb-3 xl:w-76">
                    <select class="form-select appearance-none block w-full {{-- absolute de la flèche--> --}} {{-- px-3 py-1.5 --}} {{-- <-- absolute de la flèche --}} text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                      <option>Toutes les catégories</option>
                      
                      @foreach ($categories as $category)
                      <option>{{ Str::limit($category->name, 15) }}</option>
                      @endforeach
                  
                    </select>
                  </div>
                </th>
                <th scope="col" class="px-6 py-3">
                  <div class="mb-3 xl:w-76">
                    <span class="sr-only">Edit</span>
                  </div>
                </th>
                <th scope="col" class="px-6 py-3">
                  <div class="mb-3 xl:w-76">
                    <span class="sr-only">Supprimer</span>
                  </div>
                </th>
            </tr>
        </thead>
        <tbody>
          @foreach ($flows as $flow)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                  {{ Str::limit($flow->name, 25) }}
                </td>
                <td class="px-6 py-4">
                  {{ $flow->created_at }}
                </td>
                <td class="px-6 py-4">
                  {{ $flow->value }}
                </td>
                <td class="px-6 py-4">
                  {{ $flow->type }}
                </td>
                <td class="px-6 py-4">
                  @foreach ($flow->categories as $category)
                    {{ $category->name }}
                    @if (!$loop->last)
                      ,
                    @endif
                  @endforeach
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="#" class="edit font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
                <td class="px-6 py-4 text-right">
                  <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" onclick="event.preventDefault; document.getElementById('destroy-flow-form').submit();">Supprimer
                    <form action="{{ route('flows.destroy', $flow) }}" method="post" id="destroy-flow-form">
                      @csrf
                      @method('delete')
                    </form>
                  </a>
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

  <script type="text/javascript">

    const cat_add = document.querySelector('#categories');
    const cat_all = document.querySelectorAll('.all_category');

    const inflow = document.getElementById('inflow');
    const outflow = document.getElementById('outflow');
    const flow_ = document.getElementById('flow');
    const select = document.querySelector('.form-select');

    const edit = document.querySelectorAll('.edit');
    const title = document.getElementById('title');
    const value = document.getElementById('value');
    const cat = document.getElementById('categories');

    const modal = document.getElementById('modal_');
    const modal_bg_class = document.querySelector('.modal_bg');
    const modal_bg_id = document.querySelector('#modal_bg');
    const modal_op = document.getElementById('modal_op');

    const form = document.querySelector('form');
    const btn = document.querySelector('.submit_btn');

  </script>

  <script type="text/javascript">

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

  <script type="text/javascript">

    if(form.hasAttribute('action')) {
      form.setAttribute('action', "{{ route('flows.store') }}");
    }

    // edit

    edit.forEach(elem => {
      elem.addEventListener('click', function () {

        form.setAttribute('action', "{{ route('flows.update', $flow) }}");

        const parent = this.parentNode.parentNode;

        modal.style.display = "block";

        title.value = parent.childNodes[1].firstChild.nodeValue.trim();
        value.value = parent.childNodes[5].firstChild.nodeValue.trim();

        const val = parent.childNodes[9].firstChild.nodeValue;

        if (val != val.search(/[^a-zA-Z]+/)) {
          console.log('test');
          
          val_array = val.trim().split(',');

          for(let i = 0; i < val_array.length; i++) {
            cat.value += val_array[i].trim() + ", ";
          }
        }

      })
    })

  </script>

  <script type="text/javascript">

    // modale

      modal_op.style.cursor = "pointer";
      modal.style.display = "none";

      window.addEventListener('click', function(e) {
        if (e.target === modal_bg_id) {
          modal.style.display = "none";
        }
      })

      modal_bg_class.addEventListener('click', function () {
        modal.style.display = "none";
      })

      modal_op.addEventListener('click', function () {
        modal.style.display = "block";
      })
</script>

@stop
@stop

