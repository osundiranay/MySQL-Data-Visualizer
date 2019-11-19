<?php
class db{
  private $_conn;
  private $_host = "127.0.0.1";
  private $_username = "root";
  private $_psw = "root";
  private $_dbName = "users";

  // Making connection to the DB in the constructor.
  public function __construct(){
    $this->_conn = new mysqli($this->_host, $this->_username, $this->_psw, $this->_dbName);

    if ($this->_conn->connect_error){
        die("Connection failed: " . $this->_conn->connect_error);
    }
  }

  public function getCon(){
    return $this->_conn;
  }

  public function openCon(){
    $this->_conn = new mysqli($this->_host, $this->_username, $this->_psw, $this->_dbName);

  }

  public function closeCon(){
    $this->_conn->close();
  }

  public function countRows($query){
    $sql = mysqli_query($this->_conn, $query);
    $countRows = mysqli_query($this->_conn,'SELECT FOUND_ROWS()');
    $numRows = mysqli_fetch_assoc($countRows);
    return intval($numRows['FOUND_ROWS()']);
  }

  // Fetching all the data given a query.
  public function getData($query){
    $result = mysqli_query($this->_conn,$query);

    if (mysqli_connect_errno()){
      printf("Query error: %s\n", mysqli_connect_error());
      return false;
      exit();
    }

    $allData = mysqli_fetch_all($result,MYSQLI_ASSOC);
    mysqli_free_result($result);

    $this->_conn->close();
    return $allData;
  }

  public function insert($fName, $lName, $nickname, $hash){
    // Inserting in the admins table;
    $adminInsert = "INSERT INTO admins (nickname, password)
                    VALUES ('$nickname', '$hash')";
                    
    if($this->_conn->query($adminInsert)) // Checking if inserting is successfull.
    {
      echo "Admin Inserted <br>";
    }
    else {
      return false;
    }

    // Geting the admin_id so I can insert it in the users table.
    $getAdminID = "SELECT admin_id FROM admins WHERE nickname = '$nickname'";
    $adminID = $this->getData($getAdminID);
    $nickID = intval($adminID[0]['admin_id']);

    $this->openCon();

    // Inserting in the users table;
    $userInsert = "INSERT INTO users (first_name, last_name, nick_id)
                   VALUES ('$fName', '$lName', '$nickID')";

    if($this->_conn->query($userInsert)){
      echo "User Inserted";
    }
    else {
      return false;
    }
  }
}
?>
