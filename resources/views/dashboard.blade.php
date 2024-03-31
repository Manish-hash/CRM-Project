
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Chart container -->
                <canvas id="dashboardChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
</x-app-layout>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Pass the counts from PHP to JavaScript
    const users = {{ $userCount }};
    const totalProducts= {{ $productCount }};
    const activeusers = {{ $activeuserCount }};
   
    // Create dashboard chart
    const dashboardChartCtx = document.getElementById('dashboardChart').getContext('2d');
    new Chart(dashboardChartCtx, {
        type: 'bar',
        data: {
            labels: ['Total Products', 'Users','Active Users'],
            datasets: [{
                label: 'Counts',
                data: [ users,totalProducts,activeusers],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
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
