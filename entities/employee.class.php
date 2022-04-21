<?php IDEA:
require_once('/xampp/htdocs/TechStorePHP/config/db.class.php');
class Employee
{
  public $employee_id;
  public $name;
  public $phone;
  public $birthday;
  public $gender;
  public $email;
  public $role_id;
  public $password;
  public $status;
  public $created_at;

  public function __construct($employee_id, $name, $phone, $birthday, $gender, $email, $role_id,$password, $status, $created_at)
  {
    $this->employee_id = $employee_id;
    $this->name = $name;
    $this->phone = $phone;
    $this->birthday = $birthday;
    $this->gender = $gender;
    $this->email = $email;
    $this->role_id = $role_id;
    $this->password = $password;
    $this->status = $status;
    $this->created_at = $created_at;
  }
  
  public static function list_employee()
  {
    $db = new Db();
    $sql = "SELECT * FROM employee";
    $result = $db->select_to_array($sql);
    return $result;
  }
  public function createEmployee()
  {
    $date = date("Y-m-d H:i:s");
    $db = new Db();
    $sql = "INSERT INTO employee(name, phone, birthday, gender, email, role_id, password, status, created_at) 
    VALUES ('$this->name', '$this->phone', '$this->birthday', '$this->gender', '$this->email', '$this->role_id', '$this->password', '1','$date')";
    $result = $db->query_execute($sql);
    return $result;
  }
  public static function updateEmployee(int $employee_id, string $name, string $phone, string $birthday, string $gender, string $email, string $role_id, string $password, string $status)
  {
    $db = new Db();
    $sql = "UPDATE employee
            SET name='$name', phone='$phone', birthday='$birthday', gender='$gender', email='$email', role_id='$role_id', password='$password', status='$status'
            WHERE employee_id='$employee_id'";
    $result = $db->query_execute($sql);
    return $result;
  }

  public static function deleteEmployee(int $employee_id)
  {
    $db = new Db();
    $sql = "DELETE FROM employee WHERE employee_id='$employee_id'";
    $result = $db->query_execute($sql);
    return $result;
  }

  public static function findEmployee(int $employee_id)
  {
    $db = new Db();
    $sql = "SELECT * FROM employee WHERE employee_id='$employee_id'";
    $result = $db->select_to_object($sql);
    return $result;
  }
  public static function checkAccount(string $email, string $password)
  {
    $db = new Db();
    $sql = "SELECT * FROM employee WHERE email='$email' and password='$password' ";
    $result = $db->select_to_object($sql);
    return $result;
  }
}