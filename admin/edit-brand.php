<?php require_once("/xampp/htdocs/TechStorePHP/entities/brand.class.php"); 
if (isset($_GET["brand_id"])) {
    $brand_id = $_GET['brand_id'];

    $brand = Brand::findBrand($brand_id);

}
if(isset($_POST["update"])){
    $brand_id = $_GET["brand_id"];
    $name = $_POST["name"];
    $status = $_POST["status"];
    $create_at = "";

    $result = Brand::updateBrand($brand_id,  $name,  $status, $create_at);
    if ($result) {
        echo "<script>alert('Update thành công');</script>";
        echo "<script>window.location.href='/TechStorePHP/admin/brand.php';</script>";
    } else {
        echo "<script>alert('Update thất bại');</script>";
        echo "<script>window.location.href='/TechStorePHP/admin/brand.php';</script>";
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
                <h3 class="content-header-title"></h3>
            </div>
            <div class="content-header-right col-md-8 col-12">
                <div class="breadcrumbs-top float-md-right">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Cập nhật thương hiệu
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <form action="edit-brand.php?brand_id=<?php echo $_GET["brand_id"]; ?>" method="post">
                <!-- <section class="textarea-select"> -->
                <div class="row match-height">
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Cập nhật thương hiệu</h4>
                            </div>
                            <div class="card-block">
                                <div class="card-body">
                                    <h5 class="mt-2">Tên</h5>
                                    <fieldset class="form-group">
                                        <input type="text" class="form-control" id="basicInput" name="name"
                                        value="<?php if(isset($brand['name'])) echo($brand['name']);?>">
                                    </fieldset>
                                    <h5 class="mt-2">Trạng thái</h5>
                                    <fieldset class="form-group">
                                        <select class="custom-select" id="customSelect" name="status"> 
                                            <option value="1"<?=$brand['status'] == '1' ? ' selected="selected"' : '';?>>Hiển thị</option>
                                            <option value="2"<?=$brand['status'] == '2' ? ' selected="selected"' : '';?>>Ẩn</option>   
                                        </select>
                                        </select>
                                    </fieldset>
                                    

                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                <button class="btn btn-primary btn-min-width mr-0 mb-0" type="submit" name="update">Xác
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