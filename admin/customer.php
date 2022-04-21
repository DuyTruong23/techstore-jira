<?php require_once("/xampp/htdocs/TechStorePHP/entities/customer.class.php"); ?>
<!-- Header -->
<?php include_once("./inc/header-admin.php"); 
$customer = Customer::list_customer();?>

<!-- Navbar -->
<?php include_once("./inc/navbar-admin.php"); ?>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <h3 class="content-header-title"></h3>
            </div>
            <div class="content-header-right col-md-8 col-12">
                <div class="breadcrumbs-top float-md-right">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Khách hàng</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Striped rows start -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Quản lý khách hàng</h4>
                            </br>
                            <a href="add-customer.php"> <button class="btn btn-primary btn-min-width mr-0 mb-0"
                                    type="submit">Thêm mới</button></a>
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
                                        <th scope="col">ID</th>
                                            <th scope="col">Họ và Tên</th>
                                            <th scope="col">Số điện thoại</th>
                                            <th scope="col">Ngày sinh</th>
                                            <th scope="col">Giới tính</th>
                                            <!-- <th scope="col">Email</th> -->
                                            <!-- <th scope="col">Địa chỉ</th> -->
                                            <th scope="col"></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ( $customer as $item) : ?>
                                        <tr>
                                            <th scope="row"><?php echo $item["customer_id"]; ?></th>
                                            <td><?php echo $item["name"]; ?></td>
                                            <td><?php echo $item["phone"]; ?></td>
                                            <td><?php echo (date_format(date_create($item['birthday']) , 'd/m/Y')); ?></td>
                                            <td>
                                                <?php if($item["gender"] == 1) echo 'Nam';
                                                elseif($item["gender"] == 2) echo 'Nữ';
                                                else echo 'Khác';
                                                ?>
                                            </td>
                                            <!-- <td><?php echo $item["email"]; ?></td>
                                            <td><?php echo $item["address"]; ?></td> -->

                                            <td class="inline-block">
                                                <!-- <a href="detail-product.php">
                                                    <button type="button" class="btn btn-info btn-min-width mr-1 mb-1">
                                                        <i class="ft-info"></i>
                                                    </button></a> -->
                                                <a href="edit-customer.php?id=<?php echo $item["customer_id"]; ?>">
                                                    <button type="button" class="btn btn-info btn-min-width mr-1 mb-1">
                                                        <i class="ft-edit"></i>
                                                    </button></a>
                                                <a href="delete-customer.php?id=<?php echo $item["customer_id"]; ?>">
                                                    <button type="button"
                                                        class="btn btn-danger btn-min-width mr-1 mb-1">
                                                        <i class="ft-delete"></i>
                                                    </button>
                                                </a>
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
            <!-- Striped rows end -->


        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include_once("./inc/footer-admin.php"); ?>