<?php require_once("/xampp/htdocs/TechStorePHP/entities/orders.class.php");
    require_once("/xampp/htdocs/TechStorePHP/entities/orderdetail.class.php");
?>
<?php
    if(isset($_GET['orders_id'])){
        $orders_id = $_GET['orders_id'];
        $result = Orderdetail::deleteOrderdetail($orders_id);
       
        if($result){
            $result2 = Orders::deleteOrder($orders_id);
            if($result2){
                echo "<script>alert('Xóa thành công');</script>";
                echo "<script>window.location.href='/TechStorePHP/admin/order.php';</script>";
            }else{
                echo "<script>alert('Xóa thất bại');</script>";
                echo "<script>window.location.href='/TechStorePHP/admin/order.php';</script>";
            }
            
        }else{
            echo "<script>alert('Xóa thất bại');</script>";
            echo "<script>window.location.href='/TechStorePHP/admin/order.php';</script>";
        }
        
    }