@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center" style="width: 100%">

            <div style=" max-height: 90vh; width: 100% "><canvas id="myChart"></canvas></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["المخازن", 'الكبائن', 'المنتجات'],
                datasets: [{
                    label: "الكمية",
                    data: [{{ $stores }}, {{ $cabins }}, {{ $products }}],
                    borderWidth: 1
                }]
            },
            options: {
                label: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
