<?php require_once("/xampp/htdocs/TechStorePHP/entities/role.class.php"); 
?>
<?php 
$role = Role::list_role();
?>
<?php require_once("/xampp/htdocs/TechStorePHP/entities/employee.class.php"); 
$date = date("Y-m-d H:i:s");
if (isset($_POST["btnsubmit"])) {
    $employee_id = "";
    $name = $_POST["txtname"];
    $phone = $_POST["txtphone"];
    $birthday = $_POST["txtbirthday"];
    $gender = $_POST["txtgender"];
    $email = $_POST["txtemail"];
    $role_id = $_POST["role_id"];
    $password = $_POST["txtpassword"];
    $status = "";
    $created_at = "";

    $newEmployee = new Employee($employee_id,$name, $phone, $birthday, $gender, $email, $role_id,$password,$status,$created_at);
    $result = $newEmployee->createEmployee();
    if (!$result) {
        header("Location: add-employee.php?failure");
    } else {
        header("Location: add-employee.php?inserted");
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
                <?php
                if (isset($_GET["inserted"])) {
                    echo "<h2>Thêm nhân viên thành công</h2>";
                } else if (isset($_GET["failure"])) {
                echo "<h2>Thêm nhân viên thất bại</h2>";
                }
                ?>
                <h3 class="content-header-title"></h3>
            </div>
            <div class="content-header-right col-md-8 col-12">
                <div class="breadcrumbs-top float-md-right">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Thêm nhân viên
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <form  method="post">
                <section class="textarea-select">
                    <div class="row match-height">
                        <div class="col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Thêm nhân viên</h4>
                                </div>
                                <div class="card-block">
                                    <div class="card-body">
                                        <h5 class="mt-2">Họ và tên</h5>
                                        <fieldset class="form-group">
                                            <input type="text" class="form-control" id="basicInput" name="txtname" required                                       
                                            value="<?php echo isset($_POST["txtname"]) ? $_POST["txtname"] : ""; ?>">
                                        </fieldset>
                                        <h5 class="mt-2">Giới tính</h5>
                                        <fieldset class="form-group" class="form-control" id="basicInput">
                                            <select class="custom-select" id="customSelect" placeholder="Chọn giới tính" name="txtgender" required>
                                                <option value="1">Nam</option>
                                                <option value="2">Nữ</option>
                                                <option value="3">Khác</option>
                                            </select>
                                        </fieldset>
                                        <h5 class="mt-2">Ngày sinh</h5>
                                        <fieldset class="form-group">
                                            <input type="date" id="basicInput" required  name="txtbirthday" max="<?= date('Y-m-d'); ?>"
                                            value="<?php echo isset($_POST["txtbirthday"]) ? $_POST["txtbirthday"] : ""; ?>"
                                                class="form-control">
                                        </fieldset>
                                        <h5 class="mt-2">Số điện thoại</h5>
                                        <fieldset class="form-group">
                                            <input type="tel" class="form-control" name="txtphone" required pattern="[0-9]{9}"
                                            value="<?php echo isset($_POST["txtphone"]) ? $_POST["txtphone"] : ""; ?>" id="basicInput" 
                                            >
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
                                            <input type="email" class="form-control" id="basicInput" name="txtemail" required
                                            value="<?php echo isset($_POST["txtemail"]) ? $_POST["txtemail"] : ""; ?>">
                                        </fieldset>
                                        <h5 class="mt-2">Quyền</h5>
                                        <fieldset class="form-group" class="form-control" id="basicInput">
                                            <select class="custom-select" id="customSelect" name="role_id" required> 
                                            <?php 
                                                foreach ( $role as $item){
                                                echo "<option  value=".$item["role_id"].">".$item["role"]."</option>";
                                                 }
                                            ?>
                                            </select>
                                        </fieldset>
                                        <h5 class="mt-2">Mật khẩu</h5>
                                        <fieldset class="form-group">
                                            <input type="text" class="form-control" id="basicInput" name="txtpassword" required
                                            value="<?php echo isset($_POST["txtpassword"]) ? $_POST["txtpassword"] : ""; ?>">
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <button type="submit" class="btn btn-primary" name="btnsubmit">Xác nhận</button> -->
                    <button class="btn btn-primary btn-min-width mr-0 mb-0" type="submit" name="btnsubmit">Xác
                        nhận</button>
                    <a href="#"> <button class="btn btn-secondary btn-min-width mr-0 mb-0">Hủy</button></a>
                    <!-- </section> -->
            </form>
        </div>
    </div>
</div>
<!-- end body -->
<!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include_once("./inc/footer-admin.php"); ?>