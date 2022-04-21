<?php require_once("/xampp/htdocs/TechStorePHP/entities/brand.class.php"); 
if (isset($_POST["btnsubmit"])) {
    $brand_id = "";
    $name = $_POST["name"];
    $status = $_POST["status"];
    $created_at = "";

    $newBrand = new Brand($brand_id,$name, $status, $created_at);
    $result = $newBrand->createBrand();
    if (!$result) {
        header("Location: add-brand.php?failure");
    } else {
        header("Location: add-brand.php?inserted");
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
                            <li class="breadcrumb-item active">Thêm thương hiệu
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
                                <h4 class="card-title">Thêm thương hiệu</h4>
                            </div>
                            <div class="card-block">
                                <div class="card-body">
                                    <h5 class="mt-2">Tên</h5>
                                    <fieldset class="form-group">
                                        <input type="text" class="form-control" id="basicInput" name="name"
                                        value="<?php echo isset($_POST["name"]) ? $_POST["name"] : ""; ?>">
                                    </fieldset>
                                    <h5 class="mt-2">Trạng thái</h5>
                                    <fieldset class="form-group">
                                        <select class="custom-select" id="customSelect" name="status">                                           
                                            <option value="1">Hiển thị</option>
                                            <option value="2">Ẩn</option>
                                        </select>
                                        </select>
                                    </fieldset>
                                    

                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                <button class="btn btn-primary btn-min-width mr-0 mb-0" type="submit" name="btnsubmit">Xác
                        nhận</button>
                <a href="/TechStorePHP/admin/brand.php"> <button class="btn btn-secondary btn-min-width mr-0 mb-0"
                        >Hủy</button></a>
                <!-- </section> -->
            </form>
        </div>
    </div>
</div>
<!-- end body -->
<!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include_once("./inc/footer-admin.php"); ?>