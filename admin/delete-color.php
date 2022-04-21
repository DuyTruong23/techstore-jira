<?php require_once("/xampp/htdocs/TechStorePHP/entities/color.class.php"); ?>
<?php
    if(isset($_GET['color_id'])){
        $color_id = $_GET['color_id'];
        $color = Color::findColor($color_id);
        $result = Color::deleteColor($color_id);
        if($result){
            echo "<script>alert('Xóa thành công');</script>";
            echo "<script>window.location.href='/TechStorePHP/admin/color.php';</script>";
        }
        else{
            echo "<script>alert('Xóa thất bại');</script>";
            echo "<script>window.location.href='/TechStorePHP/admin/color.php';</script>";
        }
    }