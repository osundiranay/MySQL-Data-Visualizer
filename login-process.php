<?php
require_once 'classes/user.php';
require_once 'classes/db.php';

function check(){
  
  $name = $_POST['user'];
  $psw = $_POST['psw'];
  $db = new db();
  $adminQuery = "SELECT nickname, password FROM admins WHERE nickname = '$name'";
  $info = $db->getData($adminQuery);

  # Echoes are used as an response for the Javascript requests.
  if ($info == false) {
    echo "Fail";
  }
  else {
    $hash = $info[0]['password'];

    if (password_verify($psw, $hash)) {
      echo "True";
    }
  }
}

check();
?>
