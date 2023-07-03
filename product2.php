<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <?php include "header.php" ?>
    <style>
        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 320px;
            max-width: 660px;
            margin: 1em auto;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #EBEBEB;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }
    </style>
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
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                </div>

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
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
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
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        include "config.php";
                                        $sql = "SELECT COUNT(product_id) as pid FROM `product`";
                                        $query = mysqli_query($connect, $sql);
                                        while ($row2 = mysqli_fetch_array($query)) {
                                            echo number_format($row2['pid']);
                                        }
                                        ?>
                                    </h3>

                                    <p>Jumlah Product</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        include "config.php";
                                        $sql = "SELECT COUNT(DISTINCT(product_category)) as pc FROM `product`;";
                                        $query = mysqli_query($connect, $sql);
                                        while ($row2 = mysqli_fetch_array($query)) {
                                            echo number_format($row2['pc']);
                                        }
                                        ?>
                                    </h3>

                                    <p>Jumlah Kategori Produk</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
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
                                        $sql = "SELECT COUNT(DISTINCT(product_sub_category)) as psc FROM `product`";
                                        $query = mysqli_query($connect, $sql);
                                        while ($row2 = mysqli_fetch_array($query)) {
                                            echo number_format($row2['psc']);
                                        }
                                        ?>
                                    </h3>

                                    <p>Jumlah Sub Kategori Produk</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
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
                                        $sql = "SELECT p.product_name, SUM(fs.order_QTY) AS total_order
                                                FROM fact_sales AS fs
                                                JOIN product AS p ON fs.product_id = p.product_id
                                                GROUP BY fs.product_id, p.product_name
                                                ORDER BY total_order DESC LIMIT 1";
                                        $query = mysqli_query($connect, $sql);
                                        while ($row2 = mysqli_fetch_array($query)) {
                                            echo $row2['product_name'];
                                        }
                                        ?>
                                    </h3>

                                    <p>Produk Paling Banyak terjual</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
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
                                        $sql = "SELECT p.product_name, SUM(fp.order_QTY) AS total_order
                                                FROM fact_purchasing AS fp
                                                JOIN product AS p ON fp.product_id = p.product_id
                                                GROUP BY fp.product_id, p.product_name
                                                ORDER BY total_order DESC LIMIT 1";
                                        $query = mysqli_query($connect, $sql);
                                        while ($row2 = mysqli_fetch_array($query)) {
                                            echo $row2['product_name'];
                                        }
                                        ?>
                                    </h3>

                                    <p>Produk Paling Banyak Purchasing</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                    <!-- Main row -->
                    <figure class="highcharts-figure">
                        <div id="container"></div>
                        <p class="highcharts-description">
                            Pie chart where the individual slices can be clicked to expose more
                            detailed data.
                        </p>
                    </figure>
                    <!-- /.row (main row) -->
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

    <script type="text/javascript">
        <?php
        include "config.php";
        $kategori = "SELECT p.product_category, SUM(fs.order_QTY) AS total_order
                    FROM fact_sales fs
                    JOIN product p ON fs.product_id = p.product_id
                    GROUP BY  p.product_category
                    ORDER BY total_order DESC";
        $all_order = "SELECT SUM(fs.order_QTY) AS all_order FROM fact_sales AS fs";
        $all_order_result = mysqli_query($connect, $all_order);
        $all_order_row = mysqli_fetch_array($all_order_result);
        $all_order_value = $all_order_row["all_order"];
        $query_kategori = mysqli_query($connect, $kategori);
        while ($row = mysqli_fetch_array($query_kategori)) {
            $nm_kategori = $row["product_category"];
            $data_drilldown = array();
            // Query untuk data drilldown
            $drilldown_query = "SELECT p.product_sub_category, SUM(fs.order_QTY) AS total_order
                                FROM fact_sales fs
                                JOIN product p ON fs.product_id = p.product_id
                                WHERE p.product_category = '" . $nm_kategori . "'
                                GROUP BY p.product_sub_category 
                                ORDER BY total_order DESC";
            $query_drilldown = mysqli_query($connect, $drilldown_query);
            while ($drilldown_row = mysqli_fetch_array($query_drilldown)) {
                $product_sub_category = $drilldown_row["product_sub_category"];
                $order_qty = $drilldown_row["total_order"];

                $product_drilldown = array();
                $product_query = "SELECT p.product_name, SUM(fs.order_QTY) AS total_order
                                FROM fact_sales fs
                                JOIN product p ON fs.product_id = p.product_id
                                WHERE p.product_sub_category = '" . $product_sub_category . "'
                                GROUP BY p.product_name 
                                ORDER BY total_order DESC";
                $query_product = mysqli_query($connect, $product_query);
                while ($product_row = mysqli_fetch_array($query_product)) {
                    $product_name = $product_row["product_name"];
                    $product_order_qty = $product_row["total_order"];

                    // Menambahkan data drilldown tingkat 3 (nama produk)
                    $product_drilldown[] = array($product_name, ($order_qty / $product_order_qty) * 10);
                }
                // Menambahkan data drilldown
                $data_drilldown[] = array(
                    "name" => $product_sub_category,
                    "id" => $product_sub_category,
                    "data" => $product_drilldown
                );
            }
            $data_series[] = array(
                "name" => $nm_kategori,
                "y" => ($row["total_order"] / $all_order_value) * 100,
                "drilldown" => $nm_kategori
            );

            // Menambahkan data drilldown
            $data_drilldown_series[] = array(
                "name" => $nm_kategori,
                "id" => $nm_kategori,
                "data" => $data_drilldown
            );
        }
        ?>
        // Create the chart
        Highcharts.chart('container', {
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Penjualan Produk Berdasarkan Kategori'
            },
            subtitle: {
                text: 'Click the slices to product.'
            },

            accessibility: {
                announceNewData: {
                    enabled: true
                },
                point: {
                    valueSuffix: '%'
                }
            },

            plotOptions: {
                series: {
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}: {point.y:.1f}%'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
            },

            series: [{
                name: "Kategori",
                colorByPoint: true,
                data: <?php echo json_encode($data_series); ?>
            }],
            drilldown: {
                series: <?php echo json_encode($data_drilldown_series); ?>
            }
        });
    </script>
    <?php include "pluginScript.php" ?>
</body>

</html>