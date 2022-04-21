<!-- Header -->
<?php include_once("./inc/header-admin.php"); ?>

<!-- Navbar -->
<?php include_once("./inc/navbar-admin.php"); ?>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-body">
      <div class="container">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <h4 class="card-title">Chỉnh sửa thông tin</h4>
            </div>
            <div class="card-body">
              <form class="form">
                <div class="form-body">
                  <div class="form-group">
                    <label for="donationinput1" class="sr-only">Họ và tên</label>
                    <input type="text" id="donationinput1" class="form-control" placeholder="Tên sản phẩm" name="fname" />
                  </div>
                  <div class="form-group">
                    <label for="donationinput2" class="sr-only">Giới tính</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                      <label class="form-check-label" for="flexRadioDefault1">
                        Nam
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                      <label class="form-check-label" for="flexRadioDefault2">
                        Nữ
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleColorInput" class="form-label">Ngày sinh</label>
                    <input type="date" class="form-control form-control-color" id="exampleColorInput" value="22-Dec-2000" title="Choose your color">
                  </div>

                  <div class="form-group">
                    <label for="donationinput4" class="sr-only">Số diện thoại</label>
                    <input type="text" id="donationinput4" class="form-control" placeholder="Số điện thoại" name="phone" />
                  </div>

                  <div class="form-group">
                    <label for="donationinput7" class="sr-only">Email</label>
                    <input type="email" id="donationinput4" class="form-control" placeholder="example@exampl.com" name="phone" />
                  </div>
                  <div class="form-group">
                    <label for="donationinput7" class="sr-only">Mật khẩu</label>
                    <input type="text" id="donationinput4" class="form-control" placeholder="asd123" name="phone" />
                  </div>
                  <div class="form-group">
                    <label for="donationinput7" class="sr-only">Vị trí</label>
                    <select class="form-select" aria-label="Default select example">
                      <option selected>Vị trí của bạn</option>
                      <option value="1">Quản trị</option>
                      <option value="2">Nhân viên</option>
                    </select>
                  </div>
                </div>
                <div class="form-actions center">
                  <button type="submit" class="btn btn-outline-primary">
                    Cập nhật
                  </button>
                  <button type="submit" class="btn btn-outline-primary">
                    Thêm
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include_once("./inc/footer-admin.php"); ?>