
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="css/register.css">
   <!-- Fonts Google -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">

   <!-- Feather Icon -->
   <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
    
<!-- Registration Section -->

<div class="container">
    <div class="row">
    <h1>Registration</h1>

    <form action="" method="post">
        <p>First Name</p>
       <div class="input-grup">
        <i data-feather="user" class="user"></i>
        <input type="text" placeholder="Enter Your Name" name="name">
       </div>
   
        <p>Username</p>
       <div class="input-grup">
        <i data-feather="user" class="usr"></i>
        <input type="text" placeholder="Enter Your Username" name="username">
       </div>

        <p>Password</p>
       <div class="input-grup">
        <i data-feather="lock" class="lock"></i>
        <input type="password" placeholder="Enter Your Password" name="password">
       </div>

        <p>Confirm Password</p>
       <div class="input-grup">
        <i data-feather="lock" class="lock"></i>
        <input type="password" placeholder="Enter Your Password" name="password2">
       </div>

        <p>Email</p>
       <div class="input-grup">
        <i data-feather="mail" class="mail"></i>
        <input type="email" placeholder="Enter Your Email" name="email">
       </div>

       <button type="submit" class="btn" name="register">Sign Up</button>
    </form>

    <div class="coment">
    <a href="login.html">already have an account?</a>
    </div>

</div> 
</div>

<script>
    feather.replace();
  </script>
</body>
</html>
