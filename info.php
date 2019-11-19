<?php
require_once 'classes/db.php';
require_once 'classes/user.php';

  $user = new user();
  $db = new db();
  $limit = 5;
  $page = '';

  $allRows = $db->countRows("SELECT SQL_CALC_FOUND_ROWS user_id
                             FROM admins, users
                             WHERE admins.admin_id = users.nick_id");

  $allPages = ceil($allRows / $limit);

  if (isset($_GET['page'])) {
    $page = $_GET['page'];
    echo "Page number is: ". $page;
  }
  else {
    $page = 1;
    echo "Page number is: ". $page;
  }

  $offset = ($page - 1) * $limit;
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Users Info</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- adding JS scripts -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/tether.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
  </head>

  <body>
  <div class="row" style="margin-top: 15%;">
    <div class="col-md-7 ml-5">
      <table id="table" class="table table-striped table-bordered table-hover table-sm">
        <thead class="thead-default">
          <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Nickname</th>
            <th>User ID</th>
          </tr>
        </thead>
        <?php $user->showUsers($limit, $offset); ?>
      </table>
    </div>

    <div class="col-md-4">
      <form id="user-form" class="form-horizontal bg-faded pl-3 pt-3 pb-4" action="user-process.php" method="post">
        <div class="form-group form-inline">
          <label class="mr-2 label-control" for="fName">First Name</label>
          <input id="fName" class="form-control" type="text" name="fName">
        </div>

        <div class="form-group form-inline">
          <label class="mr-2 ml-1" for="lName">Last Name</label>
          <input id="lName" class="form-control" type="text" name="lName" value="">
        </div>

        <div class="form-group form-inline">
          <label class="mr-2 ml-2" for="nickname">Nickname</label>
          <input id="nickname" class="form-control" type="text" name="nickname">
        </div>

        <button type="submit" class="btn btn-primary col-sm-5">Submit</button>
      </form>
    </div>
  </div>

  <div class="col-sm-9 mx-auto">
    <?php
      for ($i=1; $i <= $allPages ; $i++) {
        echo "<span class='pag-link' id='$i' style='cursor: pointer; padding: 6px; border: 1px solid #ccc; margin: 3px;'>". $i. "</span>";
      }
    ?>
  </div>
  </body>
</html>
