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
            <input type="number" step="0.01" name="value" id="value" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0.00" aria-describedby="price-currency">
          </div>
      </div>
      <div class="border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
        <label for="price" class="block text-sm font-medium text-gray-700">Catégorie</label>
        <div class="mt-1 relative rounded-md shadow-sm">
          <input type="text" name="add_category" class="add_category focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Créer votre catégorie" aria-describedby="price-currency">
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
      <div class="category_add border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
        <label class="block text-sm font-medium text-gray-700">Mes catégories selectionnées</label>
      </div>
      <div class="border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
        <button type="submit" class="inline-flex items-center p-3 border border-transparent rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
                  @foreach ($inflow->categories as $category)
                  {{ $category->name }}
                  @if (!$loop->last)
                    ,
                  @endif
                  @endforeach
                  
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

  <style>
    
  </style>

  <script type="text/javascript">

    const catall = document.querySelectorAll('.all_category');
    let catadd = document.querySelector('.add_category');
    const empty = document.querySelector('.category_add');
    const del_cat = document.querySelectorAll('.del_cat');
    
    catall.forEach(element => {
      element.addEventListener('click', function () {
        element = element.firstChild.nodeValue;
        category_add_empty(element, b = null, empty);
      });
    });
    
    catadd.addEventListener('keypress', function (e) {
      e.preventDefault();
      if (e.key === "Enter" || e.key === "13") {
        catadd = catadd.value;
        category_add_empty(a = null, catadd, empty);
      }
    });
  
    function category_add_empty (catall = null, catadd = null, empty) {
      if (catadd != null) {
        create_cat(catadd, empty);
      }
      if (catall != null) {
        create_cat(catall, empty);
      }
    }

    function create_cat(a, b) {
        let btn = document.createElement('a');
        let t = document.createTextNode(a);
        btn.appendChild(t);
        btn.classList.add('del_cat');
        btn.style.cursor = "pointer";
        btn.style.marginLeft = "5px";
        b.appendChild(btn);
    }

    del_cat.forEach(element => {
      element.addEventListener('click', function () {
        element.remove();
      })
    });
  
  </script>

@stop
@stop

