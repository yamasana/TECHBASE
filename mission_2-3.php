<!DOCTYPE=html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission3-3</title>
</head>
<body>
    
    <form action="" method="post">
    名前<br>
    <input type="text" name="name" placeholder="名前"><br>
    コメント<br>
    <input type="text" name="comment" placeholder="コメント">
    <input type="submit" value="送信"><br>
    削除対象番号<br>
    <input type="text" name="deleteno" placeholder="削除対象番号">
    <input type="submit" value="削除">
    
    </form>

<?php
    
    $filename="mission_3-3.txt";
    $name=$_POST['name'];
    $comment=$_POST['comment'];
    $deleteno=$_POST['deleteno'];
    
    $date=date('Y/m/d H:i:s');
    
    if(file_exists($filename)){
      $num=count(file($filename))+1;
    }
    else{
      $num=1;
    }
    
    $newdata=$num."<>".$name."<>".$comment."<>".$date;
       
    if(!empty($_POST['name']) && !empty($_POST['comment'])){
      $fp = fopen($filename,'a');
      fwrite($fp,$newdata.PHP_EOL);
      fclose($fp);
    }   
    
    //ファイルの書き込み,中身を空にする
    if(!empty($delete)){
        $fp=fopen($filename,'w');
        ftruncate($fp,0);
        fseek($fp,0);
        
    $lines=file($filename,FILE_IGNORE_NEW_LINES);
        foreach($lines as $line){
        $lines=explode("<>",$line);
        
    if($lines[0] !=$deleteno){
        fwrite($fp,$file);
        }
    }
        fclose($fp);
    }
    
?>
    
</body>
</html>