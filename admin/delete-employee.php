<?php require_once("/xampp/htdocs/TechStorePHP/entities/employee.class.php"); ?>
<?php
    if(isset($_GET['employee_id'])){
        $employee_id = $_GET['employee_id'];
        $employee = Employee::findEmployee($employee_id);
        $result = Employee::deleteEmployee($employee_id);
        if($result){
            echo "<script>alert('Xóa thành công');</script>";
            echo "<script>window.location.href='/TechStorePHP/admin/employee.php';</script>";
        }
        else{
            echo "<script>alert('Xóa thất bại');</script>";
            echo "<script>window.location.href='/TechStorePHP/admin/employee.php';</script>";
        }
    }