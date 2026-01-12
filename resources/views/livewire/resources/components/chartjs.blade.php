<!-- Vertical Bar Chart start -->
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h5>Resources Chart</h5>
        </div>
        <div class="card-body">
            <canvas id="myChart1"></canvas>
        </div>
    </div>
</div>
<x-slot:script>
    <!-- chartjs js -->
    <script src="{{asset('assets/vendor/chartjs/chart.js')}}"></script>
    <!-- apexcharts js-->
    <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>

    <script>
        //  **------Vertical Bar Chart**
        const chart1 = document.getElementById('myChart1');

        new Chart(chart1, {
            type: 'bar',
            data: {
                labels: ["Audios", "Videos", "Pdfs", "Images"],
                datasets: [{
                    label: "Resources",
                    backgroundColor: hexToRGB(getLocalStorageItem('color-primary','#48BECE'),0.5),
                    borderColor: hexToRGB(getLocalStorageItem('color-primary','#48BECE'),1),
                    data: [{{ $totalAudios }}, {{ $totalVideos }}, {{ $totalPdfs }}, {{ $totalImages }}]
                },
                // {
                //     label: "Dataset #2",
                //     backgroundColor: hexToRGB(getLocalStorageItem('color-primary','#48BECE'),0.5),
                //     borderColor: "rgba(299, 94, 64,1)",
                //     data: [65, 59, -20, 81, -56, 55, -40]
                // }
                    ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false,
                    }
                }
            }
        });
    </script>
</x-slot>
