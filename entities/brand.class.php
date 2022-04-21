<?php IDEA:
require_once('/xampp/htdocs/TechStorePHP/config/db.class.php');
class Brand
{
  public $brand_id ;
  public $name;
  public $status;
  public $created_at;

  public function __construct($brand_id , $name, $status, $created_at)
  {
    $this->brand_id  = $brand_id ;
    $this->name = $name;
    $this->status = $status;
    $this->created_at = $created_at;
  }
  
  public static function list_brand()
  {
    $db = new Db();
    $sql = "SELECT * FROM brand";
    $result = $db->select_to_array($sql);
    return $result;
  }
  public function createBrand()
  {

    $date = date("Y-m-d H:i:s");
    $db = new Db();
    $sql = "INSERT INTO brand (name, status, created_at) 
    VALUES ('$this->name', '$this->status','$date')";
    $result = $db->query_execute($sql);
    return $result;
  }
  public static function updateBrand(int $brand_id, string $name, int $status, string $created_at)
  {
    $date = date("Y-m-d H:i:s");
    $db = new Db();
    $sql = "UPDATE brand
            SET name='$name', status='$status', created_at='$date'
            WHERE brand_id='$brand_id'";
    $result = $db->query_execute($sql);
    return $result;
  }

  public static function deleteBrand(int $brand_id)
  {
    $db = new Db();
    $sql = "DELETE FROM brand WHERE brand_id='$brand_id'";
    $result = $db->query_execute($sql);
    return $result;
  }

  public static function findBrand(int $brand_id)
  {
    $db = new Db();
    $sql = "SELECT * FROM brand WHERE brand_id='$brand_id'";
    $result = $db->select_to_object($sql);
    return $result;
  }

}