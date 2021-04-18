<style>
    .pie, .bar-chart{
        width:70%;
        padding:80px;
        text-align: center;
    }
    </style>

@extends('voyager::master')

@section('content')
     
    <div class="page-content">
        @include('voyager::alerts')
        @include('voyager::dimmers')

            <div class="pie">
            <h4>Products ratio by categories</h4>
            <canvas id="users" height="280" width="600"></canvas>
            </div>
            <div class="bar-chart">
            <h4>Yearly User Joined</h4>                            
                <canvas id="canvas" height="280" width="600"></canvas>
        </div>
                    
    </div>
@stop

@section('javascript')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

        
        <script>
    var year = <?php echo $year; ?>;
    var user = <?php echo $user; ?>;
    var barChartData = {
        labels: year,
        datasets: [{
            label: 'User',
            backgroundColor: "pink",
            data: user
        }]
    };
    var category = <?php echo $category; ?>;
    var products = <?php echo $products; ?>;
    var pieChartData = {
                    labels:["Men","Women","Children"],

        datasets: [{
            backgroundColor: ['rgb(255,129,102)',
                                   'rgb(234,162,235)',
                                   'rgb(255,206,36)'],
            data: products
        }]
    };

    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
            }
        });


        var cty=document.getElementById("users");
        window.myPie = new Chart(cty, {
            type:"pie",
            data:pieChartData,
                options:{
                    scales:{
                        yAxes:[{
                            ticks:{
                                beginAtZero:true
                            }
                        }]
                    }
                }
            
        });   
    };
</script>



@stop