<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chessboard</title>
</head>
<body>
    <?php
    echo "<table border='1px' padding=0>";
        $counter = 0;
        for($row=1;$row<=8;$row++){
            echo "<tr>";
            for($col=1;$col<=8;$col++){
                $num=$row+$col;
                if ($num%2==0){
                    echo "<td height=60px width=60px bgcolor=black></td>";
                }else{
                    echo "<td height=60px width=60px bgcolor=white></td>";
                }
            }
            echo "</tr>";
        }
    echo "</table>";
    ?>
    
</body>
</html>