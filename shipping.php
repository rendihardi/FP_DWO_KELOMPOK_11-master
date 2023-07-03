<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DWADV K11C | Shipping</title>

    <?php include "header.php" ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">DWADV K11C</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <?php include "sidebar.php" ?>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Shipping</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Shipping</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        include "config.php";
                                        $sql = "SELECT COUNT(*) as jml_pnj FROM `fact_sales`";
                                        $query = mysqli_query($connect, $sql);
                                        while ($row2 = mysqli_fetch_array($query)) {
                                            echo number_format($row2['jml_pnj']);
                                        }
                                        ?>
                                    </h3>

                                    <p>Total Transaksi Penjualan</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-cart-arrow-down"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        include "config.php";
                                        $sql = "SELECT COUNT(*) as jml_pmb from fact_purchasing";
                                        $query = mysqli_query($connect, $sql);
                                        while ($row2 = mysqli_fetch_array($query)) {
                                            echo number_format($row2['jml_pmb']);
                                        }
                                        ?>
                                    </h3>

                                    <p>Total Transaksi Pembelian</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-cart-plus"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        include "config.php";
                                        $sql = "SELECT COUNT(method_id) as mid FROM `ship_method`";
                                        $query = mysqli_query($connect, $sql);
                                        while ($row2 = mysqli_fetch_array($query)) {
                                            echo number_format($row2['mid']);
                                        }
                                        ?>
                                    </h3>

                                    <p>Total Ekspedisi</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-shipping-fast"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        include "config.php";
                                        $sql = "SELECT COUNT(DISTINCT(vendor_id)) as total FROM `fact_purchasing`;";
                                        $query = mysqli_query($connect, $sql);
                                        while ($row2 = mysqli_fetch_array($query)) {
                                            echo number_format($row2['total']);
                                        }
                                        ?>
                                    </h3>

                                    <p>Unique Vendor</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-industry"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h4>
                                        <?php
                                        include "config.php";
                                        $sql = "SELECT sm.method_name, COUNT(fs.method_id) AS method
                                                FROM fact_sales AS fs
                                                JOIN ship_method AS sm ON fs.method_id = sm.method_id
                                                GROUP BY sm.method_name
                                                ORDER BY method DESC LIMIT 1";
                                        $query = mysqli_query($connect, $sql);
                                        while ($row2 = mysqli_fetch_array($query)) {
                                            echo $row2['method_name'];
                                        }
                                        ?>
                                    </h4>

                                    <p>ekspedisi yang sering digunakan di penjualan</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-shipping-fast"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h4>
                                        <?php
                                        include "config.php";
                                        $sql = "SELECT sm.method_name, COUNT(fp.method_id) AS method
                                                FROM fact_purchasing AS fp
                                                JOIN ship_method AS sm ON fp.method_id = sm.method_id
                                                GROUP BY sm.method_name
                                                ORDER BY method DESC LIMIT 1";
                                        $query = mysqli_query($connect, $sql);
                                        while ($row2 = mysqli_fetch_array($query)) {
                                            echo $row2['method_name'];
                                        }
                                        ?>
                                    </h4>

                                    <p>ekspedisi yang sering digunakan di purchasing</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-shipping-fast"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                    <!-- Main row -->
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- AREA CHART -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">trend pengiriman tiap tahun</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart">
                                        <canvas id="visitors-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    </div>
                                    <div class="d-flex flex-row justify-content-end">
                                        <span class="mr-2">
                                            <i class="fas fa-square text-primary"></i> Pengiriman Penjualan
                                        </span>

                                        <span>
                                            <i class="fas fa-square text-gray"></i> Pengiriman Pembelian
                                        </span>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <!-- /.col (RIGHT) -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <?php include "pluginScript.php" ?>
    <script>
        $(function() {
            'use strict'
            <?php
            include "config.php";
            $year = "SELECT DISTINCT(t.tahun) as year FROM fact_sales fs JOIN time t on t.time_id = fs.time_id";
            $method = "SELECT SUM(fs.method_id) as method FROM fact_sales fs JOIN time t on t.time_id = fs.time_id GROUP BY t.tahun";
            $i = 1;
            $query_year = mysqli_query($connect, $year);
            $jumlah_year = mysqli_num_rows($query_year);
            $chart_year = "";
            while ($row = mysqli_fetch_array($query_year)) {
                if ($i < $jumlah_year) {
                    $chart_year .= '"';
                    $chart_year .= $row['year'];
                    $chart_year .= '",';
                    $i++;
                } else {
                    $chart_year .= '"';
                    $chart_year .= $row['year'];
                    $chart_year .= '"';
                }
            }
            $a = 1;
            $query_method = mysqli_query($connect, $method);
            $jumlah_method = mysqli_num_rows($query_method);
            $chart_method = "";
            while ($row1 = mysqli_fetch_array($query_method)) {
                if ($a < $jumlah_method) {
                    $chart_method .= $row1['method'];
                    $chart_method .= ',';
                    $a++;
                } else {
                    $chart_method .= $row1['method'];
                }
            }

            $year1 = "SELECT DISTINCT(t.tahun) as year FROM fact_purchasing fp JOIN time t on t.time_id = fp.time_id";
            $method1 = "SELECT SUM(fp.method_id) as method FROM fact_purchasing fp JOIN time t on t.time_id = fp.time_id GROUP BY t.tahun";
            $i1 = 1;
            $query_year1 = mysqli_query($connect, $year1);
            $jumlah_year1 = mysqli_num_rows($query_year1);
            $chart_year1 = "";
            while ($row1 = mysqli_fetch_array($query_year1)) {
                if ($i1 < $jumlah_year1) {
                    $chart_year1 .= '"';
                    $chart_year1 .= $row1['year'];
                    $chart_year1 .= '",';
                    $i++;
                } else {
                    $chart_year1 .= '"';
                    $chart_year1 .= $row1['year'];
                    $chart_year1 .= '"';
                }
            }
            $a1 = 1;
            $query_method1 = mysqli_query($connect, $method1);
            $jumlah_method1 = mysqli_num_rows($query_method1);
            $chart_method1 = "";
            while ($row11 = mysqli_fetch_array($query_method1)) {
                if ($a1 < $jumlah_method1) {
                    $chart_method1 .= $row11['method'];
                    $chart_method1 .= ',';
                    $a++;
                } else {
                    $chart_method1 .= $row11['method'];
                }
            }
            ?>
            var ticksStyle = {
                fontColor: '#495057',
                fontStyle: 'bold'
            }

            var mode = 'index'
            var intersect = true

            var $visitorsChart = $('#visitors-chart')
            // eslint-disable-next-line no-unused-vars
            var visitorsChart = new Chart($visitorsChart, {
                data: {
                    labels: [<?php echo $chart_year; ?>],
                    datasets: [{
                            type: 'line',
                            data: [<?php echo $chart_method; ?>],
                            backgroundColor: 'transparent',
                            borderColor: '#007bff',
                            pointBorderColor: '#007bff',
                            pointBackgroundColor: '#007bff',
                            fill: false
                            // pointHoverBackgroundColor: '#007bff',
                            // pointHoverBorderColor    : '#007bff'
                        },
                        {
                            type: 'line',
                            data: [0, <?php echo $chart_method1; ?>],
                            backgroundColor: 'tansparent',
                            borderColor: '#ced4da',
                            pointBorderColor: '#ced4da',
                            pointBackgroundColor: '#ced4da',
                            fill: false
                            // pointHoverBackgroundColor: '#ced4da',
                            // pointHoverBorderColor    : '#ced4da'
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        mode: mode,
                        intersect: intersect
                    },
                    hover: {
                        mode: mode,
                        intersect: intersect
                    },
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            // display: false,
                            gridLines: {
                                display: true,
                                lineWidth: '4px',
                                color: 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent'
                            },
                            ticks: $.extend({
                                beginAtZero: true,
                                suggestedMax: 200
                            }, ticksStyle)
                        }],
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: false
                            },
                            ticks: ticksStyle
                        }]
                    }
                }
            })
        })
    </script>
</body>

</html>