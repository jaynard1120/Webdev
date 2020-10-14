<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phph handlers</title>
</head>
<style>
    p{
    color: green;
  }
</style>
<body><center>
<?php
    $errors = array();
if(isset($_POST['submit'])){
  $fname = isset($_POST['firstname'])? $_POST['firstname']:null;
  $lname = isset($_POST['lastname'])? $_POST['lastname']:null;
  $email = isset($_POST['email'])? $_POST['email']:null;
  $address = isset($_POST['address'])? $_POST['address']:null;
if(strlen(trim($fname))<=2 or strlen(trim($fname))>25){
    array_push($errors,"ERROR:Your firstname must be at least 2 characters and not exceed to 25 characters!");
}
  if(strlen(trim($lname))<=2 or strlen(trim($lname))>25){
    array_push($errors,"ERROR:Your lastname must be at least 2 characters and not exceed to 25 characters!");
}
if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
  array_push($errors,"ERROR:Your email is not valid");
}
if(count($errors)>0){
  foreach($errors as $error){
    echo "<p style='color:red;'>".$error."</p>";
  }
}
else{
    echo "<p>Your information:</p><p>Firstname: ".$fname."</p><p>Lastname: ".$lname."</p><p>Email Address: ".$email."</p><p>Address: ".$address."</p>";
  }
}

?>
</body>
</html>

