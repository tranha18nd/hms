<?php
session_start();
if ($_SESSION['role']<1) {
	echo "Không Có Quyền Truy Cập";
	exit();
     }
include('controller.php');
$data = new cHms();
	if (!isset($_SESSION['user'])) {
	 header("Location:login.php");
	}
  if (isset($_POST['edit'])) {
    $pass = $_POST['psw'];
    $user = $_SESSION['id'];
    $newPass = $_POST['pw'];

    $user = $data->edit($user,$pass,$newPass);
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login Page</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/css/login.css" rel="stylesheet">
  <link href="vendor/DataTables/datatables.min.css" rel="stylesheet" type="text/css" />
  <link href="vendor/DataTables/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link rel="shortcut icon" type="image/jpg" href="vendor/img/icon.jpg"/>
  <link rel="stylesheet" type="text/css" href="vendor/font-awesome/css/font-awesome.min.css">
</head>

<body>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>HMS Login</h3>
			</div>
			<div class="card-body">
				<form method="POST">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-user"></i></span>
						</div>
						<input type="text" value="<?php echo $_SESSION['id']; ?>" class="form-control" name="uname" disabled>
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-key"></i></span>
						</div>
						<input type="password" required class="form-control" placeholder="password" name="psw">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-key"></i></span>
						</div>
						<input type="password" required class="form-control" placeholder="New Password" name="pw">
					</div>
					<div class="form-group">
						<input type="submit" name="edit" value="Change Password" class="btn btn-secondary float-right">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="#">Sign Up</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">Forgot your password?</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
<script src="vendor/jquery/myJquery.js"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/DataTables/datatables.min.js"></script>
<script src="vendor/DataTables/dataTables.buttons.min.js"></script>
<script src="vendor/DataTables/jszip.min.js"></script>
<script src="vendor/DataTables/buttons.html5.min.js"></script>
</html>