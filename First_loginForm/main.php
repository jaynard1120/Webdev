<?php session_start();
$posts = (isset($_SESSION['newPosts'])) ? $_SESSION['newPosts'] : array();
if(isset($_POST['post'])){
    isset($_POST['input']);
    if(!empty($_POST['input'])){
      array_push($posts, $_POST['input']);
      $_SESSION['newPosts'] = $posts;
}}
if (isset($_POST['x'])){
    array_splice($_SESSION['newPosts'], $_POST['id'],1);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biography</title>
</head>
<style>
    h1 {
font-size: 464%;
}
i {
font-size: 214%;
}
img {
width: 99.5%;
}
.division0 {
  background: #d9d9d9; 
  margin: 5%; 
  padding: 2%;
  text-align: center;
}
.division1 {
  background: white;
  margin: 2%;
  max-width:700px;

}
</style>
<body>
<div class="division0">
<?php

$var=$_SESSION['name'];
    echo "<center><h2>Welcome!</h2><h1>$var</h1></center>";
?>
</div>
<center>
<div class="division1">
  <img src="prof.jpg">
  <p style = "padding: 0.9%;">The great person who has a big heart, helpful person, hardworking person and a person that can bring change to the world.</p>
</div>

<div style="border:1;border-style:groove;margin-left:30%;margin-right:30%;padding:2%;margin-top:2%">
    <h3>Write something inside the box.</h3>
    <form method="post">
    <textarea name="input" id="" cols="60" rows="5"></textarea><br><br>
    <input style="background-color:lightgreen;margin-right:-80%" type="submit" value="Post" name="post">
</form>
</div>

<?php if(isset($_SESSION['newPosts'])):
        for($id= 0; $id < count($_SESSION['newPosts']); $id++):
            $posted = $_SESSION['newPosts'][$id];
        ?>
<div class="division0">
    <?php echo $posted;?>
    <form action="main.php"  method="POST">
                <input type="hidden" name ="id" value="<?php echo $id;?>">
                <input name="x" style="color:red;font-size:20px;float:right;margin-top:-2%;border:none;background:transparent;" type="submit" value="X">
            </form>
</div>
<?php endfor?>
    <?php endif?>
<div class="division0">
    <h3>Messages that inspires me</h3>
    <h4>
    Our time on earth is fleeting, and as we grow older, we become increasingly aware of this fact. Although it may be easier said than done, all the hurt, troubles, 
    and disappointments of the past or present should not stop us from living our next moments in our pursuit of happiness.
Each day is a second chance to make a change for the better, and we should use this opportunity to express ourselves in a more 
positive manner. On this note, we at Quotabulary have compiled some quotes on life being too short.
    </h4>
    <h4>
    “Do what you love to do and give it your very best. Whether it’s business or baseball, or the theater, or any field. If you don’t love what
     you’re doing and you can’t give it your best, get out of it. Life is too short. You’ll be an old man before you know it.”
    </h4>
</div>
<?php

$var1 = $_SESSION['address'];
$email = $_SESSION['email'];
    echo "<div class='division0'><h4>Personal Information.</h4>
    <p>Name: $var <br>Address: $var1 <br>Email:$email</p>
    </div>";
    

?>

</body>
</html>