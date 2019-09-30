<?php
require_once 'classes/db.php';

 $conn;
 $host = "localhost";
 $username = "root";
 $psw = "";
 $dbName = "users";

 $conn = new mysqli($host, $username, $psw, $dbName);
 $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM users LIMIT 4";
 $results = mysqli_query($conn, $sql);
 var_dump($results);
 echo "<br> <br>";
 $sql = 'SELECT FOUND_ROWS()';
 $result2 = mysqli_query($conn, $sql);
 var_dump( $result2);
 echo "<br> <br>";
 $allRows = mysqli_fetch_assoc($result2);
 var_dump($allRows);
echo "<br> <br>".intval($allRows['FOUND_ROWS()']);
echo "<br> <br> All Pages: ".ceil(intval($allRows['FOUND_ROWS()'])/4);
$db = new db();
$a = $db->countRows("SELECT SQL_CALC_FOUND_ROWS user_id
                           FROM admins, users
                           WHERE admins.admin_id = users.nick_id");
echo "<br> <br>".$a;

//echo$_POST['page'];
?>;
