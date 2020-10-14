<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result BMI</title>
</head>
<style>
    .main{
        border:solid 1px black;
        padding:50px;
        max-width: fit-content;
        text-align:center;
        margin-top: 5%;
    }p{
        font-size:30px;
    }input{
        width: 200px;
        height: 50px;
        font-size: 20px;
    }
</style>
<body><center>
    <div class="main">
    <h1>Result</h1>
    <?php
    $error[]= array();
        if(isset($_POST['calculate'])){
            $height = isset($_POST['height'])? $_POST['height']:null;
            $weight = isset($_POST['weight'])? $_POST['weight']:null;
            if($height!=null and $weight!=null){
                $bmi = ($weight/$height**2)*10000;?>
                <p>You are</p>
               <?php if($bmi<18.5){
                    echo "<p>Underweight</p>";
                }elseif($bmi>18.5 and $bmi<24.9){
                    echo "<p>Normal</p>";
                }elseif($bmi>25and $bmi<29.9){
                    echo "<p>Overweight</p>";
                }else{
                    echo "<p>Obese</p>";
                }echo "<p>Your BMI:   <p style='border:solid 1px black;'>".$bmi."</p></p>";
            }}?>
            <form action="BMImain.html" method="post">
                <input type="submit" value="Back to Calculator">
            </form>
        </div>
</body>
</html>
