<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DWADV K11C | Sales</title>

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
                        <h1 class="m-0">Sales</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Sales</li>
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
                                    $sql = "SELECT COUNT(sales_person_id) as stid FROM `sales_person`";
                                    $query = mysqli_query($connect, $sql);
                                    while ($row2 = mysqli_fetch_array($query)) {
                                        echo number_format($row2['stid']);
                                    }
                                    ?>
                                </h3>

                                <p>Total Pemasukan</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
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
                <!-- Main row -->
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
                                <h3 class="card-title">5 sales dengan total transaksi terbanyak</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- DONUT CHART -->
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">5 sales dengan total belanja terbanyak</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="pieChart1" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
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
            <?php
            include "config.php";
            $sales = "SELECT sp.sales_name FROM `fact_sales` fs JOIN sales_person sp ON fs.sales_person_id = sp.sales_person_id WHERE fs.sales_person_id IS NOT NULL GROUP BY sp.sales_name ORDER BY COUNT(sp.sales_name) DESC LIMIT 5";
            $orderqty = "SELECT COUNT(sp.sales_name) AS total_sales FROM `fact_sales` fs JOIN sales_person sp ON fs.sales_person_id = sp.sales_person_id WHERE fs.sales_person_id IS NOT NULL GROUP BY sp.sales_name ORDER BY total_sales DESC LIMIT 5";
            $i = 1;
            $query_sales = mysqli_query($connect, $sales);
            $jumlah_sales = mysqli_num_rows($query_sales);
            $chart_sales = "";
            while ($row = mysqli_fetch_array($query_sales)) {
                if ($i < $jumlah_sales) {
                    $chart_sales .= '"';
                    $chart_sales .= $row['sales_name'];
                    $chart_sales .= '",';
                    $i++;
                } else {
                    $chart_sales .= '"';
                    $chart_sales .= $row['sales_name'];
                    $chart_sales .= '"';
                }
            }
            $a = 1;
            $query_orderqty = mysqli_query($connect, $orderqty);
            $jumlah_orderqty = mysqli_num_rows($query_orderqty);
            $chart_orderqty = "";
            while ($row1 = mysqli_fetch_array($query_orderqty)) {
                if ($a < $jumlah_orderqty) {
                    $chart_orderqty .= $row1['total_sales'];
                    $chart_orderqty .= ',';
                    $a++;
                } else {
                    $chart_orderqty .= $row1['total_sales'];
                }
            }


            ?>
            //-------------
            //- PIE CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
            var pieData = {
                labels: [
                    <?php echo $chart_sales ?>
                ],
                datasets: [{
                    data: [<?php echo $chart_orderqty ?>],
                    backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                }]
            };
            var pieOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            new Chart(pieChartCanvas, {
                type: 'pie',
                data: pieData,
                options: pieOptions
            })
        })
    </script>
    <script>
        $(function() {
            <?php
            include "config.php";
            $sales = "SELECT sp.sales_name FROM `fact_sales` fs JOIN sales_person sp ON fs.sales_person_id = sp.sales_person_id WHERE fs.sales_person_id IS NOT NULL GROUP BY sp.sales_name ORDER BY SUM(fs.line_total) DESC LIMIT 5";
            $orderqty = "SELECT SUM(fs.line_total) AS total_sales FROM `fact_sales` fs JOIN sales_person sp ON fs.sales_person_id = sp.sales_person_id WHERE fs.sales_person_id IS NOT NULL GROUP BY sp.sales_name ORDER BY total_sales DESC LIMIT 5";
            $i = 1;
            $query_sales = mysqli_query($connect, $sales);
            $jumlah_sales = mysqli_num_rows($query_sales);
            $chart_sales = "";
            while ($row = mysqli_fetch_array($query_sales)) {
                if ($i < $jumlah_sales) {
                    $chart_sales .= '"';
                    $chart_sales .= $row['sales_name'];
                    $chart_sales .= '",';
                    $i++;
                } else {
                    $chart_sales .= '"';
                    $chart_sales .= $row['sales_name'];
                    $chart_sales .= '"';
                }
            }
            $a = 1;
            $query_orderqty = mysqli_query($connect, $orderqty);
            $jumlah_orderqty = mysqli_num_rows($query_orderqty);
            $chart_orderqty = "";
            while ($row1 = mysqli_fetch_array($query_orderqty)) {
                if ($a < $jumlah_orderqty) {
                    $chart_orderqty .= $row1['total_sales'];
                    $chart_orderqty .= ',';
                    $a++;
                } else {
                    $chart_orderqty .= $row1['total_sales'];
                }
            }


            ?>
            //-------------
            //- PIE CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var pieChartCanvas = $('#pieChart1').get(0).getContext('2d')
            var pieData = {
                labels: [
                    <?php echo $chart_sales ?>
                ],
                datasets: [{
                    data: [<?php echo $chart_orderqty ?>],
                    backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                }]
            };
            var pieOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            new Chart(pieChartCanvas, {
                type: 'pie',
                data: pieData,
                options: pieOptions
            })
        })
    </script>
</body>

</html>