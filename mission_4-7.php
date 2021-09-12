<?php

  // DB接続設定
    $dsn = 'mysql:dbname=tb230374db;host=localhost';
    $user = 'tb-230374';
    $password = 'xxsgmnVKWH';
    $pdo = new PDO($dsn, $user, $password, 
   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

    $id = 1; //変更する投稿番号
    $name = "（変更したい名前）";
    $comment = "（変更したいコメント）"; //変更したい名前、変更したいコメントは自分で決めること
    $sql = 'UPDATE tbtest SET name=:name,comment=:comment WHERE id=:id';
    $stmt = $pdo->query($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

?>