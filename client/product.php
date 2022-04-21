<?php require_once("/xampp/htdocs/TechStorePHP/entities/product.class.php");
require_once("/xampp/htdocs/TechStorePHP/entities/category.class.php");
$products = Product::list_product_show_in_product_page();
$categories = Category::list_category();
?>
<!-- Header -->
<?php include_once("include/header.php"); ?>

<!-- Cart -->
<?php include_once("include/cart.php"); ?>


<!-- Product -->
<div class="bg0 m-t-23 p-b-140">
  <div class="container">
    <div class="flex-w flex-sb-m p-b-52">
      <div class="flex-w flex-l-m filter-tope-group m-tb-10">
        <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
          Tất cả sản phẩm
        </button>
        <?php foreach ( $categories as $item) : ?>
        <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".<?php echo $item["category_id"]; ?>">
        <?php echo $item["name"]; ?>
        </button>
        <?php endforeach; ?>
      </div>

      <div class="flex-w flex-c-m m-tb-10">
        <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
          <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
          <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
          Bộ lọc
        </div>

        <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
          <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
          <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
          Tìm kiếm
        </div>
      </div>

      <!-- Search product -->
      <div class="dis-none panel-search w-full p-t-10 p-b-15">
        <div class="bor8 dis-flex p-l-15">
          <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
            <i class="zmdi zmdi-search"></i>
          </button>

          <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Tìm kiếm">
        </div>
      </div>

      <!-- Filter -->
      <?php include_once("include/filter.php"); ?>
    </div>

    <div class="row isotope-grid">
    <?php foreach ( $products as $item) : ?>
      <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo $item["category_id"]; ?>">
        <!-- Block2 -->
        <div class="block2">
          <div class="block2-pic hov-img0">
            <img src="images/product/<?php echo $item["image"]; ?>" alt="IMG-PRODUCT">

            <a href="product-detail.php?product_id=<?php echo $item["product_id"]; ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
              Chi tiết
            </a>
          </div>

          <div class="block2-txt flex-w flex-t p-t-14">
            <div class="block2-txt-child1 flex-col-l ">
              <a href="product-detail.php?product_id=<?php echo $item["product_id"]; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
              <?php echo $item["product_name"]; ?>
              </a>
              <a class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
              <?php echo $item["color_name"]; ?>
              </a>
              <span class="stext-105 cl3">
              <?php echo number_format($item["price"], 0, '', ','); ?> VNĐ
              </span>
            </div>

            <div class="block2-txt-child2 flex-r p-t-3">
              <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
              </a>
            </div>
          </div>
        </div>
       
      </div>
      <?php endforeach; ?>
    </div>

    <!-- Load more -->
    <div class="flex-c-m flex-w w-full p-t-45">
      <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
        Xem thêm
      </a>
    </div>
  </div>
</div>


<!-- Footer -->
<?php include_once("include/footer.php"); ?>