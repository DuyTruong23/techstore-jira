<?php require_once("/xampp/htdocs/TechStorePHP/entities/category.class.php"); 
if (isset($_GET["category_id"])) {
    $category_id = $_GET['category_id'];

    $category = Category::findCategory($category_id);

}
if(isset($_POST["update"])){
    $category_id = $_GET["category_id"];
    $name = $_POST["name"];
    $status = $_POST["status"];
    $create_at = "";

    $result = Category::updateCategory($category_id,  $name,  $status, $create_at);
    if ($result) {
        echo "<script>alert('Update thành công');</script>";
        echo "<script>window.location.href='/TechStorePHP/admin/category.php';</script>";
    } else {
        echo "<script>alert('Update thất bại');</script>";
        echo "<script>window.location.href='/TechStorePHP/admin/category.php';</script>";
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
                            <li class="breadcrumb-item active">Cập nhật danh mục
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <form action="edit-category.php?category_id=<?php echo $_GET["category_id"]; ?>" method="post">
                <!-- <section class="textarea-select"> -->
                <div class="row match-height">
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Cập nhật danh mục</h4>
                            </div>
                            <div class="card-block">
                                <div class="card-body">
                                    <h5 class="mt-2">Tên</h5>
                                    <fieldset class="form-group">
                                        <input type="text" class="form-control" id="basicInput" name="name"
                                        value="<?php if(isset($category['name'])) echo($category['name']);?>">
                                    </fieldset>
                                    <h5 class="mt-2">Trạng thái</h5>
                                    <fieldset class="form-group">
                                        <select class="custom-select" id="customSelect" name="status"> 
                                            <option value="1"<?=$category['status'] == '1' ? ' selected="selected"' : '';?>>Hiển thị</option>
                                            <option value="0"<?=$category['status'] == '0' ? ' selected="selected"' : '';?>>Ẩn</option>   
                                        </select>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                <button class="btn btn-primary btn-min-width mr-0 mb-0" type="submit" name="update">Xác
                        nhận</button>
                <a href="#"> <button class="btn btn-secondary btn-min-width mr-0 mb-0"
                        >Hủy</button></a>
                <!-- </section> -->
            </form>
        </div>
    </div>
</div>
<!-- end body -->
<!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include_once("./inc/footer-admin.php"); ?>