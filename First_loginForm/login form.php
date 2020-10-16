<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
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
<body>

<div class="login-box">
  <h2>Login</h2>
  <div >
   <h4>Explore and create your biography!</h4> 
    <h4>Bring your memories back!</h4>
  </div>
  <form action="login form.php" method="post">
    <div class="user-box">
      <input type="email" placeholder="Email Address"name="email" required autocomplete="off">
      
    </div>
    <div class="user-box">
      <input type="password" placeholder="Password"name="password" required>
      
    </div>
    <input type="submit" class="submit" value="Login" name="login">
  </form>
  <?php
  session_start();
  if(isset($_POST["login"])){
    if($_SESSION['email']==$_POST["email"] && $_SESSION['password']==$_POST["password"]){
    header("Location: main.php");
    exit();
  }else{
    echo "<p style='color:red'>Account didn't exist!</p>";
  }
}

  ?>
</div>
</body>
</html>