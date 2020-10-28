<?php 
session_start();
$conn = mysqli_connect("localhost","root","","registeredUser");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>

body{
    font-family: "Poppins", "Arial", "Helvetica Neue", sans-serif;
    background-image: url('img2.png');
    background-repeat: no-repeat;
    background-size:cover;
       
}
table {
    width: 50%;
    margin: 30px auto;
    border-collapse: collapse;
    margin-top:5%;
}

tr {
	border-bottom: 1px solid #cbcbcb;
    padding:5px;
}

th {
	font-size: 19px;
	color: #6B8E23;
}

th, td{
	border: none;
    height: 30px;
    padding: 2px;
    text-align:left;
}
td{
    box-shadow: 0px 0px 9px  rgba(0, 0, 0, 0.2);
    height:40px;
    background:#fcfcfc;
}
tr:hover {
	background: #E9E9E9;
}


li, ul {
    list-style: none;
}
.responsive-table .table-row {
    background-color: #ffffff;
    box-shadow: 0px 0px 9px 0px rgba(0, 0, 0, 0.1);
}

.responsive-table .table-row {
    background-color: #ffffff;
    box-shadow: 0px 0px 9px 0px rgba(0, 0, 0, 0.1);
}
.responsive-table li {
    border-radius: 3px;
    padding: 25px 30px;
    display: flex;
    justify-content: space-between;
    margin-bottom: 25px;
}
.responsive-table li {
    border-radius: 3px;
    padding: 25px 30px;
    display: flex;
    justify-content: space-between;
    margin-bottom: 25px;
}
.container {
    max-width: 1000px;
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
.responsive-table .col-2 {
    flex-basis: 40%;
}
.responsive-table .col-3 {
    flex-basis: 25%;
}
.responsive-table .col-4 {
    flex-basis: 25%;
}
</style>
<body>
<div class="container">
  <h2>Responsive Tables Using LI <small>Triggers on 767px</small></h2>
  <ul class="responsive-table">
    <li class="table-header">
      <div class="col col-1">Job Id</div>
      <div class="col col-2">Customer Name</div>
      <div class="col col-3">Amount Due</div>
      <div class="col col-4">Payment Status</div>
    </li>
    <?php 
$registered = mysqli_query($conn, "SELECT * FROM registered");
while ($row = mysqli_fetch_array($registered)){
?>
    <li class="table-row">
      <div class="col col-1" data-label="Job Id"><?php echo $row['firstname'];?></div>
      <div class="col col-2" data-label="Customer Name"><?php echo $row['lastname']?></div>
      <div class="col col-3" data-label="Amount"><?php echo $row['email']?></div>
      <div class="col col-4" data-label="Payment Status">
      <form action="" method="post">
        <input type="hidden" name="lastname" value="<?php echo $row['lastname']?>">     
            <input type="hidden" name="data"  value="<?php echo $row['firstname']?>"> 
            <input type="hidden" name="email" value="<?php echo $row['email']?>">
            <input type="submit" class="update" name="update" value="Update">              
			<input type="submit" name="delete" class="delete" value="X">
            </form></div>
    </li>
    <?php }?>
    <li class="table-row">
      <div class="col col-1" data-label="Job Id">42442</div>
      <div class="col col-2" data-label="Customer Name">Jennifer Smith</div>
      <div class="col col-3" data-label="Amount">$220</div>
      <div class="col col-4" data-label="Payment Status">Pending</div>
    </li>
    <li class="table-row">
      <div class="col col-1" data-label="Job Id">42257</div>
      <div class="col col-2" data-label="Customer Name">John Smith</div>
      <div class="col col-3" data-label="Amount">$341</div>
      <div class="col col-4" data-label="Payment Status">Pending</div>
    </li>
    <li class="table-row">
      <div class="col col-1" data-label="Job Id">42311</div>
      <div class="col col-2" data-label="Customer Name">John Carpenter</div>
      <div class="col col-3" data-label="Amount">$115</div>
      <div class="col col-4" data-label="Payment Status">Pending</div>
    </li>
  </ul>
</div>
<?php
if(isset($_POST['delete'])){
        $base = $_POST['data'];
        echo "<script>alert('$base')</script>";
       // $registered = mysqli_query($conn,"DELETE FROM `registered` where firstname = '$base'");
        mysqli_close($conn);
             
}?>
</body>
</html>