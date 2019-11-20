@extends('layouts.app')

@section('page_header')
<h1 class="m-0 text-dark">Sales Reports</h1>
@endsection

@section('breadcrumb_list')
<li class="breadcrumb-item active">Reports</li>
@endsection

@section('content')

<div class="col-md-12">

    <!-- STACKED BAR CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Stacked Bar Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="stackedBarChart" style="height:230px; min-height:230px"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

    <!-- PIE CHART -->
           <div class="card card-danger">
             <div class="card-header">
               <h3 class="card-title">Pie Chart</h3>

               <div class="card-tools">
                 <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                 </button>
               </div>
             </div>
             <div class="card-body">
               <canvas id="pieChart" style="height:230px; min-height:230px"></canvas>
             </div>
             <!-- /.card-body -->
           </div>
           <!-- /.card -->
</div>

@endsection



@section('admin_css')
/*
chat area




*/
@endsection


@section('admin_scripts')
<script src="{{ asset('AdminLTE/plugins/chart.js/Chart.min.js')}}"></script>
<script>
    $(document).ready(function(){

        var app = @json($reportData);// have all the data in array that need to convert for labels
        var m = '';
        var n = '';
        for (var i = 0; i < app.length; i++) {

            m = m + "'"+app[i].month+"',";
        }
        m = m.replace(/,\s*$/, "");

        for (var i = 0; i < app.length; i++) {

            n = n +app[i].total+",";
        }
        n = n.replace(/,\s*$/, "");
        console.log(n);


        var barChartData = {

              labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
              // labels  : [m],
              datasets: [
                {
                  label               : 'Digital Goods',
                  backgroundColor     : 'rgba(60,141,188,0.9)',
                  borderColor         : 'rgba(60,141,188,0.8)',
                  pointRadius          : false,
                  pointColor          : '#3b8bba',
                  pointStrokeColor    : 'rgba(60,141,188,1)',
                  pointHighlightFill  : '#fff',
                  pointHighlightStroke: 'rgba(60,141,188,1)',
                  data                : [28, 48, 40, 19, 86, 27, 90]
                  // data                : [n]
                }
              ]
            }


     var barChartOptions = {
       responsive              : true,
       maintainAspectRatio     : false,
       datasetFill             : false
     }
        //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = jQuery.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    var stackedBarChart = new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })





        // var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var pieData        = {
          labels: [
              'Chrome',
              'IE',
              'FireFox',
              'Safari',
              'Opera',
              'Navigator',
          ],
          datasets: [
            {
              data: [700,500,400,600,300,100],
              backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }
          ]
        }

        //-------------
        //- PIE CHART -
        //-------------
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var pieData        = pieData;
        var pieOptions     = {
          maintainAspectRatio : false,
          responsive : true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var pieChart = new Chart(pieChartCanvas, {
          type: 'pie',
          data: pieData,
          options: pieOptions
        })

    });

</script>
@endsection
