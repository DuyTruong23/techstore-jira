<!-- Header -->
<?php require_once("/xampp/htdocs/TechStorePHP/entities/employee.class.php"); ?>
<?php
session_start();
?>
<?php include_once("./inc/header-admin.php"); ?>
<!-- Navbar -->
<?php include_once("./inc/navbar-admin.php"); ?>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">

            </div>
            <div class="content-header-right col-md-8 col-12">
                <div class="breadcrumbs-top float-md-right">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Thông tin của tôi
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!--native-font-stack -->


            <!-- Description list alignment -->
            <section id="description-list-alignment">

                <div class="row match-height">
                    <!-- Description lists horizontal -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Thông tin của tôi
                                </h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="col-4" style="float:left; padding-bottom: 20px"><img
                                            src="theme-assets/images/portrait/small/1200px-User_font_awesome.svg.png"
                                            class="d-block w-100"></div>

                                    <div class="col-8">
                                        <div class="card-text">
                                            <dl class="row">
                                                <dt class="col-sm-3">Họ và tên</dt>
                                                <dd class="col-sm-9"><?php if (isset( $_SESSION["emp_login"])) echo $_SESSION["emp_login"]["name"];?></dd>
                                            </dl>
                                            <dl class="row">
                                                <dt class="col-sm-3">Giới tính</dt>
                                                <dd class="col-sm-9"> 
                                                <?php if((int)$_SESSION["emp_login"]["gender"] == 1) echo 'Nam';
                                                elseif((int)$_SESSION["emp_login"]["gender"] == 2) echo 'Nữ';
                                                else echo 'Khác';
                                                ?>
                                                </dd>
                                            </select>
                                                </dd>
                                            </dl>
                                            <dl class="row">
                                                <dt class="col-sm-3">Ngày sinh</dt>
                                                
                                                <dd class="col-sm-9"><?php if(isset($_SESSION["emp_login"])) echo(date_format(date_create($_SESSION["emp_login"]["birthday"]) , 'd/m/Y'));?></dd>
                                            </dl>
                                            <dl class="row">
                                                <dt class="col-sm-3">Điện thoại</dt>
                                                <dd class="col-sm-9"><?php if (isset($_SESSION["emp_login"])) echo($_SESSION["emp_login"]["phone"]);?></dd>
                                            </dl>
                                            <dl class="row">
                                                <dt class="col-sm-3">Email</dt>
                                                <dd class="col-sm-9"><?php if (isset($_SESSION["emp_login"])) echo($_SESSION["emp_login"]["email"]);?></dd>
                                            </dl>
                                            <dl class="row">
                                                <dt class="col-sm-3">Chức vụ</dt>
                                                <dd class="col-sm-9">
                                                <?php if($_SESSION["emp_login"]["role_id"] == 1) echo 'Nhân viên';
                                                elseif($_SESSION["emp_login"]["role_id"] == 2) echo 'Admin';
                                                ?>
                                                </dd>
                                            </dl>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Description lists horizontal-->
                </div>
            </section>
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include_once("./inc/footer-admin.php"); ?>