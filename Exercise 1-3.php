<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Associative Array</title>
</head>
<body>
    <?php
    
    
    $sentence = "Even the world's most successful individuals have experienced their
     fair share of setbacks and hardships. And there's much to learn from their challenges as well as their success.
     So, let's take a look at some of their quotes to get energized and inspired.";
    $word = preg_replace("/[,.;:!?]/","",$sentence);
    $wordArr = explode(" ",$word);
    $seperate = array();
    foreach($wordArr as $Word){
        if(!array_key_exists(strtolower($Word),$seperate)){
            if($Word!=""){
                echo countWords($Word,$wordArr). "\t". $Word."<br>";
                $seperate[strtolower($Word)]=countWords($Word,$wordArr);
            }
        }
    }
    function countWords($value,$newArr)
    {    
        $count = 0;
        foreach($newArr as $newval){
            if($newval == $value){
                $count++;
            }
        }
        return $count;
    }
    
    ?>
</body>
</html>