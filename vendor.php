<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DWADV K11C | Vendor</title>

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
                            <h1 class="m-0">Vendor</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Vendor</li>
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
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        include "config.php";
                                        $sql = "SELECT COUNT(vendor_id) as vid FROM `vendor`";
                                        $query = mysqli_query($connect, $sql);
                                        while ($row2 = mysqli_fetch_array($query)) {
                                            echo number_format($row2['vid']);
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
                    </div>
                    <!-- /.row -->
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- DONUT CHART -->
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">Vendor Penyuplai Produk Terbanyak</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
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
            <?php
            include "config.php";
            $vendor = "SELECT v.vendor_name
                    FROM fact_purchasing fp
                    JOIN vendor v ON fp.vendor_id = v.vendor_id
                    GROUP BY v.vendor_name
                    ORDER BY COUNT(v.vendor_name) DESC
                    LIMIT 6";
            $orderqty = "SELECT COUNT(v.vendor_name) as voq
                    FROM fact_purchasing fp
                    JOIN vendor v ON fp.vendor_id = v.vendor_id
                    GROUP BY v.vendor_name
                    ORDER BY COUNT(v.vendor_name) DESC
                    LIMIT 6";
            $i = 1;
            $query_vendor = mysqli_query($connect, $vendor);
            $jumlah_vendor = mysqli_num_rows($query_vendor);
            $chart_vendor = "";
            while ($row = mysqli_fetch_array($query_vendor)) {
                if ($i < $jumlah_vendor) {
                    $chart_vendor .= '"';
                    $chart_vendor .= $row['vendor_name'];
                    $chart_vendor .= '",';
                    $i++;
                } else {
                    $chart_vendor .= '"';
                    $chart_vendor .= $row['vendor_name'];
                    $chart_vendor .= '"';
                }
            }
            $a = 1;
            $query_orderqty = mysqli_query($connect, $orderqty);
            $jumlah_orderqty = mysqli_num_rows($query_orderqty);
            $chart_orderqty = "";
            while ($row1 = mysqli_fetch_array($query_orderqty)) {
                if ($a < $jumlah_orderqty) {
                    $chart_orderqty .= $row1['voq'];
                    $chart_orderqty .= ',';
                    $a++;
                } else {
                    $chart_orderqty .= $row1['voq'];
                }
            }
            ?>
            //-------------
            //- DONUT CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
            var donutData = {
                labels: [
                    <?php echo $chart_vendor ?>
                ],
                datasets: [{
                    data: [<?php echo $chart_orderqty ?>],
                    backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                }]
            }
            var donutOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            new Chart(donutChartCanvas, {
                type: 'doughnut',
                data: donutData,
                options: donutOptions
            })
        })
    </script>
</body>

</html>