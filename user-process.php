<?php
require_once 'classes/user.php';
require_once 'classes/db.php';

$options = [
  'cost' => 11,
];

$hash = password_hash('stefan123', PASSWORD_BCRYPT, $options);

$user = new user();

if($user->add($_POST['fName'], $_POST['lName'], $_POST['nickname'], $hash)){
  echo "Sucess inserting";
}
else {
  echo "Exist";
}
?>
