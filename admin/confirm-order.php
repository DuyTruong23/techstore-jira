<?php require_once("/xampp/htdocs/TechStorePHP/entities/orders.class.php"); 
if (isset($_GET["orders_id"])) {
    $orders_id = $_GET['orders_id'];

    if (isset($_POST["btnsubmit"])) {
        $order_code = $_POST["order_code"];
        $result = Orders::confirmOrder($orders_id,  $order_code);
        if ($result) {
            echo "<script>window.location.href='/TechStorePHP/admin/order.php';</script>";
        } else {
            echo "<script>window.location.href='/TechStorePHP/admin/order.php';</script>";
        }
    }

}


?>
<!-- Header -->
<?php include_once("./inc/header-admin.php"); ?>
<!-- Navbar -->
<?php include_once("./inc/navbar-admin.php"); ?>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<!-- body -->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
            <?php
                if (isset($_GET["inserted"])) {
                    echo "<h2>Thêm thương hiệu thành công</h2>";
                } else if (isset($_GET["failure"])) {
                echo "<h2>Thêm thương hiệu thất bại</h2>";
                }
            ?>
                <h3 class="content-header-title"></h3>
            </div>
            <div class="content-header-right col-md-8 col-12">
                <div class="breadcrumbs-top float-md-right">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Xác nhận đơn
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <form method="post">
                <!-- <section class="textarea-select"> -->
                <div class="row match-height">
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Xác nhận đơn</h4>
                            </div>
                            <div class="card-block">
                                <div class="card-body">
                                    <h5 class="mt-2">Mã vận đơn</h5>
                                    <fieldset class="form-group">
                                        <input type="text" class="form-control" id="basicInput" name="order_code"
                                         required>
                                    </fieldset>
                                   
                                    

                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                <button class="btn btn-primary btn-min-width mr-0 mb-0" type="submit" name="btnsubmit">Xác
                        nhận</button>
                <a href="/TechStorePHP/admin/order.php" class="btn btn-secondary btn-min-width mr-0 mb-0"> 
                        Hủy</a>
                <!-- </section> -->
            </form>
        </div>
    </div>
</div>
<!-- end body -->
<!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include_once("./inc/footer-admin.php"); ?>