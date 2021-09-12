<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>mission2-2</title>
    </head>
</html>

<body>
    <form action="" method="post">
        <input type="text" name="comment" value="コメント">
        <input type="submit" value="送信">
    </form>
</body>

<?php
  
    $filename="mission_2-2.txt";
    if(!empty($_POST['comment'])){
    $comment=$_POST['comment'];
      echo $comment."を受け付けました。";
    $fp=fopen($filename,"a");
    fwrite($fp,$comment.PHP_EOL);
    fclose($fp);
    
    }
    
    
    
?>