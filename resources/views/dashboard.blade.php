@extends('layouts.admin', ['title' => 'Dashboard'])

@section('content')
    <div class="col-span-2 rounded-lg border-2 p-4">
        <h2 class="text-3xl font-semibold mb-4 border-b pb-4">Cloud Capacity</h2>
        <canvas id="myChart"></canvas>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');

        const datasets = {{ Js::from($datasets) }}
        const labels = {{ Js::from($labels) }}

        console.log(datasets);

        new Chart(ctx, {
            type: 'bar',
            data: {
                datasets: datasets,
                labels: labels
            },
            options: {
                scales: {
                    y: {
                        ticks: {
                            beginAtZero: true,
                            stepSize: 6,

                        }
                    }
                },
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    </script>
@endpush
