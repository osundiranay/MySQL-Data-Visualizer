<?php
require_once 'classes/user.php';
require_once 'classes/db.php';

function check(){
  $name = $_POST['user'];
  $psw = $_POST['psw'];
  $db = new db();
  $adminQuery = "SELECT nickname, password FROM admins WHERE nickname = '$name'";
  $info = $db->getData($adminQuery);

  if ($info == false) {
    echo "Fail";
  }
  else {
    $hash = $info[0]['password'];
    //echo $hash;
    if (password_verify($psw, $hash)) {
      echo "True";
    }
  }
}
check();
?>
