<?php IDEA:
require_once('/xampp/htdocs/TechStorePHP/config/db.class.php');
class Storehouse
{
  public $product_id ;
  public $color_id;
  public $price;
  public $quantity;
  public $image ;
  public $description;
  public $create_at;

  public function __construct($product_id , $color_id, $price, $quantity, $image, $description, $create_at)
  {
    $this->product_id  = $product_id ;
    $this->color_id = $color_id;
    $this->price = $price;
    $this->quantity = $quantity;
    $this->image  = $image ;
    $this->description = $description;
    $this->create_at = $create_at;
  }
  
  public static function list_storehouse()
  {
    $db = new Db();
    $sql = "select p.product_id as product_id, p.name as product_name, c.category_id as category_id, b.brand_id as brand_id, 
    b.name as brand_name, c.name as category_name
    from 
    product p 
    INNER JOIN category c on p.category_id = c.category_id 
    INNER JOIN brand b on p.brand_id = b.brand_id ORDER BY product_id ASC";
    $result = $db->select_to_array($sql);
    return $result;
  }
  public function import_stohouse()
  {
    $date = date("Y-m-d H:i:s");
    $db = new Db();
    $sql = "INSERT INTO storehouse( product_id, color_id, price, quantity, image, description, create_at) 
    VALUES ('$this->product_id','$this->color_id',' $this->price','$this->quantity','$this->image','$this->description','$date')";
    $result = $db->query_execute($sql);
    return $result;
  }
  public static function getTotalQuantityProduct($product_id,$color_id){
    $db = new DB();
    $sql="SELECT SUM(quantity) as total_quantity FROM storehouse WHERE product_id = '$product_id' and color_id = '$color_id'";
    $result = $db->select_to_object($sql);
    return $result;
  }
  public static function findPriceOfProduct(int $product_id, int $color_id){
    $db = new Db();
    $sql = "select max(price) as price from storehouse where color_id = '$color_id' and product_id = '$product_id'";
    $result = $db->select_to_object($sql);
    return $result;
  }

}