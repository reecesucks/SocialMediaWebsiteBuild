<?php
require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';
?>

<html>
<head>
  <title>REGISTER</title>
</head>

<body>

  <form action="register.php" method="POST">
    <input type="email" name="log_email" placeholder="email" value="<?php
    if(isset($_SESSION['log_email'])){
      echo $_SESSION['log_email'];
    }
    ?>" required>
    <br>
    <input type="password" name="log_password" placeholder="password">
    <br>
    <input type="submit" name="login_button" value="Login">
    <br>
    <?php if(in_array("email or password is inccorect<br>", $error_array )){
      echo "email or password is inccorect<br>";
    }?>
  </form>


  <form action="register.php" method="post">
      <input type="text" name="reg_fname" placeholder="First Name" value="<?php
      if(isset($_SESSION['reg_fname'])){
        echo $_SESSION['reg_fname'];
      }
      ?>"  required>
      <br>
      <?php if(in_array("First name must be between 2 and 25 characters<br>", $error_array )){
        echo "First name must be between 2 and 25 characters<br>";
      }?>

      <input type="text" name="reg_lname" placeholder="Last Name" value="<?php
      if(isset($_SESSION['reg_lname'])){
        echo $_SESSION['reg_lname'];
      }
      ?>" required>
      <br>
      <?php if(in_array("Last name must be between 2 and 25 characters<br>", $error_array )){
        echo "Last name must be between 2 and 25 characters<br>";
      }?>

      <input type="email" name="reg_email" placeholder="email" value="<?php
      if(isset($_SESSION['reg_email'])){
        echo $_SESSION['reg_email'];
      }
      ?>" required>
      <br>

      <input type="email" name="reg_email2" placeholder="confirm email" value="<?php
      if(isset($_SESSION['reg_email2'])){
        echo $_SESSION['reg_email2'];
      }
      ?>"required>
      <br>

      <?php if(in_array("email already in use<br>", $error_array )){
        echo "email already in use<br>";
      }    else if(in_array("Invalid email format<br>", $error_array )){
        echo "Invalid email format<br>";
      }    else if(in_array("emails don't match <br>", $error_array )){
      echo "emails don't match <br>";
      }?>

      <input type="password" name="reg_password" placeholder="password" required>
      <br>
      <input type="password" name="reg_password2" placeholder="Re-enter Password" required>
      <br>

      <?php if(in_array("Passwords don't match<br>", $error_array )){
        echo "Passwords don't match<br>";
      }    else if(in_array("Passwords may only contain letters and numbers<br>", $error_array )){
        echo "Passwords may only contain letters and numbers<br>";
      }    else if(in_array("Password must be between 5 and 30 charactres<br>", $error_array )){
      echo "Password must be between 5 and 30 charactres<br>";
      }?>

      <input type="submit" name="register_button" value="Register">

      <br>
      <?php if(in_array("<span style='color: #14C800;'> Account Created! </span><br>" , $error_array )){
        echo "<span style='color: #14C800;'> Account Created! </span><br>" ;
      }
      ?>

  </form>
</body>
</html>
