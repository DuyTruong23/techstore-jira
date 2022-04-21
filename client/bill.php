<?php

// tong tien

function totalBill(){
    $total_bill= 0;
    if(isset($_SESSION['cart'])&&(is_array($_SESSION['cart'])))
    {
 
            for ($i=0; $i < sizeof($_SESSION['cart']) ; $i++) { 
              $total = $_SESSION['cart'][$i][2] *$_SESSION['cart'][$i][3];
              $total_bill +=$total;           
    }
      
  }


if(isset($_POST['accept'])&&($_POST['accept']))
        {
            echo ' <div>
            <h1>Thông tin hoá đơn</h1>
            <h4></h4>
                            
            </div>';


            $id = $_POST['id'];
            $id = $_POST['id'];
            $id = $_POST['id'];
            $id = $_POST['id'];
            $id = $_POST['id'];
        }
?>



<?php include_once("include/header.php"); ?>

<!-- Cart -->
<?php include_once("include/cart.php"); ?>


<!-- breadcrumb -->
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
            Trang chủ
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            Hoá đơn
        </span>
    </div>
</div>


<!-- Shoping Cart -->

    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                <?php  ?>    
               
            

                    
                </div>
            </div>
        </div>
    </div>





<!-- Footer -->
<?php include_once("include/footer.php"); ?>