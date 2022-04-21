<?php require_once("/xampp/htdocs/TechStorePHP/entities/category.class.php"); ?>
<?php
    if(isset($_GET['category_id'])){
        $category_id = $_GET['category_id'];
        $category = Category::findCategory($category_id);
        $result = Category::deleteCategory($category_id);
        if($result){
            echo "<script>alert('Xóa thành công');</script>";
            echo "<script>window.location.href='/TechStorePHP/admin/category.php';</script>";
        }
        else{
            echo "<script>alert('Xóa thất bại');</script>";
            echo "<script>window.location.href='/TechStorePHP/admin/category.php';</script>";
        }
    }