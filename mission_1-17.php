<!DOCTYPE html>
<html lang="ja">
    <head>
        <html charset="UTF-8">
        <title>mission1-17</title>
    </head>
</html>

<body>
    
<?php

    $number=30;
    if($number%3==0 && $number%5==0){
        echo "FizzBuzz<br>";
    }elseif($number%3==0){
        echo "Fizz<br>";
    }elseif($number%5==0){
        echo "Buzz<br>";
    }else{
        echo $number."<br>";
    }
        
?>

</body>
</html>