<?php
//session_start();
// echo '<pre>';
// //var_dump($_SESSION["user_id"]);
// print_r($_SESSION);
// echo '</pre>';
function showquantity(){
  $total_quantity = 0;
  if(isset($_SESSION['cart'])&&(is_array($_SESSION['cart'])))
    {
      for ($i=0; $i < sizeof($_SESSION['cart']) ; $i++) { 
        $total_quantity += $_SESSION['cart'][$i][3];
      }
      echo $total_quantity;
    }else
    echo 0;
}
?>

<!DOCTYPE php>

<head>
  <title>Home</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href="images/icons/favicon.png" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <!--===============================================================================================-->
</head>

<body class="animsition">


  <header class="header-v4">
    <!-- Header desktop -->
    <div class="container-menu-desktop">

      <div class="wrap-menu-desktop how-shadow1">
        <nav class="limiter-menu-desktop container">

          <!-- Logo desktop -->
          <a href="index.php" class="logo">
            <img src="images/icons/logo-01.png" alt="IMG-LOGO">
          </a>

          <!-- Menu desktop -->
          <div class="menu-desktop">
            <ul class="main-menu">
              <li>
                <a href="index.php">Trang chủ</a>

              </li>

              <li>
                <a href="product.php">Sản phẩm</a>
              </li>
              <li>
                <a href="about.php">Về chúng tôi</a>
              </li>

              <li>
                <a href="contact.php">Liên hệ</a>
              </li>
            </ul>
          </div>

          <!-- Icon header -->
          <div class="wrap-icon-header flex-w flex-r-m">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
              <i class="zmdi zmdi-search"></i>
            </div>

            <a href="shopping-cart.php" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="<?php showquantity(); ?>">
              <i class="zmdi zmdi-shopping-cart"></i></a>
            <?php 
            
            if (isset($_SESSION["user_login"])) {
								echo '<a href="info-user.php" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 ">
                <i class="zmdi zmdi-face"></i>
              </a>';
            }
								else{
                  echo '<a href="login.php" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 ">
                  <i class="zmdi zmdi-face"></i>
                </a>';
                }
							 ?>
            </a>
          </div>
        </nav>
      </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
      <!-- Logo moblie -->
      <div class="logo-mobile">
        <a href="index.php"><img src="images/icons/logo-01.png" alt="IMG-LOGO"></a>
      </div>

      <!-- Icon header -->
      <div class="wrap-icon-header flex-w flex-r-m m-r-15">
        <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
          <i class="zmdi zmdi-search"></i>
        </div>

        <a href="shoping-cart.php"
          class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti ">
          <i class="zmdi zmdi-shopping-cart"></i>
              </a>

        <a href="login.php" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti">
          <i class="zmdi zmdi-face"></i>
        </a>
      </div>

      <!-- Button show menu -->
      <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
      </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">

      <ul class="main-menu-m">Trang chủ
        <li>
          <a href="index.php">Home</a>
          <span class="arrow-main-menu-m">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
          </span>
        </li>

        <li>
          <a href="product.php">Sản phẩm</a>
        </li>

        <li>
          <a href="about.php">Về chúng tôi</a>
        </li>

        <li>
          <a href="contact.php">Liên hệ</a>
        </li>
      </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
      <div class="container-search-header">
        <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
          <img src="images/icons/icon-close2.png" alt="CLOSE">
        </button>

        <form class="wrap-search-header flex-w p-l-15">
          <button class="flex-c-m trans-04">
            <i class="zmdi zmdi-search"></i>
          </button>
          <input class="plh3" type="text" name="search" placeholder="Search...">
        </form>
      </div>
    </div>
  </header>