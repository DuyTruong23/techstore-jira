<?php require_once("/xampp/htdocs/TechStorePHP/entities/product.class.php"); ?>
<?php
    if(isset($_GET['product_id'])){
        $product_id = $_GET['product_id'];
        $product = Product::findProduct($product_id);
        $result = Product::deleteProduct($product_id);
        if($result){
            echo "<script>alert('Xóa thành công');</script>";
            echo "<script>window.location.href='/TechStorePHP/admin/product.php';</script>";
        }
        else{
            echo "<script>alert('Xóa thất bại');</script>";
            echo "<script>window.location.href='/TechStorePHP/admin/product.php';</script>";
        }
    }