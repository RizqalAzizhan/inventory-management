<?php 
session_start();
require 'functions.php';

// cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	// ambil username berdasarkan id
	$result = mysqli_query($conn, "SELECT username FROM m_user WHERE id = $id");
	$row = mysqli_fetch_assoc($result);

	// cek cookie dan username
	if( $key === hash('sha256', $row['username']) ) {
		$_SESSION['login'] = true;
	}


}

// if( isset($_SESSION["login"]) ) {
// 	header("Location: index.php");
// 	exit;
// }


if( isset($_POST["login"]) ) {

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM m_user WHERE username = '$username'");

	// cek username
	if( mysqli_num_rows($result) === 1 ) {

		// cek password
		$row = mysqli_fetch_assoc($result);
		if( password_verify($password, $row["password"]) ) {
			// set session
			$_SESSION["login"] = true;

			// // cek remember me
			// if( isset($_POST['remember']) ) {
			// 	// buat cookie
			// 	setcookie('id', $row['id'], time()+60);
			// 	setcookie('key', hash('sha256', $row['username']), time()+60);
			// }

			header("Location: index.php");
			exit;
		} 
	}

	$error = true;

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">

    <!-- Fonts Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">

    <!-- Feather Icon -->
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
    
<!-- Login Section -->

<div class="container">
    <div class="row">
    <img src="assets/logo-img/box.png" alt="" class="log-img">
    <h1>Login</h1>

    <form action="" method="post">
        <p>Username</p>
       <div class="input-grup">
        <i data-feather="user" class="user"></i>
        <input type="text" placeholder="Enter Your Username" name="username">
       </div>
   
        <p>Password</p>
       <div class="input-grup">
        <i data-feather="lock" class="lock"></i>
        <input type="password" placeholder="Enter Your Password" name="password">
       </div>

	   <?php if( isset($error) ) : ?>
			<p class="error" style="color: red; font-style: italic;">Incorrect username or password!</p>
		<?php endif; ?>

       <button type="submit" class="btn" name="login">Log In</button>
    </form>

    <div class="coment">
    <a href="register.php">don't have an account? Create Account</a>
    </div>

</div> 
</div>

<script>
    feather.replace();
  </script>
</body>
</html>