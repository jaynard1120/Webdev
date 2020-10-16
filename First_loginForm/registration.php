<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href = "login.css">
</head>
<style>
    .login-box {
    position: absolute;
    margin-left:50%;
    top:50%;
    width: 600px;
    height:auto;
    padding: 40px;
    transform: translate(-50%, -50%);
    background: rgba(0,0,0,.5);
    box-sizing: border-box;
    box-shadow: 0 15px 25px rgba(0,0,0,.6);
    border-radius: 10px;
  }

    .submit {
    background: transparent;
    position: relative;
    display: inline-block;
    padding: 10px 20px;
    color: #03e9f4;
    font-size: 16px;
    text-decoration: none;
    text-transform: uppercase;
    overflow: hidden;
    transition: .5s;
    margin-top: 40px;
    letter-spacing: 4px
    
  }
  
  .submit:hover {
    background: #03e9f4;
    color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 5px #03e9f4,
                0 0 25px #03e9f4,
                0 0 50px #03e9f4,
                0 0 100px #03e9f4;
  }
  
  .submit span {
    position: absolute;
    display: block;
  }
</style>
<body><center>
<div class="login-box">
  <h2>Create Account</h2>
  <form action="registration.php" method="post">
    <div class="user-box">
      <input type="text" placeholder="Firstname" name="firstname" required autocomplete="off">
    </div>
    <div class="user-box">
      <input type="text" placeholder="Lastname" name="lastname" required autocomplete="off">
    </div>
    <div class="user-box">
      <input type="text" placeholder="Address" name="address" required autocomplete="off">
    </div>
    <div class="user-box">
      <input type="email" placeholder="Email Address" name="email" required autocomplete="off">
    </div>
    <div class="user-box">
      <input type="email" placeholder="Confirm Email Address" name="cemail" required autocomplete="off">
    </div>
    <div class="user-box">
      <input type="password" placeholder="Password" name="password" required>
      
    </div>
    <div class="user-box">
      <input type="password" placeholder="Confirm Password" name="cpassword" required>
    </div>

    <input type="submit" class="submit" value="Create Account" name="submit">
  </form>
<?php

$error="";
    if(isset($_POST["submit"])){
        if($_POST["email"]==$_POST["cemail"] && $_POST["password"]==$_POST["cpassword"]){
            $_SESSION['email']=$_POST["email"];
            $_SESSION['password']=$_POST["password"];
            $_SESSION['name']=$_POST['firstname']." ".$_POST['lastname'];
            $_SESSION['address']=$_POST['address'];
            header("Location: login form.php");
            exit();

        }elseif($_POST["email"]!=$_POST["cemail"]){
        $error="<p style='color:red;'>Email Don't Match!</p>";
        print $error;}
        elseif($_POST["password"]!=$_POST["cpassword"]){
            $error="<p style='color:red;'>Password Don't Match!</p>";
            print $error;}
        }
?>
</div></center>
</body>
</html>