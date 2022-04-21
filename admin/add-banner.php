<?php require_once("/xampp/htdocs/TechStorePHP/entities/banner.class.php"); 
if (isset($_POST["btnsubmit"])) {
    $id = "";
    $caption = $_POST["txtcaption"];
    $content = $_POST["txtcontent"];
    $status = "";
    $create_at = "";
    $photo = "";
    // $photo = $_FILES["txtpic"];

    $newBanner = new Banner($id,$caption, $content, $photo,$status,$create_at);
    $result = $newBanner->createBanner();
    if (!$result) {
        header("Location: add-banner.php?failure");
    } else {
        header("Location: add-banner.php?inserted");
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
                    echo "<h2>Thêm banner thành công</h2>";
                } else if (isset($_GET["failure"])) {
                echo "<h2>Thêm banner thất bại</h2>";
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
                            <li class="breadcrumb-item active">Thêm banner
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <form method="post" enctype="multipart/form-data">
                <!-- <section class="textarea-select"> -->
                <div class="row match-height">
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Thêm banner</h4>
                            </div>
                            <div class="card-block">
                                <div class="card-body">
                                    <h5 class="mt-2">Tiêu đề</h5>
                                    <fieldset class="form-group">
                                        <input type="text" class="form-control" id="basicInput" name="txtcaption"
                                        value="<?php echo isset($_POST["txtcaption"]) ? $_POST["txtcaption"] : ""; ?>">
                                    </fieldset>
                                    <h5 class="mt-2">Nội dung</h5>
                                    <fieldset class="form-group">
                                        <textarea class="form-control" id="basicTextarea" rows="3" name="txtcontent"
                                        value="<?php echo isset($_POST["txtcontent"]) ? $_POST["txtcontent"] : ""; ?>"></textarea>
                                    </fieldset>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"></h4>
                            </div>
                            <div class="card-block">
                                <div class="card-body">  
                                    <!-- <h5 class="mt-2">Ảnh</h5>
                                    <fieldset class="form-group">
                                        <input type="file" class="form-control-file" id="txtpic" name="txtpic" accept=".PNG,.GIF,.JPG"
                                        value="<?php echo isset($_POST["txtpic"]) ? $_POST["txtpic"] : ""; ?>">
                                    </fieldset> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary btn-min-width mr-0 mb-0" type="submit" name="btnsubmit">Xác
                    nhận</button>
                <a href="#"> <button class="btn btn-secondary btn-min-width mr-0 mb-0">Hủy</button></a>
                <!-- </section> -->
            </form>
        </div>
    </div>
</div>
<!-- end body -->
<!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include_once("./inc/footer-admin.php"); ?>