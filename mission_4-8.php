<?php

// DB接続設定
    $dsn = 'mysql:dbname=tb230374db;host=localhost';
    $user = 'tb-230374';
    $password = 'xxsgmnVKWH';
    $pdo = new PDO($dsn, $user, $password, 
   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
   
    $id = 8;
    $sql = 'delete from tbtest where id=:id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    
?>