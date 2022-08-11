@extends('layouts.connected')

@section('sidebar')
@section('table')

    <div class="border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
        <canvas id="myChart" height="100px"></canvas>
    </div>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
<script type="text/javascript">
  
    var labels =  {{ Js::from($labels) }};
    var outflow =  {{ Js::from($data) }};
    var inflow =  {{ Js::from($doto) }};
  
    const data = {
        labels: labels,
        datasets: [{
            label: 'sorties',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: outflow,
        },{
            label: 'entrées',
            backgroundColor: 'rgb(0,0,255)',
            borderColor: 'rgb(0,0,255)',
            data: inflow,
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