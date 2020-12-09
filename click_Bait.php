<?php
            if(isset($_POST["fix"])){
                checkBait();
            }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clock_Bait</title>
</head>
<body>
    <div>
        <form action="" method="post">
            <textarea placeholder="Paste a clickbait headline" name="click_bait"cols="30" rows="10"></textarea><br>
            <button name="fix">Change the clickbait headline</button>      
        </form>
    </div>
    <?php
        function checkBait(){
            $clickBait = strtolower($_POST["click_bait"]);
            $clickbait_words= array("scientists","doctors","hate","stupid","weird","simple","tricked","shocked me","you'll never believe","hack","epic","unbelievable");
            $replacement_words= array("so-called scientists","so-called doctors","aren't threatend by","average","completely normal","ineffective","method",
                                        "is no different than the others","you won't really be surprised by","slightly improve","boring","normal");
            $honestHeadline= str_replace($clickbait_words,$replacement_words,$clickBait);
            return array($clickBait,$honestHeadline);
        }
        // function displayHeadline($x,$y){

        // }
        if (isset($_POST["fix"])){
            // $clickBait = checkBait()[0];
            // $honestHeadline= checkBait()[1];
            // displayHeadline($clickBait,$honestHeadline);
            echo "<strong>Original Headlines</strong><h4>".ucwords(checkBait()[0])."</h4><hr>";
            echo "<strong>Honest Headlines</strong><h4>".ucwords(checkBait()[0])."</h4><hr>";
        }
    ?>
</body>
</html>