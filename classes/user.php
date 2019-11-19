<?php
require_once 'classes/db.php';
class user {
  private $_userID;
  private $_fName;
  private $_lName;
  private $_nickname;

  public function __construct(){
    $this->_userID = 0;
    $this->_fName = "";
    $this->_lName = "";
    $this->_nickname = "";
  }

  public function showUsers($limit, $offset){
    $db = new db();
    $counter = 1; // counter is used to display the number of each row in the table.
    $userQuery = "SELECT first_name, last_name, user_id, nickname
                  FROM users, admins
                  WHERE admins.admin_id = users.nick_id
                  LIMIT $limit
                  OFFSET $offset";
    $info = $db->getData($userQuery);

    foreach ($info as $row){
      echo "<tr> <td>" .$counter ."</td> <td>" .$row["first_name"] ."</td> <td>" .$row["last_name"] ."</td> <td>" .$row["nickname"] ."</td> <td>" .$row["user_id"] ."</td>" ;
      $counter ++;
    }
  }
  
  public function add($fName, $lName, $nickname, $hash){
    $db = new db();
    if($db->insert($fName, $lName, $nickname, $hash)){
      return true;
    }
    else {
      return false;
    }
  }
}
?>
