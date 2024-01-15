@extends('layouts.dashboard')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Sales Trends</h1>
  </div>

  <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


  <script>
    var ctx = document.getElementById('myChart').getContext('2d');

    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($dailySales->keys()) !!},
            datasets: [{
                label: 'Daily Sales',
                data: {!! json_encode($dailySales->values()) !!},
                backgroundColor: 'rgba(75, 192, 192, 0.2)', // Set bar color
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2,
            }]
        },
        options: {
    scales: {
        x: [{
            type: 'category',
            time: {
                unit: 'day',
                displayFormats: {
                    day: 'MMM D'
                }
            },
            scaleLabel: {
                display: true,
                labelString: 'Date'
            },
            ticks: {
                autoSkip: false, // To display all labels
            },
            labels: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] // Add day names
        }],
        y: [{
            scaleLabel: {
                display: true,
                labelString: 'Total Sales'
            }
        }]
    },
    plugins: {
        legend: {
            display: true,
            position: 'top'
        }
    },
    layout: {
        padding: {
            left: 15,
            right: 20,
            top: 20,
            bottom: 20
        }
    },
    scales: {
        x: {
            barPercentage: 0.9, // Adjust bar width
            categoryPercentage: 0.9 // Adjust category width
        }
    }
       }

    });

  </script>
  @endsection
