
<!DOCTYPE html>
<html lang="en">

<head>
@include('template.head')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body id="page-top">
    <div id="wrapper">
        @include('template.sidebar')
        @include('template.topbar')

            <!-- Main Content -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="fw-bold">Hasil Perhitungan TREND MOMENT</h5>
                        </div>
                        <div class="card-body">
                            {{-- <div class="bd-example"> --}}
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Bulan</th>
                                        <th>Perkiraan Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ramalanHasil as $key => $harga)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ 'Rp. ' .round($harga)  }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <p class="h3 mb-0"> Berdasarkan analisis metode <span class="text-primary fw-bold">Trend Moment
                                </span>yang dilakukan, sistem meramalkan bahwa harga <span
                                class="text-primary fw-bold">{{ $bahan_terpilih->nama }}</span>
                                akan mengalami perubahan, berikut grafik harga bahan baku dibandingkan dengan hasil prediksi
                                </span>
                                <canvas id="forecastChart" width="400" height="200"></canvas>
                                
                        </div>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('template.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    @include('template.logout')

    @include('template.script')
    <script>
        const ctx = document.getElementById('forecastChart').getContext('2d');
        const forecastChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($x), // Label x-axis, bulan atau periode
                datasets: [{
                    label: 'Harga Aktual',
                    data: @json($y), // Data harga aktual
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    fill: false
                }, {
                    label: 'Harga Prediksi',
                    data: @json($ramalanSebelumnya), // Data harga prediksi
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1,
                    fill: false
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
</body>

</html>