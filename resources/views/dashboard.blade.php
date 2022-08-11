
@extends('layouts.connected')

@section('sidebar')
@section('table')

    @section('title')
        <h2 class="text-2xl font-semibold text-gray-900">Accueil</h2>
    @stop

    <div class="border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
        <canvas id="myChart" height="100px"></canvas>
    </div>

    <a href="{{ route('salaries.index') }}" :active="request()->routeIs('salaries.index')" class="text-indigo-100 hover:bg-indigo-600 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
        <div class="mt-5 sm:mt-6">
            <button type="button" class="modal_bg inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">Salaires</button>
        </div>
    </a>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script type="text/javascript">

    var labels =  {{ Js::from($labels) }};
    var inflow =  {{ Js::from($doto) }};
    var outflow =  {{ Js::from($data) }};

    const data = {
        labels: labels,
        datasets: [{
            label: 'entrées',
            backgroundColor: 'rgb(0,0,255)',
            borderColor: 'rgb(0,0,255)',
            data: inflow,
        },{
            label: 'sorties',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: outflow,
        }]
    };

    const config = {
        type: 'line',
        data: data,
        options: {}
    };

    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );

    </script>

@stop
@stop