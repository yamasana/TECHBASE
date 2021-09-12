<?php 
  
  // DB接続設定 
    $dsn = 'mysql:dbname=tb230374db;host=localhost';
    $user = 'tb-230374';
    $password = 'xxsgmnVKWH';
    $pdo = new PDO($dsn, $user, $password, 
   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
   
  //データの入力
  　$sql = $pdo -> prepare("INSERT INTO tbtest (name, comment) 
  　VALUES (:name, :comment)");
    $sql -> bindParam(':name', $name, PDO::PARAM_STR);
    $sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
    $name = '鈴木太郎';
    $comment ='こんにちは'; 
    $sql -> execute();
   
?>