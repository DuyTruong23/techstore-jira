<?php require_once("/xampp/htdocs/TechStorePHP/entities/customer.class.php");  
session_start(); 
if(isset($_POST["btnUpdate"])){
  $customer_id = $_SESSION["user_login"]["customer_id"];
  $name = $_POST["name"];
  $phone = $_POST["phone"];
  $birthday = $_POST["birthday"];
  $gender = $_POST["gender"];
  $address = $_POST["address"];
  $email = $_POST["email"];
  $status = 1;

  $result = Customer::updateCustomer($customer_id, $name, $phone, $birthday, $gender, $email, $address, $status);
  if ($result) {
      echo "<script>window.location.href='/TechStorePHP/client/info-user.php';</script>";
  } else {
      echo "<script>window.location.href='/TechStorePHP/client/info-user.php';</script>";
  }
}

if(isset($_POST["btnChangePass"])){
  $customer_id = $_SESSION["user_login"]["customer_id"];
  $oldPass = md5($_POST["password"]);
  $newPassword = md5($_POST["new_password"]);
  $retyPassword = md5($_POST["retype_password"]);

  if($newPassword == $oldPass || $newPassword != $retyPassword ){
    echo "<script>alert('Mật khẩu không hợp lệ!');</script>";
    echo "<script>window.location.href='/TechStorePHP/client/info-user.php';</script>";
  }
  else{
    $check = Customer::checkPassword($customer_id, $oldPass);
    if ($check) {
      $changePass = Customer::changePass($customer_id,$newPassword);
        echo "<script>window.location.href='/TechStorePHP/client/info-user.php';</script>";
    } else {
      echo "<script>alert('Mật khẩu không hợp lệ!');</script>";
        echo "<script>window.location.href='/TechStorePHP/client/info-user.php';</script>";
    }
  }

  
}
?>


<?php include_once("include/header.php"); ?>

<!-- Cart -->
<?php include_once("include/cart.php"); ?>



<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
  <h2 class="ltext-105 cl0 txt-center">
    Thông tin tài khoản
  </h2>
</section>

