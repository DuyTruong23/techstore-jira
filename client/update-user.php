<?php include_once("include/header.php"); ?>

<!-- Cart -->
<?php include_once("include/cart.php"); ?>



<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
  <h2 class="ltext-105 cl0 txt-center">
    Cập nhật thông tin
  </h2>
</section>


<!-- Content page -->
<section class="bg0 p-t-104 p-b-116">
  <div class="container">
    <nav>
      <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
          aria-controls="nav-home" aria-selected="true">Cập nhật thôn tin</a>
        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
          aria-controls="nav-profile" aria-selected="false">Đổi mật khẩu</a>
      </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="container ">
          <div class="size-210 bor10 mx-auto p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md align-items-center">
            <form>
              <h4 class="mtext-105 cl2 txt-center p-b-30">
                Cập nhật thông tin
              </h4>

              <div class="bor8 m-b-20 how-pos4-parent">
                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email"
                  placeholder="Họ và Tên">
                <i class="zmdi zmdi-account-circle how-pos4 pointer-none"></i>
              </div>

              <div class="bor8 m-b-20 how-pos4-parent">
                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email"
                  placeholder="Số điện thoại">
                <i class="zmdi zmdi-phone how-pos4 pointer-none"></i>
              </div>
              <div class="bor8 m-b-20 how-pos4-parent">
                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Địa chỉ">
                <i class="zmdi zmdi-pin how-pos4 pointer-none"></i>
              </div>

              <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                Xác nhận
              </button>
            </form>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <div class="container">
          <div class="size-210 bor10 mx-auto p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md align-items-center">
            <form>
              <h4 class="mtext-105 cl2 txt-center p-b-30">
                Đổi mật khẩu
              </h4>

              <div class="bor8 m-b-20 how-pos4-parent">
                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="email"
                  placeholder="Mật khẩu cũ">
                <i class="zmdi zmdi-plus how-pos4 pointer-none"></i>
              </div>

              <div class="bor8 m-b-20 how-pos4-parent">
                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="email"
                  placeholder="Mật khẩu mới">
                <i class="zmdi zmdi-check how-pos4 pointer-none"></i>
              </div>
              <div class="bor8 m-b-20 how-pos4-parent">
                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="email"
                  placeholder="Nhập lại mật khẩu">
                <i class="zmdi zmdi-check-circle-u how-pos4 pointer-none"></i>
              </div>

              <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                Xác nhận
              </button>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>
<?php include_once("include/footer.php"); ?>