<?php
    
    // DB接続設定 
    $dsn = 'mysql:dbname=tb230374db;host=localhost';
    $user = 'tb-230374';
    $password = 'xxsgmnVKWH';
    $pdo = new PDO($dsn, $user, $password, 
   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
  
    // DB内にテーブルを作成
    $sql = "CREATE TABLE IF NOT EXISTS tbtest"
    ." ("
    . "id INT AUTO_INCREMENT PRIMARY KEY,"
    . "name char(32),"
    . "comment TEXT"
    .");";
    $stmt = $pdo->query($sql);
    

?>