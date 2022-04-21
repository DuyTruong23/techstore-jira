<?php require_once("/xampp/htdocs/TechStorePHP/entities/orders.class.php");
$orders = Orders::list_orders();
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
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Đơn hàng</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Quản lý đơn hàng</h4>
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
                                            <th class="text-center" scope="col">Tổng tiền</th>
                                            <th class="text-center" scope="col">Mã vận đơn</th>
                                            <th class="text-center" scope="col">Trạng thái</th>
                                            <th class="text-center" scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ( $orders as $item) : ?>
                                        <tr>
                                            <th class="text-center" scope="row"><?php echo $item["orders_id"]; ?></th>
                                            <td class="text-center"><?php echo number_format($item["total"], 0, '', ',').' VNĐ'; ?></td>
                                            <td class="text-center"><?php if($item["order_code"] != 0) echo $item["order_code"]; else echo "Chưa có" ?></td>
                                            <td class="text-center"><?php if($item["status"] == 2) echo 'Đã xác nhận';
                                                elseif($item["status"] == 1) echo 'Đợi xác nhận';
                                                ?></td>
                                            <td>
                                                <?php if($item["status"] == 1) :?>
                                                <a href="confirm-order.php?orders_id=<?php echo $item["orders_id"]; ?>">
                                                    <button type="button"
                                                        class="btn btn-success btn-min-width mr-1 mb-1">
                                                        <i class="ft-check"></i>
                                                    </button></a>
                                                    <?php endif; ?>
                                                <a href="order-detail.php?orders_id=<?php echo $item["orders_id"]; ?>">
                                                    <button type="button" class="btn btn-info btn-min-width mr-1 mb-1">
                                                        <i class="ft-eye"></i>
                                                    </button></a>

                                                <a href="delete-order.php?orders_id=<?php echo $item["orders_id"]; ?>">
                                                    <button type="button"
                                                        class="btn btn-danger btn-min-width mr-1 mb-1">
                                                        <i class="ft-delete"></i>
                                                    </button></a>
                                                </button>
                                            </td>

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