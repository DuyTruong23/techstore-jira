<?php require_once("/xampp/htdocs/TechStorePHP/entities/brand.class.php"); ?>
<?php
    if(isset($_GET['brand_id'])){
        $brand_id = $_GET['brand_id'];
        $brand = Brand::findBrand($brand_id);
        $result = Brand::deleteBrand($brand_id);
        if($result){
            echo "<script>alert('Xóa thành công');</script>";
            echo "<script>window.location.href='/TechStorePHP/admin/brand.php';</script>";
        }
        else{
            echo "<script>alert('Xóa thất bại');</script>";
            echo "<script>window.location.href='/TechStorePHP/admin/brand.php';</script>";
        }
    }