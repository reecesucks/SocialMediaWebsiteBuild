<?php
require 'config/config.php';

//test for website
//$con = mysqli_connect("localhost", "myuser", "U5O+~%Yw[^H2", "social");
//database on website
//username: myuser
//password: U5O+~%Yw[^H2

if(mysqli_connect_errno()){
  echo "failed: " . mysqli_connect_errno();
}

if (isset($_SESSION['username'])) {
    $userLoggedIn = $_SESSION['username'];
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query);
}
else {
    header("Location: register.php");
}

?>

<html>
  <head>
    <title>reecesucks</title>

    <!-- Javasscript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="Assets/js/bootstrap.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/style.css">

  </head>

<body>
  <div class="top_bar">

    <div class="logo">

      <a href="index.php">
        <i class="fa fa-trash" aria-hidden="true"></i>
        reecesucks
      </a>
    </div>

    <nav>
      <a href="<?php echo $userLoggedIn; ?>">
        <?php echo $user['first_name'];?>
      </a>

      <a href="index.php">
        <i class="fa fa-home fa-lg" aria-hidden="true"></i>
      </a>

      <a href="">
        <i class="fa fa-envelope" aria-hidden="true"></i>
      </a>

      <a href="">
        <i class="fa fa-bell" aria-hidden="true"></i>
      </a>

      <a href="">
        <i class="fa fa-users" aria-hidden="true"></i>
      </a>

      <a href="">
        <i class="fa fa-cogs" aria-hidden="true"></i>
      </a>

      <a href="includes/handlers/logout.php">
        <i class="fa fa-sign-out fa-lg"></i>
      </a>



    </nav>
  </div>

  <div class="wrapper">
