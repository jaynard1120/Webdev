<?php session_start();?>
<?php
    if(isset($_POST['submit'])){
        $conn = mysqli_connect("localhost","root","","registeredUser");
            if(!$conn){
                die("Connection failed: ". mysqli_connect_error());
            }
            $firstName = $_POST['fName'];
            $lastName = $_POST['lName'];
            $email = $_POST['email'];
            $base = $_SESSION['return'];
            $pass = (!empty($_SESSION['pass']))? $_POST['pass']:$_SESSION['pass'];
            echo $pass;
            $update = mysqli_query($conn,"UPDATE `registered` SET firstname = '$firstName', lastname = '$lastName',email = '$email', passwords = '$pass' WHERE id = '$base'");
            mysqli_close($conn);
            header("location:Registered.php");
    }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Info</title>
    <link rel="stylesheet" href="form.css">
</head>
<body><center>

<div class = "card card-3">
    <div class = "card-heading" style="background-image: url('img1.jpg')">
    </div>
    <div class = "card-body">
        
        <form action="" method="post">
        <h2 class = "title">Update Info</h2>
            <div class = "input-group">
              <input type="text" class="input--style-3" value = "<?php echo $_SESSION['firstname'] ?>" name="fName" autocomplete='off'>
            </div>
            <div class = "input-group">
              <input type="text" class="input--style-3" value = "<?php echo $_SESSION['lastname'] ?>" name="lName" autocomplete='off'>
            </div>
            <div class = "input-group">
              <input type="email" class="input--style-3" value = "<?php echo $_SESSION['email'] ?>" name="email" autocomplete='off'>
            </div>
            <div class = "input-group">
              <input type="password" class="input--style-3" placeholder = "Password" name="pass" autocomplete='off'>
            </div>
            <button type="submit" name="submit" class="btn">Update</button>
        </form>
    </div>
</div>

</body>
</html>