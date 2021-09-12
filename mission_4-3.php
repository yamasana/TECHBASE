<?php
    
    // DB接続設定 
    $dsn = 'mysql:dbname=tb230374db;host=localhost';
    $user = 'tb-230374';
    $password = 'xxsgmnVKWH';
    $pdo = new PDO($dsn, $user, $password, 
   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
  
    //テーブルの確認
    $sql ='SHOW TABLES';
    $result = $pdo -> query($sql);
    foreach ($result as $row){
        echo $row[0];
        echo '<br>';
    }
    echo "<hr>";