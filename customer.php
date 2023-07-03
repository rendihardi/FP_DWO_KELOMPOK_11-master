<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DWADV K11C | Customer</title>

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
                        <h1 class="m-0">Customer</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Customer</li>
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
                                    $sql = "SELECT AVG(line_total) as avg FROM fact_sales";
                                    $query = mysqli_query($connect, $sql);
                                    while ($row2 = mysqli_fetch_array($query)) {
                                        echo "$" . number_format($row2['avg']);
                                    }
                                    ?>
                                </h3>
                                <p>Rata-Rata Beli</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-dollar-sign"></i>
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
                                    $sql = "SELECT COUNT(customer_id) as cid FROM `customer`";
                                    $query = mysqli_query($connect, $sql);
                                    while ($row2 = mysqli_fetch_array($query)) {
                                        echo number_format($row2['cid']);
                                    }
                                    ?>
                                </h3>

                                <p>Unique Customer</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
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
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <!-- BAR CHART -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">10 customer dengan transaksi terbanyak</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- DONUT CHART -->
                        <!-- BAR CHART -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">10 customer dengan total belanja terbanyak</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="barChart1" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.col (RIGHT) -->
                </div>
        </section>
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
            $customer = "SELECT c.customer_name FROM `fact_sales` fs JOIN customer c ON fs.customer_id = c.customer_id WHERE c.customer_name != '' GROUP BY c.customer_name ORDER BY COUNT(c.customer_name) DESC LIMIT 10";
            $orderqty = "SELECT COUNT(c.customer_name) as fscoq FROM `fact_sales` fs JOIN customer c ON fs.customer_id = c.customer_id WHERE c.customer_name != '' GROUP BY c.customer_name ORDER BY fscoq DESC LIMIT 10";
            $i = 1;
            $query_customer = mysqli_query($connect, $customer);
            $jumlah_customer = mysqli_num_rows($query_customer);
            $chart_customer = "";
            while ($row = mysqli_fetch_array($query_customer)) {
                if ($i < $jumlah_customer) {
                    $chart_customer .= '"';
                    $chart_customer .= $row['customer_name'];
                    $chart_customer .= '",';
                    $i++;
                } else {
                    $chart_customer .= '"';
                    $chart_customer .= $row['customer_name'];
                    $chart_customer .= '"';
                }
            }
            $a = 1;
            $query_orderqty = mysqli_query($connect, $orderqty);
            $jumlah_orderqty = mysqli_num_rows($query_orderqty);
            $chart_orderqty = "";
            while ($row1 = mysqli_fetch_array($query_orderqty)) {
                if ($a < $jumlah_orderqty) {
                    $chart_orderqty .= $row1['fscoq'];
                    $chart_orderqty .= ',';
                    $a++;
                } else {
                    $chart_orderqty .= $row1['fscoq'];
                }
            }


            ?>
            //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas = $('#barChart').get(0).getContext('2d')
            //var barChartData = $.extend(true, {}, areaChartData)
            var barChartData = {
                labels: [<?php echo $chart_customer ?>],
                datasets: [{
                    label: 'Customer',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [<?php echo $chart_orderqty ?>]
                }]
            }

            var barChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false
            }

            new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            })
        })
    </script>
    <script>
        $(function() {
            <?php
            include "config.php";
            $customer = "SELECT c.customer_name FROM `fact_sales` fs JOIN customer c ON fs.customer_id = c.customer_id WHERE c.customer_name != '' GROUP BY c.customer_name ORDER BY COUNT(c.customer_name) DESC LIMIT 10";
            $orderqty = "SELECT SUM(fs.line_total) as fscoq FROM `fact_sales` fs JOIN customer c ON fs.customer_id = c.customer_id WHERE c.customer_name != '' GROUP BY c.customer_name ORDER BY fscoq DESC LIMIT 10";
            $i = 1;
            $query_customer = mysqli_query($connect, $customer);
            $jumlah_customer = mysqli_num_rows($query_customer);
            $chart_customer = "";
            while ($row = mysqli_fetch_array($query_customer)) {
                if ($i < $jumlah_customer) {
                    $chart_customer .= '"';
                    $chart_customer .= $row['customer_name'];
                    $chart_customer .= '",';
                    $i++;
                } else {
                    $chart_customer .= '"';
                    $chart_customer .= $row['customer_name'];
                    $chart_customer .= '"';
                }
            }
            $a = 1;
            $query_orderqty = mysqli_query($connect, $orderqty);
            $jumlah_orderqty = mysqli_num_rows($query_orderqty);
            $chart_orderqty = "";
            while ($row1 = mysqli_fetch_array($query_orderqty)) {
                if ($a < $jumlah_orderqty) {
                    $chart_orderqty .= $row1['fscoq'];
                    $chart_orderqty .= ',';
                    $a++;
                } else {
                    $chart_orderqty .= $row1['fscoq'];
                }
            }


            ?>
            //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas = $('#barChart1').get(0).getContext('2d')
            //var barChartData = $.extend(true, {}, areaChartData)
            var barChartData = {
                labels: [<?php echo $chart_customer ?>],
                datasets: [{
                    label: 'Customer',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [<?php echo $chart_orderqty ?>]
                }]
            }

            var barChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false
            }

            new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            })
        })
    </script>
</body>

</html>