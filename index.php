<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>users</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <!-- adding JS scripts -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/tether.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>
</head>
  <body>
    <div class="container bg-faded mx-auto">
      <form id="login-form" class="form-horizontal pt-3 pb-3" action="info.php" method="post">
        <div class="form-group form-inline">
          <label class="mr-2 control-label" for="user">Username</label>
          <input type="text" name="user" class="form-control" id="user" placeholder="">
        </div>

        <div class="form-group form-inline">
          <label class="mr-2 control-label" for="psw">Password</label>
          <input type="password" name="psw" class="form-control ml-1" id="psw" placeholder="">
        </div>

        <div class="text-right mr-4">
          <button type="submit" class="btn btn-primary col-md-6">Login</button>
        </div>
      </form>
    </div>

    <div  id="error" class=" col-sm-3  mx-auto  mt-4 alert alert-danger alert-dismissible fade show" role="alert" style="display:none;">
      Password or username incorrect.
      <button type="button" class="close"  aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button> 
    </div>
  </body>
</html>
