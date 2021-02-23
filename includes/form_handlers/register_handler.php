<?php
//Vaiables
$fname = "";    //first name
$lname = "";    //last name
$em = "";           //email 1
$em2 = "";          //email 2
$password = "";         //pw 1
$password2 = "";
$date = "";
$error_array = array();    //hold any error messages

if(isset($_POST['register_button'])){
  //REgistration form values

  //first name
  $fname = strip_tags($_POST['reg_fname']); //remove html tags
  $fname = str_replace(' ', '', $fname);    //remove spaces
  $fname = ucfirst(strtolower($fname));   //convert to lower case, first lett upper case
  $_SESSION['reg_fname'] = $fname; //store into session
  //last name
  $lname = strip_tags($_POST['reg_lname']); //remove html tags
  $lname = str_replace(' ', '', $lname);    //remove spaces
  $lname = ucfirst(strtolower($lname));   //convert to lower case, first lett upper case
  $_SESSION['reg_lname'] = $lname; //store into session

  //email
  $em = strip_tags($_POST['reg_email']); //remove html tags
  $em = str_replace(' ', '', $em);    //remove spaces
  $em = strtolower($em);   //convert to lower case
  $_SESSION['reg_email'] = $em; //store into session

  //email2
  $em2 = strip_tags($_POST['reg_email2']); //remove html tags
  $em2 = str_replace(' ', '', $em2);    //remove spaces
  $em2 = strtolower($em2);   //convert to lower case, 
  $_SESSION['reg_email2'] = $em2; //store into session

  //password
  $password = strip_tags($_POST['reg_password']); //remove html tags
  //password2
  $password2 = strip_tags($_POST['reg_password2']); //remove html tags

  $date = date("Y-m-d"); //get current date

  if($em == $em2){
    if(filter_var($em, FILTER_VALIDATE_EMAIL)){
      $em = filter_var($em, FILTER_VALIDATE_EMAIL);

      //Check for email in database
      $echeck = mysqli_query($con, "SELECT email FROM users WHERE email = '$em'");
      //count rows return
      $num_rows = mysqli_num_rows($echeck);

      if($num_rows > 0) {
        array_push($error_array, "email already in use<br>");
      }
    }
    else{
      array_push($error_array, "Invalid email format<br>");

    }
  }
  else {
    array_push($error_array, "emails don't match <br>");
  }

  if(strlen($fname) > 25 || strlen($fname) <2) {
    array_push($error_array, "First name must be between 2 and 25 characters<br>");
  }

  if(strlen($lname) > 25 || strlen($lname) <2) {
    array_push($error_array, "Last name must be between 2 and 25 characters<br>");
  }

  if($password != $password2) {
    array_push($error_array, "Passwords don't match<br>");
  }
  else {
    if(preg_match('/[^A-Za-z0-9]/', $password)) {
      array_push($error_array, "Passwords may only contain letters and numbers<br>");
    }
  }

  if(strlen($password > 30 || strlen($password) <5)){
    array_push($error_array, "Password must be between 5 and 30 charactres<br>");
  }

  if(empty($error_array)){
    $password = md5($password); //encrypting password

    //Generate username
    $username = strtolower($fname . "_" . $lname);
    $check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username = '$username'");
    $i = 0;
    //if usernameexists add number to it
    while(mysqli_num_rows($check_username_query) !=0 ){
      $i++;
      $username = $username . "_" . $i;
      $check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username = '$username'");

    }

    //random Profile picture assignment
    $rand = rand(1,2);
    switch ($rand) {
      case 1:
        $profile_pic = "Assets/Images/profile_pics/default_profile_pic.png";
        break;
        case 2:
        $profile_pic = "Assets/Images/profile_pics/default_profile_pic1.png";
        break;
      default:
        $profile_pic = "Assets/Images/profile_pics/default_profile_pic1.png";
      }

    $query = mysqli_query($con, "INSERT INTO users VALUES (NULL, '$fname', '$lname', '$username', '$em', '$password', '$date', '$profile_pic', '0', '0', 'no', ',')");

    array_push($error_array, "<span style='color: #14C800;'> Account Created! </span><br>" );
    $_SESSION['reg_fname'] ="";
    $_SESSION['reg_lname'] ="";
    $_SESSION['reg_email'] ="";
    $_SESSION['reg_email2'] ="";

  }
}
?>
