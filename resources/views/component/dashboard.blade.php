@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    @if (Auth::user()->roles == 'super_admin')
    <div class="container">
        <canvas id="myChart"></canvas>
    </div>
    @endif
    @if (Auth::user()->roles == 'cs')
    <div class="container">
        <canvas id="myBarChart"></canvas>
    </div>
    @endif
</div>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [
                {
                    label: 'Makassar',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    data: {!! json_encode($dashboardMakassar->pluck('total')) !!}
                },
                {
                    label: 'Bandung',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1,
                    data: {!! json_encode($dashboardBandung->pluck('total')) !!}
                },
                {
                    label: 'Surabaya',
                    backgroundColor: 'rgba(255, 205, 86, 0.2)',
                    borderColor: 'rgba(255, 205, 86, 1)',
                    borderWidth: 1,
                    data: {!! json_encode($dashboardSurabaya->pluck('total')) !!}
                },
                {
                    label: 'Jakarta',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    data: {!! json_encode($dashboardJakarta->pluck('total')) !!}
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<script>
    var dataFromServer = <?php echo json_encode($dataMasuk); ?>;
    dataFromServer.sort(function(a, b) {
        return a.month - b.month;
    });
    var labels = dataFromServer.map(function(item) {
        var monthNames = [
            "January", "February", "March",
            "April", "May", "June", "July",
            "August", "September", "October",
            "November", "December"
        ];
        return monthNames[item.month - 1];
    });

    var data = dataFromServer.map(function(item) {
        return item.total;
    });

    var ctx = document.getElementById('myBarChart').getContext('2d');
    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Total Data Masuk',
                data: data,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endpush