<?php IDEA:
require_once('/xampp/htdocs/TechStorePHP/config/db.class.php');
class Product
{
  public $product_id ;
  public $category_id;
  public $brand_id;
  public $name;

  public $category_name;
  public $price;
  public $image;

  public function __construct($product_id, $category_id,$brand_id, $name)
  {
    $this->product_id = $product_id;
    $this->category_id = $category_id;
    $this->brand_id = $brand_id;
    $this->name = $name;
  }
  
  public static function list_product()
  {
    $db = new Db();
    $sql = "select p.product_id as product_id, p.name as product_name, c.category_id as category_id, b.brand_id as brand_id, 
    b.name as brand_name, c.name as category_name
    from 
    product p 
    INNER JOIN category c on p.category_id = c.category_id 
    INNER JOIN brand b on p.brand_id = b.brand_id ORDER BY product_id ASC;";
    $result = $db->select_to_array($sql);
    return $result;
  }
  public static function list_product_show_in_product_page()
  {
    $db = new Db();
    $sql = "select p.product_id as product_id, s.price as price, s.image as image , p.name as product_name, c.category_id as category_id, b.brand_id as brand_id, 
    b.name as brand_name, c.name as category_name, co.color_id as color_id, co.name as color_name
    from 
    product p 
    INNER JOIN category c on p.category_id = c.category_id 
    INNER JOIN brand b on p.brand_id = b.brand_id
    INNER JOIN storehouse s on s.product_id = p.product_id
    INNER JOIN color co on co.color_id = s.color_id
    ";
    $result = $db->select_to_array($sql);
    return $result;
  }
  public function createProduct()
  {

    $date = date("Y-m-d H:i:s");
    $db = new Db();
    $sql = "INSERT INTO product (category_id, brand_id, name) 
    VALUES ('$this->category_id', '$this->brand_id','$this->name')";
    $result = $db->query_execute($sql);
    return $result;
  }
  public static function updateProduct(int $product_id, int $category_id, int $brand_id, string $name)
  {
    $date = date("Y-m-d H:i:s");
    $db = new Db();
    $sql = "UPDATE product
            SET category_id='$category_id', brand_id='$brand_id', name='$name'
            WHERE product_id='$product_id'";
    $result = $db->query_execute($sql);
    return $result;
  }

  public static function deleteProduct(int $product_id)
  {
    $db = new Db();
    $sql = "DELETE FROM product WHERE product_id='$product_id'";
    $result = $db->query_execute($sql);
    return $result;
  }

  public static function findProduct(int $product_id)
  {
    $db = new Db();
    $sql = "SELECT * FROM product WHERE product_id='$product_id'";
    $result = $db->select_to_object($sql);
    return $result;
  }
  public static function findInfoProductToShowProductPage(int $product_id)
  {
    $db = new Db();
    $sql = "select  p.name as product_name, c.category_id as category_id, b.brand_id as brand_id, 
    b.name as brand_name, c.name as category_name, s.price as price, s.image as image, s.description as description,co.color_id as color_id, co.name as color_name
    from product p 
    INNER JOIN category c on p.category_id = c.category_id 
    INNER JOIN storehouse s on p.product_id = s.product_id 
    INNER JOIN brand b on p.brand_id = b.brand_id 
    INNER JOIN color co on s.color_id = co.color_id
    WHERE p.product_id='$product_id'";
    $result = $db->select_to_object($sql);
    return $result;
  }
  public static function countProduct()
  {
    $db = new Db();
    $sql = "SELECT count(*) as total FROM product";
    $result = $db->select_to_object($sql);
    return $result;
  }
}