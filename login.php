
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

       <button type="submit" class="btn" name="login">Log In</button>
    </form>

    <div class="coment">
    <a href="register.html">don't have an account? Create Account</a>
    </div>

</div> 
</div>

<script>
    feather.replace();
  </script>
</body>
</html>
