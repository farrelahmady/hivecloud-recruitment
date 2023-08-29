@extends('layouts.admin', ['title' => 'Dashboard'])

@section('content')
    <div class="lg:col-span-3 rounded-lg border-2 p-4">
        <div class="mb-4 border-b pb-4 flex justify-between">
            <h2 class="text-3xl font-semibold">Cloud Capacity</h2>

            <form action="{{ route('cloud-capacity.report') }}" method="post">
                @csrf
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Report
                </button>
            </form>
        </div>
        <canvas id="myChart"></canvas>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');

        const datasets = {{ Js::from($datasets) }}
        const labels = {{ Js::from($labels) }}

        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                datasets: datasets,
                labels: labels
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        ticks: {
                            beginAtZero: true,
                            stepSize: 6,
                            font: {
                                weight: 'bold'
                            }

                        }
                    },
                    x: {
                        ticks: {
                            font: {
                                size: 14,
                                weight: 'bold'
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        position: 'bottom'
                    },
                },

            }
        });

        window.addEventListener('resize', () => {
            chart.resize(chart.canvas.parentNode.clientWidth, 1);
        });
    </script>
@endpush
