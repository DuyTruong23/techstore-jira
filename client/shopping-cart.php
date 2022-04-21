<?php
require_once("/xampp/htdocs/TechStorePHP/entities/orders.class.php"); 
require_once("/xampp/htdocs/TechStorePHP/entities/orderdetail.class.php"); 
require_once("/xampp/htdocs/TechStorePHP/entities/storehouse.class.php"); 
  session_start();
  //cart
  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart']=[];
  }
  //delete cart
  if(isset($_GET['delcart'])&&($_GET['delcart']==1)) unset($_SESSION['cart']);
    //delete product in cart
    if(isset($_GET['delid'])&&($_GET['delid']>=0)){
        array_splice($_SESSION['cart'],$_GET['delid'],1);
     }
  //get data
  if(isset($_POST['addcart'])&&($_POST['addcart']))
  { 

    $product_id = $_POST['product_id'];
    $product_name  = $_POST['product_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $color_id = $_POST['color_id'];
    $color_name = $_POST['color_name'];
      
    //check exist product in cart by product_id and color_id
      $fl=0; 
      for ($i=0; $i < sizeof($_SESSION['cart']); $i++) { 
          
          if($_SESSION['cart'][$i][0]==$product_id && $_SESSION['cart'][$i][4]==$color_id){
              $fl=1;
              $newquantity = $quantity+$_SESSION['cart'][$i][3];
              $_SESSION['cart'][$i][3]=$newquantity;
              break;
          }
      }

      if( $fl==0)
      {
        $product = [$product_id,$product_name, $price, $quantity,$color_id,$color_name];
        array_push($_SESSION['cart'], $product);
       // var_dump($_SESSION['cart']);
      }
  }

  function showCart(){
    if(isset($_SESSION['cart'])&&(is_array($_SESSION['cart'])))
    {
            $total_bill= 0;
            $_SESSION["total_bill"] = 0;
            for ($i=0; $i < sizeof($_SESSION['cart']) ; $i++) { 
              $total = $_SESSION['cart'][$i][2] *$_SESSION['cart'][$i][3];
              $total_bill +=$total;
              $_SESSION["total_bill"]  +=$total;
              echo '
              
              <tr class="table_row">
                <td class="column-1">'.($i+1).'</td> 
                <td class="column-2">'.$_SESSION['cart'][$i][1].' '.$_SESSION['cart'][$i][5].' x '.$_SESSION['cart'][$i][3].'</td>
                <td class="column-3"  style="width: 200px;">'.number_format($_SESSION['cart'][$i][2], 0, '', ',').' VNĐ'.'</td>
                <td class="column-4"  style="width: 200px;">'.number_format($total, 0, '', ',').' VNĐ'.'</td>
                <td class="column-5">
                <a href="shopping-cart.php?delid='.$i.'"> Xoá </a>
                </td>
              </tr>
                ';
            }
            echo'
            <tr class="table_head">
                                <th class="column-1"> </th>
                                <th class="column-2"> </th>
                                <th class="column-3"> </th>
                                <th class="column-4">Tổng tiền </th>
                                <th class="column-5"  style="width: 200px;">'.number_format($total_bill, 0, '', ',').' VNĐ'.'</th>
                            </tr>
            ';             
    }
    else{
        echo '
        <div>
        <h3>Giỏ hàng trống</h3>
        </div>
        ';
    }
      
  }
  //end cart
//check out

if (isset($_POST['btnCheckout'])) {
        $orders_id = '';
        $customer_id = $_SESSION["user_login"]["customer_id"];
        $address = $_POST["address"];
        $note = $_POST["note"];
        $total = $_SESSION["total_bill"];
        $order_code = 0;
        $status = 1;
        $employee_id = "";
        $created_at = "";

        $newOrder = new Orders($orders_id,$customer_id,$address,$note,$total,$order_code,$status,$created_at,$employee_id);
        //var_dump($newOrder);
        $result = $newOrder->createOrder();

        if(!$result){
            echo "<script>alert('Đặt hàng thất bại!');</script>";
        }else {
            $recentOrder = Orders::getRecentOrder();  
            if(isset($_SESSION['cart'])&&(is_array($_SESSION['cart'])))
            {
                for ($i=0; $i < sizeof($_SESSION['cart']) ; $i++) {
                    $product_id = (int) $_SESSION['cart'][$i][0];
                    $orders_id = (int) $recentOrder["orders_id"];
                    $color_id = (int) $_SESSION['cart'][$i][4];
                    $quantity = $_SESSION['cart'][$i][3]; 

                    //check quantity in storehouse
                    $total_storehouse = Storehouse::getTotalQuantityProduct($product_id,$color_id);
                   
                    $total_orderdetail = Orderdetail::getTotalQuantityProduct($product_id,$color_id);
                    
                    if($total_orderdetail != null  && $total_storehouse != null){
                        $total_quantity_in_storehouse = $total_storehouse["total_quantity"];
                        $total_quantity_in_orderdetail = $total_orderdetail["total_quantity"];
                        if($total_quantity_in_storehouse > $total_quantity_in_orderdetail){
                            //add to db
                            $newOrderdetail = new Orderdetail($product_id, $orders_id, $color_id, $quantity);
                            //var_dump($newOrderdetail);
                            $result2 = $newOrderdetail->createOrderdetail();

                            if (!$result2) {
                                echo "<script>alert('Đặt hàng thất bại!');</script>";
                            } else {
                                
                                //remove cart cookies
                                unset($_SESSION['cart']);
                                //end remove cart cookies
                                header("location:order-success-notification.php");
                                //echo "<script>alert('Cảm ơn bạn đã đặt hàng, chúng tôi sẽ liên hệ xác nhận trong vài ngày tới!');</script>";
                            }
                        }else{
                            echo "<script>alert('Số lượng sản phẩm vượt quá số lượng trong kho!');</script>";
                        }
                    }else if($total_storehouse != null){
                            //add to db
                            $newOrderdetail = new Orderdetail($product_id, $orders_id, $color_id, $quantity);
                            //var_dump($newOrderdetail);
                            $result2 = $newOrderdetail->createOrderdetail();

                            if (!$result2) {
                                echo "<script>alert('Đặt hàng thất bại!');</script>";
                            } else {
                                
                                //remove cart cookies
                                unset($_SESSION['cart']);
                                //end remove cart cookies
                                header("location:order-success-notification.php");
                               // echo "<script>alert('Cảm ơn bạn đã đặt hàng, chúng tôi sẽ liên hệ xác nhận trong vài ngày tới!');</script>";
                            }
                    }
                    //end check quantity in storehouse
                    
                }
            }
        }
        
        
  }
//end checkout
?>



<?php include_once("include/header.php"); ?>

<!-- Cart -->



<!-- breadcrumb -->
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
            Trang chủ
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            Giỏ hàng
        </span>
    </div>
</div>


<!-- Shoping Cart -->
<form class="bg0 p-t-75 p-b-85" method="post">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                <div class="wrap-table-shopping-cart">
              <table class="table-shopping-cart">
              <tr class="table_head">
                  <th class="column-1">STT</th>
                  <th class="column-2">Sản phẩm</th>
                  <th class="column-3">Giá</th>
                  <th class="column-4">Thành tiền</th>
                  <th class="column-5"></th>
              </tr>
                    <?php showCart(); ?>
                    </tr>
                </table>
                </div>
                <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                       
                            <a  href="shopping-cart.php?delcart=1"><input type="button" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10" value="XÓA GIỎ HÀNG"></a>

                    </div>
                </div>
            </div>

            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl2 p-b-30">
                        Thông tin đặt hàng
                    </h4>

                    <div class="flex-w flex-t bor12 p-b-13">
                        <div class="size-208">
                            <span class="stext-110 cl2">
                                Tên người nhận:
                            </span>
                        </div>
                        <div class="size-209">
                        <div class="bor8 bg0 m-b-12">
                                <input readonly class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="customer_name" value="<?php if (isset( $_SESSION["user_login"])) echo $_SESSION["user_login"]["name"];?>"
                                    >
                            </div>
                        </div>


                    </div>
                    <div class="flex-w flex-t bor12 p-t-15 p-b-13">
                        <div class="size-208 w-full-ssm">
                            <span class="stext-110 cl2">
                                Số điện thoại:
                            </span>
                        </div>

                        <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                            <div class="bor8 bg0 m-b-12">
                                <input readonly class="stext-111 cl8 plh3 size-111 p-lr-15" type="number" name="phone" value="<?php if (isset( $_SESSION["user_login"])) echo $_SESSION["user_login"]["phone"];?>"
                                   >
                            </div>
                        </div>
                    </div>
                    <div class="flex-w flex-t bor12 p-t-15 p-b-13">
                        <div class="size-208 w-full-ssm">
                            <span class="stext-110 cl2">
                                Địa chỉ:
                            </span>
                        </div>

                        <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                            <div class="bor8 bg0 m-b-12">
                                <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="address" value="<?php if (isset( $_SESSION["user_login"])) echo $_SESSION["user_login"]["address"];?>"
                                  required >
                            </div>
                        </div>
                    </div>
                    <div class="flex-w flex-t bor12 p-t-15 p-b-13">
                        <div class="size-208 w-full-ssm">
                            <span class="stext-110 cl2">
                               Ghi chú:
                            </span>
                        </div>

                        <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                            <div class="bor8 bg0 m-b-12">
                                <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="note"
                                   >
                            </div>
                        </div>
                    </div>
                        <input class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" type="submit" value="Thanh toán" name="btnCheckout" id="accept">
                    
                </div>
            </div>
        </div>
    </div>
</form>




<!-- Footer -->
<?php include_once("include/footer.php"); ?>