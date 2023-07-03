<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DWADV K11C | Dashboard</title>

    <?php include "header.php" ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

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
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        include "config.php";
                                        $sql = "SELECT SUM(line_total) as lt from fact_sales";
                                        $query = mysqli_query($connect, $sql);
                                        while ($row2 = mysqli_fetch_array($query)) {
                                            echo "$" . number_format($row2['lt']);
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
                        <!-- ./col -->
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

                                    <p>Unique Product</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-box"></i>
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
                                    <i class="nav-icon fas fa-users"></i>
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
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        include "config.php";
                                        $sql = "SELECT COUNT(employee_id) as empid FROM `employee`";
                                        $query = mysqli_query($connect, $sql);
                                        while ($row2 = mysqli_fetch_array($query)) {
                                            echo number_format($row2['empid']);
                                        }
                                        ?>
                                    </h3>

                                    <p>Total Employee</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-people-carry"></i>
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
                                        $sql = "SELECT COUNT(sales_territory_id) as stid FROM `sales_territory`";
                                        $query = mysqli_query($connect, $sql);
                                        while ($row2 = mysqli_fetch_array($query)) {
                                            echo number_format($row2['stid']);
                                        }
                                        ?>
                                    </h3>

                                    <p>Total Sales Territory</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-globe"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
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

                                    <p>Total Sales Person</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
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
</body>

</html>