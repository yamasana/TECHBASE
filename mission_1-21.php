<!DOCTYPE html>
<html lang="ja">
    <head>
        <html charset="UTF-8">
        <title>mission1-21</title>
    </head>
</html>

<body>

    <form action="" method="post">
        <input type="number" name="num" 
    placeholder="数字を入力してください">
        <input type="submit" name="submit">
    </form>
    <?php
            
    $num = $_POST["num"];
            
     if($num%3==0 && $num%5==0){
        echo "FizzBuzz<br>";
    }elseif($num%3==0){
        echo "Fizz<br>";
    }elseif($num%5==0){
        echo "Buzz<br>";
    }else{
        echo $num."<br>";
    }
    
    ?>

</body>
</html>