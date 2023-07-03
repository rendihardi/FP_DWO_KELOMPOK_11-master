<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DWADV K11C | Fact Purchasing</title>

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
                            <h1 class="m-0">Fact Purchasing</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Fact Purchasing</li>
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
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        include "config.php";
                                        $sql = "SELECT SUM(line_total) as lt from fact_purchasing";
                                        $query = mysqli_query($connect, $sql);
                                        while ($row2 = mysqli_fetch_array($query)) {
                                            echo "$" . number_format($row2['lt']);
                                        }
                                        ?>
                                    </h3>

                                    <p>Total Pengeluaran</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
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
                                        $sql = "SELECT AVG(line_total) as lt from fact_purchasing";
                                        $query = mysqli_query($connect, $sql);
                                        while ($row2 = mysqli_fetch_array($query)) {
                                            echo "$" . number_format($row2['lt']);
                                        }
                                        ?>
                                    </h3>

                                    <p>Rata-rata Pengeluaran/th</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3 style="display:inline-block">
                                        <?php
                                        include "config.php";
                                        $sql = "SELECT t.tahun, SUM(f.line_total) AS rata_rata_line_total
                                                FROM fact_purchasing f
                                                JOIN time t ON f.time_id = t.time_id
                                                GROUP BY t.tahun ORDER BY rata_rata_line_total DESC LIMIT 1;";
                                        $query = mysqli_query($connect, $sql);
                                        while ($row2 = mysqli_fetch_array($query)) {
                                            echo number_format($row2['rata_rata_line_total']);
                                        }
                                        ?>
                                    </h3>
                                    <h4 style="display:inline; float:right">
                                        <?php
                                        include "config.php";
                                        $sql = "SELECT t.tahun, SUM(f.line_total) AS rata_rata_line_total
                                                FROM fact_purchasing f
                                                JOIN time t ON f.time_id = t.time_id
                                                GROUP BY t.tahun ORDER BY rata_rata_line_total DESC LIMIT 1;";
                                        $query = mysqli_query($connect, $sql);
                                        while ($row2 = mysqli_fetch_array($query)) {
                                            echo $row2['tahun'];
                                        }
                                        ?>
                                    </h4>
                                    <p>Pengeluaran Tertinggi</p>
                                </div>
                                <div class="icon">
                                    <i class="fab fa-think-peaks"></i>
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
                                        $sql = "SELECT COUNT(*) as jml_sls from fact_purchasing";
                                        $query = mysqli_query($connect, $sql);
                                        while ($row2 = mysqli_fetch_array($query)) {
                                            echo number_format($row2['jml_sls']);
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
                    </div>
                    <!-- /.row -->
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
                                    <h3 class="card-title">Trend pengeluaran per tahun</h3>

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
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- AREA CHART -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Trend pengeluaran per bulan</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart">
                                        <canvas id="visitors-chart1" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    </div>
                                    <div class="d-flex flex-row justify-content-end">
                                        <span class="mr-3">
                                            <i class="fas fa-square text-success"></i> 2002
                                        </span>
                                        <span class="mr-3">
                                            <i class="fas fa-square text-warning"></i> 2003
                                        </span>
                                        <span class="mr-3">
                                            <i class="fas fa-square text-danger"></i> 2004
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
            $year = "SELECT DISTINCT(t.tahun) as year FROM fact_purchasing fs JOIN time t on t.time_id = fs.time_id";
            $method = "SELECT t.tahun, SUM(f.line_total) AS ltp
                    FROM fact_purchasing f
                    JOIN time t ON f.time_id = t.time_id
                    GROUP BY t.tahun;";
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
                    $chart_method .= $row1['ltp'];
                    $chart_method .= ',';
                    $a++;
                } else {
                    $chart_method .= $row1['ltp'];
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
                    }]
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
    <script>
        $(function() {
            'use strict'
            <?php
            include "config.php";
            $bulan = "SELECT DISTINCT(DATE_FORMAT(tanggallengkap, '%M')) AS bulan
                    FROM time
                    ORDER BY MONTH(tanggallengkap)";
            $amount1 = "SELECT SUM(sf.line_total) as amount FROM fact_purchasing sf JOIN time t ON sf.time_id = t.time_id WHERE t.tahun=2004 GROUP BY t.bulan";
            $amount2 = "SELECT SUM(sf.line_total) as amount FROM fact_purchasing sf JOIN time t ON sf.time_id = t.time_id WHERE t.tahun=2003 GROUP BY t.bulan";
            $amount3 = "SELECT SUM(sf.line_total) as amount FROM fact_purchasing sf JOIN time t ON sf.time_id = t.time_id WHERE t.tahun=2002 GROUP BY t.bulan";
            $i = 1;
            $query_bulan = mysqli_query($connect, $bulan);
            $jumlah_bulan = mysqli_num_rows($query_bulan);
            $chart_bulan = "";
            while ($row = mysqli_fetch_array($query_bulan)) {
                if ($i < $jumlah_bulan) {
                    $chart_bulan .= '"';
                    $chart_bulan .= $row['bulan'];
                    $chart_bulan .= '",';
                    $i++;
                } else {
                    $chart_bulan .= '"';
                    $chart_bulan .= $row['bulan'];
                    $chart_bulan .= '"';
                }
            }
            $a1 = 1;

            $query_amount1 = mysqli_query($connect, $amount1);
            $jumlah_amount1 = mysqli_num_rows($query_amount1);
            $chart_amount1 = "";
            while ($row1 = mysqli_fetch_array($query_amount1)) {
                if ($a1 < $jumlah_amount1) {
                    $chart_amount1 .= $row1['amount'];
                    $chart_amount1 .= ',';
                    $a++;
                } else {
                    $chart_amount1 .= $row1['amount'];
                }
            }
            $b = 1;
            $query_amount2 = mysqli_query($connect, $amount2);
            $jumlah_amount2 = mysqli_num_rows($query_amount2);
            $chart_amount2 = "";
            while ($row2 = mysqli_fetch_array($query_amount2)) {
                if ($b < $jumlah_amount2) {
                    $chart_amount2 .= $row2['amount'];
                    $chart_amount2 .= ',';
                    $b++;
                } else {
                    $chart_amount2 .= $row2['amount'];
                }
            }
            $c = 1;
            $query_amount3 = mysqli_query($connect, $amount3);
            $jumlah_amount3 = mysqli_num_rows($query_amount3);
            $chart_amount3 = "";
            while ($row3 = mysqli_fetch_array($query_amount3)) {
                if ($c < $jumlah_amount3) {
                    $chart_amount3 .= $row3['amount'];
                    $chart_amount3 .= ',';
                    $c++;
                } else {
                    $chart_amount3 .= $row3['amount'];
                }
            }
            ?>
            var ticksStyle = {
                fontColor: '#495057',
                fontStyle: 'bold'
            }

            var mode = 'index'
            var intersect = true

            var $visitorsChart = $('#visitors-chart1')
            // eslint-disable-next-line no-unused-vars
            var visitorsChart = new Chart($visitorsChart, {
                data: {
                    labels: [<?php echo $chart_bulan; ?>],
                    datasets: [{
                            type: 'line',
                            data: [<?php echo $chart_amount1; ?>],
                            backgroundColor: 'transparent',
                            borderColor: '#dc3545',
                            pointBorderColor: '#dc3545',
                            pointBackgroundColor: '#dc3545',
                            fill: false
                            // pointHoverBackgroundColor: '#007bff',
                            // pointHoverBorderColor    : '#007bff'
                        },
                        {
                            type: 'line',
                            data: [0, <?php echo $chart_amount2; ?>],
                            backgroundColor: 'tansparent',
                            borderColor: '#ffc107',
                            pointBorderColor: '#ffc107',
                            pointBackgroundColor: '#ffc107',
                            fill: false
                            // pointHoverBackgroundColor: '#ced4da',
                            // pointHoverBorderColor    : '#ced4da'
                        },
                        {
                            type: 'line',
                            data: [0, <?php echo $chart_amount3; ?>],
                            backgroundColor: 'tansparent',
                            borderColor: '#28a745',
                            pointBorderColor: '#28a745',
                            pointBackgroundColor: '#28a745',
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