<?php IDEA:
require_once('/xampp/htdocs/TechStorePHP/config/db.class.php');
class Role
{
  public $role_id;
  public $role;

  public function __construct($role_id, $role)
  {
    $this->role_id = $role_id;
    $this->role = $role;
  }
  
  public static function list_role()
  {
    $db = new Db();
    $sql = "SELECT * FROM role";
    $result = $db->select_to_array($sql);
    return $result;
  }
}