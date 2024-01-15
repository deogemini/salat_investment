@extends('layouts.dashboard')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h3>Sales Trends</h3>
  </div>

  <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>



  <script>

     // Function to update the chart with new data
     function updateChart(labels, data) {
        chart.data.labels = labels;
        chart.data.datasets[0].data = data;
        chart.update();
    }

     // Function to fetch data from the server
     function fetchData() {
        $.ajax({
            url: "{{ url('/showChart')}}", // Update with the actual route
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                console.log(response.data);
                // Assuming the response contains 'labels' and 'data'
                updateChart(response.labels, response.data);
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
    var ctx = document.getElementById('myChart').getContext('2d');

    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [],
            datasets: [{
                label: 'Daily Sales',
                data: [],
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

      // Fetch data on page load
      fetchData();

// Optionally, you can set up a timer to refresh the data periodically
setInterval(fetchData, 60000);

  </script>
  @endsection
