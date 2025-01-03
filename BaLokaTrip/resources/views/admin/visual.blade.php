{{-- Visualisasi Data (Admin) --}}
<x-app-layout>
    <div style="background-color: #cee2ec;">
    <div class="container py-5" >
        <h1 class="mb-4 text-center" style="font-size: 1.5rem;">Visualisasi Data User Yang Sudah Registrasi</h1>

        {{-- Chart --}}
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body nightowl-daylight">
                        <div style="width: 100%; height: 300px;">
                            <canvas id="registrationChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
    {{-- Chart.js Script --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('registrationChart').getContext('2d');
        const registrationChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($months), // Bulan (dari controller)
                datasets: [{
                    label: 'Jumlah Registrasi',
                    data: @json($counts), // Jumlah registrasi (dari controller)
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(255, 159, 64, 0.8)',
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(153, 102, 255, 0.8)',
                        'rgba(201, 203, 207, 0.8)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(201, 203, 207, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                maintainAspectRatio: false, // Agar ukuran canvas menyesuaikan
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Jumlah User'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Bulan'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        labels: {
                            color: '#333'
                        }
                    }
                }
            }
        });
    </script>
</x-app-layout>