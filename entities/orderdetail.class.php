<?php IDEA:
require_once('/xampp/htdocs/TechStorePHP/config/db.class.php');
class Orderdetail
{
  public $product_id ;
  public $orders_id;
  public $color_id;
  public $quantity;


  public function __construct($product_id, $orders_id, $color_id, $quantity)
  {
    $this->product_id = $product_id;
    $this->orders_id = $orders_id;
    $this->color_id = $color_id;
    $this->quantity = $quantity;
  }
  
  public function createOrderdetail()
  {

    $db = new Db();
    $sql = "INSERT INTO orderdetail (product_id, orders_id, color_id, quantity) 
    VALUES ('$this->product_id', '$this->orders_id','$this->color_id','$this->quantity')";
    $result = $db->query_execute($sql);
    return $result;
  }
  public static function getTotalQuantityProduct($product_id,$color_id){
    $db = new DB();
    $sql="SELECT SUM(quantity) as total_quantity FROM orderdetail WHERE product_id = '$product_id' and color_id = '$color_id'";
    $result = $db->select_to_object($sql);
    return $result;
  }
  public static function findOrderdetail(int $orders_id)
  {
    $db = new Db();
    $sql = "select od.product_id as product_id, p.name as product_name, od.quantity, c.color_id as color_id, c.name as color_name from orderdetail od
    INNER JOIN product p on p.product_id = od.product_id
    INNER JOIN color c on c.color_id = od.color_id
    where od.orders_id = '$orders_id'";
    $result = $db->select_to_array($sql);
    return $result;
  }
  public static function deleteOrderdetail(int $order_id)
  {
    $db = new Db();
    $sql = "DELETE FROM orderdetail WHERE orders_id='$order_id'";
    $result = $db->query_execute($sql);
    return $result;
  }

}