{{-- (function ($) {

var defaults = {  // default values

    // global
    name        : "property_1", // string
    text        : "text",   // string
    removetext   : "Remove",

    // accessibility
    alabel      : "select ", // string

    //
    data : {
      one : "Add some tags" // default value for tag list
    },

    data_used: {
      one: "lucene" // used tags 
    },

  // text 
    used_text: "Choisen tags",
    avalible_text: "List of avalible tags. Click on tag to use it.",
input_text : "Enter the name of the tag that you search or add new tag",

    // callbacks
    created     : function () {},  // call back
    change      : function () {},  // call back
    removeTag   : function () {}  // call back
};

function Tagcloud(elements, options) {  // constructor
    // init parameters
    var widget = this;
    widget.config = $.extend({}, defaults, options);
    widget.elements = elements;
    widget.init();
    widget.elementsEvents();

    // if plugin was called with string option
    if (typeof options === "string") {
        switch (options) {
            case "method_1":
                widget.method_1();
                break;
            case "method_2":
                widget.method_2();
                break;
            case "something":
                widget.something();
                break;
            default: console.log('there is no bathroom');
        }
    }
}

Tagcloud.prototype.init = function () {
    // init function body ...
    /*
        here is the code for create elemts in plugin on first step
        this.config.property_1
        this.elements
    */
    this.elements.addClass('tagcloud'); // add a global class name
    var div = this.elements;

    $('<fieldset>', {
      class: "tagcloud__used js-used"
    }).appendTo(this.elements);

    $('<legend>', {
      class: "",
      text: this.config.used_text
    }).appendTo(div.find('.js-used'));

    $('<label>', {
      class: "",
      text: this.config.input_text,
  for : "tagcloud_enter_name"
    }).appendTo(this.elements);

    $('<input>',{
      "class": "tagcloud__field",
      id: "tagcloud_enter_name"
    }).appendTo(this.elements);

    $('<p>', {
      class: "",
      text: this.config.avalible_text
    }).appendTo(this.elements);

    $('<ul>',{
        class : "tagcloud__list"
    }).appendTo(this.elements);

    $.each( this.config.data, function(item,index) {
      $('<li>',{
        text : $.trim(index),
        "data-value": $.trim(index).replace(/ /g, "_"),
        "data-index": item
        }).appendTo( div.find('ul') );
    } );

    this.config.created(this.elements); // callback after create elements
}

Tagcloud.prototype.elementsEvents = function () {
    var div = this.elements;
    var input = this.elements.find('input');
    var used = this.elements.find('.js-used');
    var li = this.elements.find('li');
    var span; // choisen tags
    var config = this.config; // options
    var input_value;

    // input events
    input.keyup(function (e) {
        input_value = input.val();
        if ( e.keyCode == 13 ) {
            // add tag to  the list
    var span = "";
    if (input_value.indexOf(",") >= 0) {
      var res = input_value.split(",");
      for (var i = 0; i < res.length; i++) {
        span += '<span class="tagcloud__choisen js-tagcloud__choisen" data-value="' + res[i] + '">' +
              res[i] +
              '<button class="js-remove_tag tagcloud__choisen_remove fi flaticon-delete">' +
                '<span>' + config.removetext + '</span>' +
              '</button>' +
            '</span>';
      }
    } else {
      span = '<span class="tagcloud__choisen js-tagcloud__choisen" data-value="' + input_value + '">' +
            input_value +
            '<button class="js-remove_tag tagcloud__choisen_remove fi flaticon-delete">' +
              '<span>' + config.removetext + '</span>' +
            '</button>' +
          '</span>';
    }
            used.append(span);
            input.val('');
        }

        $.each( li, function(item) {
          // do this if begin with entered letters
          var tag_item = $(this).attr('data-value');
          if (tag_item.indexOf(input_value) == 0 && input_value.length > 0) {
                $(this).addClass('equal');
            } else {
                $(this).removeClass('equal');
            }
        });
    });

    input.blur(function(){
        li.css('border','none');
    });
    // END input events

    div.on('click','.js-remove_tag',function() {
        $(this).parent().remove();
        var index = $(this).data('index');
        div.find('li[data-index="'+ index +'"]').removeClass('used');
        config.removeTag(this); // callback after remove tag
    });

    li.on('click', function(){
        if ( !$(this).hasClass('used') ) {
            var tag = $(this).data('index');
            $(this).addClass('used');
            used.append(
                '<span class="tagcloud__choisen" data-value="' + config.data[tag] + '">' +
                    config.data[tag] +
                    '<button class="js-remove_tag tagcloud__choisen_remove fi flaticon-delete" data-index="' + $(this).data('index') + '">' +
                        '<span>' + config.removetext + '</span>' +
                    '</button>' +
                '</span>'
            );
        }
    });

  // add tags to used tags list

$.each(config.data_used, function (index, used) {
  var result = "";
  if (used.indexOf(",") >= 0) {
    var res = used.split(",");
    for (var i = 0; i < res.length; i++) {
      result = $.trim(res[i]).replace(/ /g, "_");
      div.find('li[data-value="' + $.trim(result) + '"]').click();
    }
  } else {
    result = $.trim(used).replace(/ /g, "_");
    div.find('li[data-value="' + $.trim(result) + '"]').click();
  }
    });
}

// methods list
Tagcloud.prototype.something = function () {
    console.log('something');
}

Tagcloud.prototype.method_1 = function () {
    console.log('method_1');
}

Tagcloud.prototype.method_2 = function () {
    console.log('method_2');
}

// ...
// End methoids list

$.fn.tagcloud = function (options) {

    this.each(function(){
        new Tagcloud($(this), options);  // call constuctor
    });
    // config.property_1
    return this.each(function(){

    });
}
})(jQuery);


$(document).ready(function() {
if ($('.js-tagcloud').length > 0) {
var tag_list = $('.js-tagcloud').attr('data-list').split(",");

$('.js-tagcloud').tagcloud({
  data: tag_list,
});
}

}); --}}