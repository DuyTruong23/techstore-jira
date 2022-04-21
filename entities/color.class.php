<?php IDEA:
require_once('/xampp/htdocs/TechStorePHP/config/db.class.php');
class Color
{
  public $color_id ;
  public $name;
  public $code;

  public function __construct($color_id , $name, $code)
  {
    $this->color_id  = $color_id ;
    $this->name = $name;
    $this->code = $code;
  }
  
  public static function list_color()
  {
    $db = new Db();
    $sql = "SELECT * FROM color";
    $result = $db->select_to_array($sql);
    return $result;
  }
  public function createColor()
  {

    $date = date("Y-m-d H:i:s");
    $db = new Db();
    $sql = "INSERT INTO color (name, code) 
    VALUES ('$this->name', '$this->code')";
    $result = $db->query_execute($sql);
    return $result;
  }
  public static function updateColor(int $color_id, string $name, string $code)
  {
    $date = date("Y-m-d H:i:s");
    $db = new Db();
    $sql = "UPDATE color
            SET name='$name', code = '$code'
            WHERE color_id='$color_id'";
    $result = $db->query_execute($sql);
    return $result;
  }

  public static function deleteColor(int $color_id)
  {
    $db = new Db();
    $sql = "DELETE FROM color WHERE color_id='$color_id'";
    $result = $db->query_execute($sql);
    return $result;
  }

  public static function findColor(int $color_id)
  {
    $db = new Db();
    $sql = "SELECT * FROM color WHERE color_id='$color_id'";
    $result = $db->select_to_object($sql);
    return $result;
  }

}