@props(['monthlyData' => [0,0,0,0,0,0,0,0,0,0,0,0]])

<div class="rounded-2xl border border-gray-200 bg-white px-5 pb-5 pt-5 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6 sm:pt-6">
    <div class="flex flex-col gap-5 mb-6 sm:flex-row sm:justify-between">
        <div class="w-full">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                Statistik Pengaduan
            </h3>
            <p class="mt-1 text-gray-500 text-theme-sm dark:text-gray-400">
                Jumlah pengaduan per bulan tahun {{ date('Y') }}
            </p>
        </div>
    </div>
    <div class="max-w-full overflow-x-auto custom-scrollbar">
        <div id="chartPengaduan" class="-ml-4 min-w-[700px] pl-2 xl:min-w-full"></div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    var options = {
        series: [{
            name: 'Pengaduan',
            data: {{ json_encode($monthlyData) }}
        }],
        chart: {
            type: 'area',
            height: 310,
            toolbar: { show: false },
            fontFamily: 'inherit',
        },
        colors: ['#465FFF'],
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.4,
                opacityTo: 0,
            }
        },
        stroke: {
            curve: 'smooth',
            width: 2,
        },
        xaxis: {
            categories: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],
            labels: {
                style: { fontSize: '12px' }
            }
        },
        yaxis: {
            min: 0,
            tickAmount: 5,
            labels: {
                style: { fontSize: '12px' }
            }
        },
        tooltip: {
            y: {
                formatter: (val) => val + ' pengaduan'
            }
        },
        grid: {
            strokeDashArray: 5,
        },
        dataLabels: { enabled: false },
    };

    var chart = new ApexCharts(document.querySelector("#chartPengaduan"), options);
    chart.render();
});
</script>