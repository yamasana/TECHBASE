<?php 
  
   // DB接続設定 
   $dsn = 'mysql:dbname=tb230374db;host=localhost';
   $user = 'tb-230374';
   $password = 'xxsgmnVKWH';
   $pdo = new PDO($dsn, $user, $password, 
   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
   
   //データを取得、表示
    $sql = 'SELECT * FROM tbtest';
    $stmt = $pdo->prepare($sql);                 
    $results = $stmt->fetchAll(); 
    foreach ($results as $row){
        //$rowの中にはテーブルのカラム名が入る
        echo $row['id'].',';
        echo $row['name'].',';
        echo $row['comment'].'<br>';
    echo "<hr>";
    }
    
?>