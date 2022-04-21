<?php require_once("/xampp/htdocs/TechStorePHP/entities/employee.class.php"); 
if (isset($_GET["employee_id"])) {
    $employee_id = $_GET['employee_id'];

    $employee = Employee::findEmployee($employee_id);

}
if(isset($_POST["update"])){
    $employee_id = $_GET["employee_id"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $birthday = $_POST["birthday"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $role_id = $_POST["role_id"];
    $password = $_POST["password"];
    $status =" ";

    $result = Employee::updateEmployee($employee_id, $name, $phone, $birthday, $gender, $email, $role_id, $password, $status);
    if ($result) {
        echo "<script>alert('Update thành công');</script>";
        echo "<script>window.location.href='/TechStorePHP/admin/employee.php';</script>";
    } else {
        echo "<script>alert('Update thất bại');</script>";
        echo "<script>window.location.href='/TechStorePHP/admin/employee.php';</script>";
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
                            <li class="breadcrumb-item active">Cập nhật thông tin nhân viên
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <form action="edit-employee.php?employee_id=<?php echo $_GET["employee_id"]; ?>" method="post">
                <section class="textarea-select">
                    <div class="row match-height">
                        <div class="col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Cập nhật thông tin nhân viên</h4>
                                </div>
                                <div class="card-block">
                                    <div class="card-body">
                                        <h5 class="mt-2">Họ và tên</h5>
                                        <fieldset class="form-group">
                                            <input type="text" class="form-control" id="basicInput" name="name" value="<?php if(isset($employee['name'])) echo($employee['name']);?>">
                                        </fieldset>
                                        <h5 class="mt-2">Giới tính</h5>
                                        <fieldset class="form-group" class="form-control" id="basicInput">
                                            <select class="custom-select" id="customSelect" name="gender">
                                            <option value="1"<?=$employee['gender'] == '1' ? ' selected="selected"' : '';?>>Nam</option>
                                                <option value="2"<?=$employee['gender'] == '2' ? ' selected="selected"' : '';?>>Nữ</option>
                                                <option value="3"<?=$employee['gender'] == '3' ? ' selected="selected"' : '';?>>Khác</option>
                                            </select>
                                        </fieldset>
                                        <h5 class="mt-2">Ngày sinh</h5>
                                        <fieldset class="form-group">
                                            <input type="date" id="basicInput" format="Y-m-d" name="birthday"
                                                class="form-control" value="<?php if(isset($employee['birthday'])) echo date('Y-m-d',strtotime($employee["birthday"])) ?>">
                                        </fieldset>
                                        <h5 class="mt-2">Số điện thoại</h5>
                                        <fieldset class="form-group">
                                            <input type="tel" class="form-control" id="basicInput" name="phone" value="<?php if(isset($employee['phone'])) echo($employee['phone']);?>">
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
                                            <input type="email" class="form-control" id="basicInput" name="email" value="<?php if(isset($employee['email'])) echo($employee['email']);?>">
                                        </fieldset>
                                        <h5 class="mt-2">Quyền</h5>
                                        <fieldset class="form-group">
                                        <select class="custom-select" id="customSelect" name="role_id">
                                            <option value="1"<?=$employee['role_id'] == '1' ? ' selected="selected"' : '';?>>Admin</option>
                                            <option value="2"<?=$employee['role_id'] == '2' ? ' selected="selected"' : '';?>>Nhân viên</option>
  
                                            </select>
                                        </fieldset>
                                        <h5 class="mt-2" hidden>Mật khẩu</h5>
                                        <fieldset class="form-group" hidden>
                                            <input type="text" class="form-control" id="basicInput" name="password" value="<?php if(isset($employee['password'])) echo($employee['password']);?>">
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-min-width mr-0 mb-0" type="submit" name="update">Cập nhật</button>
                    <a href="/TechStorePHP/admin/employee.php"> <button class="btn btn-secondary btn-min-width mr-0 mb-0">Hủy</button></a>
                    <!-- </section> -->
            </form>
        </div>
    </div>
</div>
<!-- end body -->
<!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include_once("./inc/footer-admin.php"); ?>