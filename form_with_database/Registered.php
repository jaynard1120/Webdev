<?php 
session_start();
$conn = mysqli_connect("localhost","root","","registeredUser");
?>
<?php
if(isset($_POST['delete'])){
        $base = $_POST['data'];
        mysqli_query($conn,"DELETE FROM `registered` where id = '$base'");
        mysqli_close($conn);
        header("location:Registered.php");
}
if(isset($_POST['update'])){
    $_SESSION['return'] = $_POST['data'];
    $_SESSION['lastname'] = $_POST['lastname'];
    $_SESSION['firstname'] = $_POST['firstname'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['pass'] = $_POST['pass'];
    header("location:update.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Users</title>
</head>
<style>
body{
    background-color:#83cff7;
}
li, ul {
    list-style: none;
}
.responsive-table .table-row {
    background-color: #ffffff;
    box-shadow: 0px 0px 9px 0px rgba(0, 0, 0, 0.1);
}

.responsive-table .table-row {
    border-radius:6px;
    font-size:19px;
    background-color: #ffffff;
    box-shadow: 0px 0px 9px 0px rgba(1, 0, 0.5, 1);
}
.responsive-table li {
    border-radius: 4px;
    padding: 25px 30px;
    display: flex;
    justify-content: space-between;
    margin-bottom: 25px;
}
.container {
    max-width: 1000px;
    max-height:100px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 10px;
    padding-right: 10px;
}
ul {
    display: block;
    list-style-type: disc;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    padding-inline-start: 40px;
}
.responsive-table .table-header {
    background-color: #95A5A6;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.03em;
}
.responsive-table .col-1 {
    flex-basis: 10%;
}
.responsive-table .col-2, .col-3 {
    flex-basis: 25%;
}
.responsive-table .col-4 {
    flex-basis: 20%;
}
.delete{
    height:30px;
    width:auto;
    border:none;
	color: white;
	background: #e67251;
	border-radius: 3px;
}
.update{
    height:30px;
    border:none;
	color: white;
	background: #3489eb;
	margin-left:5px;
	border-radius: 3px;
}

</style>
<body>
<button style="width:auto;height:35px;background-color:#1fcf5f;border:none;border-radius:5px;color:black;margin-top:2%"><a href="Form.php" style="text-decoration:none;">← Back</a></button>
<div class="container">

<ul class="responsive-table">

    <li class="table-header table-row">
    <div class="col col-1">ID</div>
    <div class="col col-2">Firstname</div>
    <div class="col col-3">Lastname</div>
    <div class="col col-3">Email</div>
    <div class="col col-4">Action</div>
    </li>


<?php 
$registered = mysqli_query($conn, "SELECT * FROM registered");
while ($row = mysqli_fetch_array($registered)){
?>
    <li class="table-row">
      <div class="col col-1" data-label="id"><?php echo $row['id'];?></div>
      <div class="col col-2" data-label="firstname"><?php echo $row['firstname'];?></div>
      <div class="col col-3" data-label=" lastname"><?php echo $row['lastname']?></div>
      <div class="col col-3" data-label="email"><?php echo $row['email']?></div>
      <div class="col col-4" data-label="actions">
      <form action="" method="post">
            <input type="hidden" name="data" value="<?php echo $row['id']?>"> 
            <input type="hidden" name="lastname" value="<?php echo $row['lastname']?>">     
            <input type="hidden" name="firstname"  value="<?php echo $row['firstname']?>"> 
            <input type="hidden" name="email" value="<?php echo $row['email']?>">
            <input type="hidden" name="pass" value = "<?php echo $row['passwords']?>">
            <input type="submit" name="delete" class="delete" value="  Delete  ">
            <input type="submit" class="update" name="update" value="  Update  ">              
			
            </form></div>
    </li>

<?php }?>
</ul>
</div>
</body>
</html>