<section class="bg0 p-t-104 p-b-116">
  <div class="container">
    <div class="row">
      <div class="col-2 bor6">
        <div class="nav flex-column filter-tope-group" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <a class="nav-link stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" id="v-pills-home-tab"
            data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Thông
            tin</a>
          <a class="nav-link stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" id="v-pills-profile-tab" data-toggle="pill"
            href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Cập nhật thông
            tin</a>
          <a class="nav-link stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" id="v-pills-orderhistory-tab"
            data-toggle="pill" href="#v-pills-orderhistory" role="tab" aria-controls="v-pills-orderhistory"
            aria-selected="false">Lịch sử đơn hàng</a>
          <a class="nav-link stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" id="v-pills-messages-tab"
            data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages"
            aria-selected="false">Đổi mật khẩu</a>
            <a class="nav-link stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" id="v-pills-messages-tab"
             href="logout.php" 
            >Đăng xuất</a>
        </div>
      </div>
      <div class="col-10 bor16">
        <div class="tab-content" id="v-pills-tabContent">
          <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
            <div class="container size-210 mx-auto p-lr-20 p-t-55 p-b-70 p-lr-15-lg w-full-md">
              <div class=" align-items-center">
                <h4 style="text-align: center; margin-bottom:30px">Thông tin người dùng</h4>
                <div class="row ">
                  <label for="staticEmail" class="col col-form-label"> <b>Họ và Tên:</b>
                  </label>
                  <div class="col-6">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php if (isset( $_SESSION["user_login"])) echo $_SESSION["user_login"]["name"];?>">
                  </div>
                </div>
                <div class="row ">
                  <label for="staticEmail" class="col col-form-label"> <b>Giới tính:</b>
                  </label>
                  <div class="col-6">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php if((int)$_SESSION["user_login"]["gender"] == 1) echo 'Nam';
                                                elseif((int)$_SESSION["user_login"]["gender"] == 2) echo 'Nữ';
                                                else echo 'Khác';
                                                ?>">
                  </div>
                </div>
                <div class="row">
                  <label for="staticEmail" class="col col-form-label "> <b>Số điện thoại:</b> </label>
                  <div class="col-6">
                    <input type="number" readonly class="form-control-plaintext" id="staticEmail" value="<?php if (isset( $_SESSION["user_login"])) echo $_SESSION["user_login"]["phone"];?>">
                  </div>
                </div>
                <div class="row">
                  <label for="staticEmail" class="col col-form-label "> <b>Email:</b> </label>
                  <div class="col-6">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                      value="<?php if (isset( $_SESSION["user_login"])) echo $_SESSION["user_login"]["email"];?>">
                  </div>
                </div>
                <div class="row">
                  <label for="staticEmail" class="col col-form-label "> <b>Địa chỉ:</b> </label>
                  <div class="col-6">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php if (isset( $_SESSION["user_login"])) echo $_SESSION["user_login"]["address"];?>">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
            <div class="container size-210 mx-auto p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md align-items-center">
              <form method="post">
                <div class="bor8 m-b-20 how-pos4-parent">
                  <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="name" placeholder="Họ Tên" value="<?php if (isset( $_SESSION["user_login"])) echo $_SESSION["user_login"]["name"];?>">
                  <img class="how-pos4 pointer-none" src="images/icons/icon-user.png" alt="ICON">
                </div>
                <div class="bor8 m-b-20 how-pos4-parent">
                  <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="birthday" placeholder="Ngày sinh" value="<?php if (isset( $_SESSION["user_login"])) echo date('Y-m-d',strtotime($_SESSION["user_login"]["birthday"]));?>">
                  <img class="how-pos4 pointer-none" src="images/icons/icon-user.png" alt="ICON">
                </div>
                <div class="bor8 m-b-20 how-pos4-parent">
                <select  class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" name="gender">
                                            <option value="1"<?php (int)$_SESSION["user_login"]["gender"] == '1' ? ' selected="selected"' : '';?>>Nam</option>
                                                <option value="2"<?php (int)$_SESSION["user_login"]["gender"] == '2' ? ' selected="selected"' : '';?>>Nữ</option>
                                                <option value="3"<?php (int)$_SESSION["user_login"]["gender"] == '3' ? ' selected="selected"' : '';?>>Khác</option>
                                            </select>
                                            <img class="how-pos4 pointer-none" src="images/icons/icon-user.png" alt="ICON">
                </div>
                <div class="bor8 m-b-20 how-pos4-parent">
                  <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="phone"
                    placeholder="Số điện thoại" value="<?php if (isset( $_SESSION["user_login"])) echo $_SESSION["user_login"]["phone"];?>">
                  <img class="how-pos4 pointer-none" src="images/icons/icon-password.png" alt="ICON">
                </div>
                <div class="bor8 m-b-20 how-pos4-parent">
                  <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="address"
                    placeholder="Địa chỉ" value="<?php if (isset( $_SESSION["user_login"])) echo $_SESSION["user_login"]["address"];?>">
                  <img class="how-pos4 pointer-none" src="images/icons/icon-password.png" alt="ICON">
                </div>

                <div class="bor8 m-b-20 how-pos4-parent">
                  <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="email" name="email"
                    placeholder="Email" value="<?php if (isset( $_SESSION["user_login"])) echo $_SESSION["user_login"]["email"];?>">
                  <img class="how-pos4 pointer-none" src="images/icons/icon-password.png" alt="ICON">
                </div>

                <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" name="btnUpdate" type="submit">
                  Cập nhật
                </button>
              </form>
            </div>
          </div>
          <div class="tab-pane fade" id="v-pills-orderhistory" role="tabpanel"
            aria-labelledby="v-pills-orderhistory-tab">
            <div class="container size-210 mx-auto p-lr-20 p-t-55 p-b-70 p-lr-15-lg w-full-md">
              <div class="container">
                <h4 style="text-align: center; margin-bottom:30px">Lịch sử mua hàng</h4>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Mã</th>
                      <th scope="col" class="text-center">Ngày giao</th>
                      <th scope="col" class="text-center">Số lượng</th>
                      <th scope="col">Tổng tiền</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td class="text-center">05/12/2021</td>
                      <td class="text-center">5</td>
                      <td>900.000vnđ</td>
                    </tr>
                    <tr>
                    <tr>
                      <th scope="row">2</th>
                      <td class="text-center">05/12/2021</td>
                      <td class="text-center">5</td>
                      <td>900.000vnđ</td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td class="text-center">05/12/2021</td>
                      <td class="text-center">5</td>
                      <td>900.000vnđ</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
            <div class="container size-210 mx-auto p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md align-items-center">
              <form method="post">
                <div class="bor8 m-b-20 how-pos4-parent">
                  <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password"
                    placeholder="Mật khẩu cũ">
                  <img class="how-pos4 pointer-none" src="images/icons/icon-password.png" alt="ICON">
                </div>
                <div class="bor8 m-b-20 how-pos4-parent">
                  <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="new_password"
                    placeholder="Mật khẩu mới">
                  <img class="how-pos4 pointer-none" src="images/icons/icon-password.png" alt="ICON">
                </div>
                <div class="bor8 m-b-20 how-pos4-parent">
                  <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="retype_password"
                    placeholder="Nhập lại mật khẩu">
                  <img class="how-pos4 pointer-none" src="images/icons/icon-password.png" alt="ICON">
                </div>
                <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" type="submit" name="btnChangePass">
                  Đổi mật khẩu
                </button>
              </form>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- footer -->

<?php include_once("include/footer.php"); ?>