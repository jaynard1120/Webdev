<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="form.css">
</head>

<body><center>

<div class = "card card-3">
    <div class = "card-heading" style="background-image: url('img.jpg')">
    </div>
    <div class = "card-body">
        
        <form action="" method="post">
        <h2 class = "title">Registration Info</h2>
            <div class = "input-group">
              <input type="text" class="input--style-3" placeholder = "First Name" name="fName" required autocomplete='off'>
            </div>
            <div class = "input-group">
              <input type="text" class="input--style-3" placeholder = "Last Name" name="lName" required autocomplete='off'>
            </div>
            <div class = "input-group">
              <input type="email" class="input--style-3" placeholder = "Email Address" name="email" required autocomplete='off'>
            </div>
            <div class = "input-group">
              <input type="password" class="input--style-3" placeholder = "Password" name="pass" required autocomplete='off'>
            </div>
            <button type="submit" name="submit" class="btn">Submit</button>
        </form>
    </div>
</div>
    <?php

        if(isset($_POST['submit'])){
            $errors = array();
              $fname = isset($_POST['fName'])? $_POST['fName']:null;
              $lname = isset($_POST['lName'])? $_POST['lName']:null;
              $email = isset($_POST['email'])? $_POST['email']:null;
              $password = isset($_POST['pass'])? $_POST['pass']:null;
            if(strlen(trim($fname))<=2 or strlen(trim($fname))>25){
                array_push($errors,"ERROR:Your firstname must be at least 2 characters and not exceed to 25 characters!");
            }
              if(strlen(trim($lname))<=2 or strlen(trim($lname))>25){
                array_push($errors,"ERROR:Your lastname must be at least 2 characters and not exceed to 25 characters!");
            }
            if(strlen(trim($password)) < 4 or strlen(trim($password))>16){
                array_push($errors,"ERROR:Your password must be at least 4 characters and not exceed to 16 characters!");
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
                $firstname = $_POST['fName'];
                $lastname = $_POST['lName'];
                $email = $_POST['email'];
                $password = $_POST['pass'];
                $conn = mysqli_connect("localhost","root","","registeredUser");
                if(!$conn){
                    die("Connection failed: ". mysqli_connect_error());
                }
                echo "Connected Succesfully!";
                $sql = ("INSERT INTO registered (id, firstname, lastname,email,passwords) Values ('null','$firstname','$lastname','$email','$password')"); 
                if(mysqli_query($conn,$sql)){
                    header("location:Registered.php");
                }else{
                    echo "<script>alert('Error!')</script>";
                }mysqli_close($conn);
              }
            }
    ?>
</body>
</html>