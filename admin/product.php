<?php require_once("/xampp/htdocs/TechStorePHP/entities/product.class.php");
$product = Product::list_product();
?>

<!-- Header -->
<?php include_once("./inc/header-admin.php");
?>




<!-- Navbar -->
<?php include_once("./inc/navbar-admin.php"); ?>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<!-- body -->
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
                            <li class="breadcrumb-item active">Sản phẩm</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Table head options start -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Quản lý sản phẩm</h4>
                            </br>
                            <a href="add-product.php"> <button class="btn btn-primary btn-min-width mr-0 mb-0"
                                    type="submit">Thêm mới</button></a>
                         
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
                                            <th scope="col">Mã sản phẩm</th>
                                            <th scope="col">Thương hiệu</th>
                                            <th scope="col">Danh mục</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ( $product as $item) : ?>
                                        <tr>
                                            <th scope="row"><?php echo $item["product_id"]; ?></th>
                                            <td><?php echo $item["category_name"]; ?></td>
                                            <td><?php echo $item["brand_name"]; ?></td>
                                            <td><?php echo $item["product_name"]; ?></td>
                                            
                                            <td>
                                                <a href="edit-product.php?product_id=<?php echo $item["product_id"]; ?>">
                                                    <button type="button" class="btn btn-info btn-min-width mr-1 mb-1">
                                                        <i class="ft-edit"></i>
                                                    </button></a>
                                                <a href="delete-product.php?product_id=<?php echo $item["product_id"]; ?>">
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
            <!-- Table head options end -->
        </div>
    </div>
</div>
<!-- end body -->
<!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include_once("./inc/footer-admin.php"); ?>