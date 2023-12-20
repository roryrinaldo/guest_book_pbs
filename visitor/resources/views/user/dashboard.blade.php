@extends('layouts.user_layout')

@section('title', 'Dashboard')

@section('content')
   
     <!-- Navbar -->
     <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <ul class="navbar-nav justify-content-end">
                <li class="nav-item d-flex align-items-center">
                
                </li>
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                    <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                    </div>
                </a>
                </li>
                <li class="nav-item px-3 d-flex align-items-center">
        
                </li>
                <li class="nav-item dropdown pe-2 d-flex align-items-center">
            
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Grafik Pengunjung</h6>
                    </div>
                    <div class="card-body mx-4 px-0 pt-0 pb-3">
                        <canvas id="visitorChart" height="100"></canvas>
                        
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Ambil data untuk grafik dari PHP (gunakan data yang telah di-pass dari controller)
            var monthlyVisitors = @json($monthlyVisitors);

            console.log(monthlyVisitors);

            // Proses data untuk dimasukkan ke dalam grafik
            var monthlyVisitorsData = {
                labels: monthlyVisitors.map(entry => entry.month),
                datasets: [
                    {
                        label: "Jumlah Pengunjung",
                        data: monthlyVisitors.map(entry => entry.total),
                        backgroundColor: "rgba(75, 192, 192, 0.2)",
                        borderColor: "rgba(89, 108, 255, 1)",
                        borderWidth: 1
                    }
                ]
            };

            // Menggambar grafik
            var ctx = document.getElementById("visitorChart").getContext("2d");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: monthlyVisitorsData,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>

  
@endsection