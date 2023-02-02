<?php
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
	header("location: admin_dashboard.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Login</title>
	<link href="https://fonts.googleapis.com/css?family=Assistant:400,700" rel="stylesheet">

	<!--    Favicon Link-->
	<link rel="shortcut icon" type="image/x-icon" href="../img/favicon.png">



	
	<link rel="stylesheet" href="./CSS/style2.css">
	<script src="../JS/sweetalert.min.js"></script>

</head>

<body>
	<!-- partial:index.partial.html -->
	<div class='login' id='login'>
		<div class='head'>
			<h1 class='company'>Momentous Click</h1>
		</div>
		<p class='msg'>Welcome back Admin</p>
		<div class='form'>


			<form action="" method="post">
				<input type="text" placeholder='Username' class='text' id='username' name='name' required><br>
				<input type="password" placeholder='••••••••••••••' class='password' name="password" required><br>
				<button type="submit" style="border:none;" class='btn-login' id='do-login' name="login">Login</button>
				<a href="forgot.php" class='forgot'>Forgot?</a>
			</form>


			<?php
			if (isset($_POST['login'])) {
				include 'conn.php';
				$name = mysqli_real_escape_string($con, $_POST['name']);

				$pass = mysqli_real_escape_string($con, $_POST['password']);

				$query = "select * from admin where name = '$name' AND password = '$pass'";

				$query_run = mysqli_query($con, $query);
				$count = mysqli_num_rows($query_run);

				while ($row = mysqli_fetch_assoc($query_run)) {
					$_SESSION['name'] = $row['name'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['id'] = $row['id'];
				}

				if ($count == 1) {
					$_SESSION["loggedin"] = true;
					$_SESSION['log'] = "Login Successful";
					header("Location:admin_dashboard.php");
				} else {
			?>
					<script>
						swal({
							title: "OOPS!",
							text: "Invalied Login details",
							icon: "warning",
							button: "Close",
						});
					</script>
			<?php
				}
			}

			?>

		</div>
	</div>




</body>

</html>