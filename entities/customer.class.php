<?php IDEA:
require_once('/xampp/htdocs/TechStorePHP/config/db.class.php');
class Customer
{
  public $customer_id;
  public $name;
  public $phone;
  public $birthday;
  public $gender;
  public $email;
  public $address;
  public $password;
  public $status;
  public $created_at;

  public function __construct($customer_id, $name, $phone, $birthday, $gender, $email, $address,$password, $status, $created_at)
  {
    $this->customer_id = $customer_id;
    $this->name = $name;
    $this->phone = $phone;
    $this->birthday = $birthday;
    $this->gender = $gender;
    $this->email = $email;
    $this->address = $address;
    $this->password = $password;
    $this->status = $status;
    $this->created_at = $created_at;
  }
  
  public static function list_customer()
  {
    $db = new Db();
    $sql = "SELECT * FROM customer";
    $result = $db->select_to_array($sql);
    return $result;
  }
  public function createCustomer()
  {
    $date = date("Y-m-d H:i:s");
    $db = new Db();
    $sql = "INSERT INTO customer(name, phone, birthday, gender, email, address,password,status,created_at) 
    VALUES ('$this->name', '$this->phone', '$this->birthday', '$this->gender', '$this->email', '$this->address', '$this->password', '1','$date')";
    $result = $db->query_execute($sql);
    return $result;
  }
  public static function updateCustomer(int $id, string $name, string $phone, string $birthday, string $gender, string $email, string $address,  string $status)
  {
    $db = new Db();
    $sql = "UPDATE customer
            SET name='$name', phone='$phone', birthday='$birthday', gender='$gender', email='$email', address='$address', status='$status'
            WHERE customer_id='$id'";
    $result = $db->query_execute($sql);
    return $result;
  }

  public static function deleteCustomer(int $id)
  {
    $db = new Db();
    $sql = "DELETE FROM customer WHERE customer_id='$id'";
    $result = $db->query_execute($sql);
    return $result;
  }

  public static function findCustomer(int $id)
  {
    $db = new Db();
    $sql = "SELECT * FROM customer WHERE customer_id='$id'";
    $result = $db->select_to_object($sql);
    return $result;
  }
  public static function findCustomerByPhone(int $phone)
  {
    $db = new Db();
    $sql = "SELECT * FROM customer WHERE phone='$phone'";
    $result = $db->select_to_object($sql);
    return $result;
  }
  public static function checkAccount(string $email, string $password)
  {
    $db = new Db();
    $sql = "SELECT * FROM customer WHERE email='$email' and password='$password' ";
    $result = $db->select_to_object($sql);
    return $result;
  }
  public static function checkPassword(string $customer_id, string $password)
  {
    $db = new Db();
    $sql = "SELECT * FROM customer WHERE customer_id='$customer_id' and password='$password' ";
    $result = $db->select_to_object($sql);
    return $result;
  }

  public static function checkRegister(string $email, string $phone)
  {
    $db = new Db();
    $sql = "SELECT * FROM customer WHERE email='$email' or phone='$phone'";
    $result = $db->select_to_array($sql);
    return $result;
  }
  public static function changePass(int $id, string $password)
  {
    $db = new Db();
    $sql = "UPDATE customer
            SET  password='$password'
            WHERE customer_id='$id'";
    $result = $db->query_execute($sql);
    return $result;
  }
  public static function countCustomer()
  {
    $db = new Db();
    $sql = "SELECT count(*) as total FROM customer where status = 1";
    $result = $db->select_to_object($sql);
    return $result;
  }
}