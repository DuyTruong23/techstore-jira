<?php IDEA:
require_once('/xampp/htdocs/TechStorePHP/config/db.class.php');
class Banner
{
  public $id;
  public $caption;
  public $content;
  public $photo;
  public $status;
  public $create_at;

  public function __construct($id, $caption, $content, $photo, $create_at)
  {
    $this->id = $id;
    $this->caption = $caption;
    $this->content = $content;
    $this->photo = $photo;
    $this->create_at = $create_at;
  }
  
  public static function list_banner()
  {
    $db = new Db();
    $sql = "SELECT * FROM banner where status = 1";
    $result = $db->select_to_array($sql);
    return $result;
  }
  public function createBanner()
  {
    // $file_temp = $this->photo['tmp_name'];
    // $user_file = $this->photo['name'];
    // $timestamp = date("Y").date("m").date("d").date("h").date("i").date("s");
    // $filepath = "admin/banner".$timestamp.$user_file;
    // if(move_uploaded_file($file_temp,$filepath)==false)
    // {
    //   return false;
    // }
    
    $date = date("Y-m-d H:i:s");
    $db = new Db();
    $sql = "INSERT INTO banner(caption, content, photo, status, create_at) 
    VALUES ('$this->caption', '$this->content', '1','1','$date')";
    $result = $db->query_execute($sql);
    return $result;
  }
  public static function updateBanner(int $id, string $caption, string $content, string $photo, string $status, string $create_at)
  {
    $date = date("Y-m-d H:i:s");
    $db = new Db();
    $sql = "UPDATE banner
            SET caption='$caption', content='$content', photo='1', status='1', create_at='$date'
            WHERE id='$id'";
    $result = $db->query_execute($sql);
    return $result;
  }

  public static function deleteBanner(int $id)
  {
    $db = new Db();
    $sql = "DELETE FROM banner WHERE id='$id'";
    $result = $db->query_execute($sql);
    return $result;
  }

  public static function findBanner(int $id)
  {
    $db = new Db();
    $sql = "SELECT * FROM banner WHERE id='$id'";
    $result = $db->select_to_object($sql);
    return $result;
  }

}