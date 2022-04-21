<?php 
require_once("/xampp/htdocs/TechStorePHP/entities/orderdetail.class.php");
require_once("/xampp/htdocs/TechStorePHP/entities/storehouse.class.php");
require_once("/xampp/htdocs/TechStorePHP/entities/orders.class.php");
if (isset($_GET["orders_id"])) {
    $orders_id = $_GET['orders_id'];
    $order_info = Orderdetail::findOrderdetail($orders_id);
    $customer_info = Orders::findInforCustomer($orders_id);
    function findPrice(int $product_id,int $color_id){
        $result = Storehouse::findPriceOfProduct($product_id,$color_id);
        echo $result["price"];
    }
}
?>
<!-- Header -->
<?php include_once("./inc/header-admin.php"); ?>
<!-- Navbar -->
<?php include_once("./inc/navbar-admin.php"); ?>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">

            </div>
            <div class="content-header-right col-md-8 col-12">
                <div class="breadcrumbs-top float-md-right">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Thông tin đơn hàng
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!--native-font-stack -->


            <!-- Description list alignment -->
            <section id="description-list-alignment">

                <div class="row match-height">
                    <!-- Description lists horizontal -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Thông tin đơn hàng
                                </h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">

                                    <div class="col-12">
                                        <div class="card-text">
                                            <dl class="row">
                                                <dt class="col-sm-3">Mã đơn</dt>
                                                <dd class="col-sm-9">
                                                    <dl class="row">
                                                        <dt class="col-sm-12"><?php if($customer_info["order_code"] != 0) echo $customer_info["order_code"]; else echo "(Chưa có)"; ?></dt>
                                                    </dl>
                                                </dd>
                                            </dl>
                                            <dl class="row">
                                                <dt class="col-sm-3">Họ và tên</dt>
                                                <dd class="col-sm-9"><?php echo $customer_info["name"] ?></dd>
                                            </dl>
                                            <dl class="row">
                                                <dt class="col-sm-3">Số điện thoại</dt>
                                                <dd class="col-sm-9"><?php echo $customer_info["phone"] ?></dd>
                                            </dl>
                                            <dl class="row">
                                                <dt class="col-sm-3">Địa chỉ</dt>
                                                <dd class="col-sm-9"><?php echo $customer_info["address"] ?></dd>
                                            </dl>
                                            <dl class="row">
                                                <dt class="col-sm-3">Ghi chú</dt>
                                                <dd class="col-sm-9"><?php if($customer_info["note"] != '') echo $customer_info["note"]; else echo "(Trống)"; ?></dd>
                                            </dl>
                                            <dl class="row">
                                                <dt class="col-sm-3">Tổng tiền</dt>
                                                <dd class="col-sm-9"><?php echo number_format($customer_info["total"], 0, '', ',').' VNĐ'; ?></dd>
                                            </dl>

                                            <dl class="row">
                                                <dt class="col-sm-3">Trạng thái</dt>
                                                <dd class="col-sm-9">
                                                    <dl class="row">
                                                        <dt class="col-sm-12"><?php if($customer_info["status"] == 2) echo 'Đã xác nhận';
                                                elseif($customer_info["status"] == 1) echo 'Đợi xác nhận';
                                                ?></dt>
                                                    </dl>
                                                </dd>
                                            </dl>
                                            <dl class="row">
                                                <dt class="col-sm-3">Ngày tạo</dt>
                                                <dd class="col-sm-9"><?php echo $customer_info["created_at"] ?></dd>
                                            </dl>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Description lists horizontal-->
                </div>
            </section>

            <!-- table list product -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Danh sách sản phẩm</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li>
                                        <a data-action="collapse"><i class="ft-minus"></i></a>
                                    </li>
                                    <li>
                                        <a data-action="reload"><i class="ft-rotate-cw"></i></a>
                                    </li>
                                    <li>
                                        <a data-action="expand"><i class="ft-maximize"></i></a>
                                    </li>
                                    <li>
                                        <a data-action="close"><i class="ft-x"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="text-center" scope="col">#</th>
                                            <th class="text-center" scope="col">Tên</th>
                                            <th class="text-center" scope="col">Số lượng</th>
                                            <th class="text-center" scope="col">Đơn giá</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ( $order_info as $item) : ?>
                                        <tr>
                                            <th class="text-center" scope="row"><?php echo $item["product_id"]; ?></th>
                                            <td class="text-center"><?php echo $item["product_name"].' '.$item["color_name"]; ?></td>
                                            <td class="text-center"><?php echo $item["quantity"]; ?></td>
                                            <td class="text-center"><?php
                                            $price = findPrice($item["product_id"],$item["color_id"]);
                                            echo number_format($price, 0, '', ',').' VNĐ'; ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include_once("./inc/footer-admin.php"); ?>