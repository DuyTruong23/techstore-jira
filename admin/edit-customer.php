<?php require_once("/xampp/htdocs/TechStorePHP/entities/customer.class.php"); 
if (isset($_GET["id"])) {
    $id = $_GET['id'];

    $customer = Customer::findCustomer($id);

}
if(isset($_POST["update"])){
    $id = $_GET["id"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $birthday = $_POST["birthday"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $password = $_POST["password"];
    $status = $_POST["status"];

    $result = Customer::updateCustomer($id, $name, $phone, $birthday, $gender, $email, $address, $password, $status);
    if ($result) {
        echo "<script>alert('Update thành công');</script>";
        echo "<script>window.location.href='/TechStorePHP/admin/customer.php';</script>";
    } else {
        echo "<script>alert('Update thất bại');</script>";
        echo "<script>window.location.href='/TechStorePHP/admin/customer.php';</script>";
    }
}
?>
<!-- Header -->
<?php include_once("./inc/header-admin.php"); ?>
<!-- Navbar -->
<?php include_once("./inc/navbar-admin.php"); ?>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<!-- body -->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <h3 class="content-header-title"></h3>
            </div>
            <div class="content-header-right col-md-8 col-12">
                <div class="breadcrumbs-top float-md-right">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Cập nhật thông tin khách hàng
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <form action="edit-customer.php?id=<?php echo $_GET["id"]; ?>" method="post">
                <section class="textarea-select">
                    <div class="row match-height">
                        <div class="col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Cập nhật thông tin khách hàng</h4>
                                </div>
                                <div class="card-block">
                                    <div class="card-body">
                                        <h5 class="mt-2">Họ và tên</h5>
                                        <fieldset class="form-group">
                                            <input type="text" class="form-control" id="basicInput" name="name" value="<?php if(isset($customer['name'])) echo($customer['name']);?>">
                                        </fieldset>
                                        <h5 class="mt-2">Giới tính</h5>
                                        <fieldset class="form-group" class="form-control" id="basicInput">
                                            <select class="custom-select" id="customSelect" name="gender">
                                                <option value="1"<?=$customer['gender'] == '1' ? ' selected="selected"' : '';?>>Nam</option>
                                                <option value="2"<?=$customer['gender'] == '2' ? ' selected="selected"' : '';?>>Nữ</option>
                                                <option value="3"<?=$customer['gender'] == '3' ? ' selected="selected"' : '';?>>Khác</option>
                                            </select>
                                        </fieldset>
                                        <h5 class="mt-2">Ngày sinh</h5>
                                        <fieldset class="form-group">
                                            <input type="date" id="basicInput" format="Y-m-d" name="birthday"
                                                class="form-control" value="<?php if(isset($customer['birthday'])) echo(date_format(date_create($customer['birthday']) , 'd/m/Y')) ?>">
                                        </fieldset>
                                        <h5 class="mt-2">Số điện thoại</h5>
                                        <fieldset class="form-group">
                                            <input type="tel" class="form-control" id="basicInput" name="phone" value="<?php if(isset($customer['phone'])) echo($customer['phone']);?>">
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"></h4>
                                </div>
                                <div class="card-block">
                                    <div class="card-body">
                                        <h5 class="mt-2">Email</h5>
                                        <fieldset class="form-group">
                                            <input type="email" class="form-control" id="basicInput" name="email" value="<?php if(isset($customer['email'])) echo($customer['email']);?>">
                                        </fieldset>
                                        <h5 class="mt-2">Địa chỉ</h5>
                                        <fieldset class="form-group">
                                            <input type="text" class="form-control" id="basicInput" name="address" value="<?php if(isset($customer['address'])) echo($customer['address']);?>">
                                        </fieldset>
                                        <h5 class="mt-2">Mật khẩu</h5>
                                        <fieldset class="form-group">
                                            <input type="text" class="form-control" id="basicInput" name="password" value="<?php if(isset($customer['password'])) echo($customer['password']);?>">
                                        </fieldset>
                                        <h5 class="mt-2">Trạng thái</h5>
                                        <fieldset class="form-group">
                                            <select class="custom-select" id="customSelect" name="status">
                                                <option selected>Chọn trạng thái</option>
                                                <option value="1"<?=$customer['status'] == '1' ? ' selected="selected"' : '';?>>Có</option>
                                                <option value="2"<?=$customer['status'] == '2' ? ' selected="selected"' : '';?>>Không</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-min-width mr-0 mb-0" type="submit" name="update">Cập nhật</button>
                    <a href="/customer.php"> <button class="btn btn-secondary btn-min-width mr-0 mb-0">Hủy</button></a>
                    <!-- </section> -->
            </form>
        </div>
    </div>
</div>
<!-- end body -->
<!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include_once("./inc/footer-admin.php"); ?>