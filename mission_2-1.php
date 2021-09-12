<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_2-1</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="comment" value=コメント>
        <input type="submit" value="送信">
    </form>
    <?php
        $comment=$_POST["comment"];
        $filename="mission_2-2.txt";
        if(!empty($_POST["comment"])){
        $fp = fopen($filename,"w");
        fwrite($fp, $comment.PHP_EOL);
        fclose($fp);
        }
        if(file_exists($filename)){
        $comments = file($filename,FILE_IGNORE_NEW_LINES);
     }
        echo $comment ."を受けつけました。";
    ?>
</body>
</html>