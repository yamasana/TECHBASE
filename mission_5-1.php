<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>mission5-1</title>
</head>

<body>

<?php
    
//データベース接続設定
 //データベース名、ユーザー名、パスワード
   $dsn = 'mysql:dbname=tb230374db;host=localhost';
   $user = 'tb-230374';
   $password = 'xxsgmnVKWH';
    
  //データベースに接続
   $pdo = new PDO($dsn, $user, $password, 
   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));//エラー表示
 
 // 【！この SQLは tbtest テーブルを削除します！】
        $sql = 'DROP TABLE tb';
        $stmt = $pdo->query($sql);
 
//データベースにテーブル作成
   $sql = "CREATE TABLE IF NOT EXISTS tb"
    ." ("
    . "id INT AUTO_INCREMENT PRIMARY KEY,"//idは整数型、自動連番、主キー
    . "name char(32),"//文字データ型
    . "comment TEXT,"
    . "compass char(32),"
    . "date char(32)"
    .");";
   $stmt = $pdo->query($sql);
   
   //テーブルの確認
    $sql ='SHOW CREATE TABLE tb';
    $result = $pdo -> query($sql);
    foreach ($result as $row){
        echo $row[0];
        echo '<br>';
    }
    echo "<hr>";
    
    $sql ='SHOW CREATE TABLE tb';
    $result = $pdo -> query($sql);
    foreach ($result as $row){
        echo $row[1];
    }
    echo "<hr>";
   
  //変数に代入
   $date = date("Y/m/d H:i:s");

  //送信ボタンが押されたら
   if(!empty($_POST['submit'])) {
     $name = $_POST['name'];
     $comment = $_POST['comment'];
}
     
   if(!empty($_POST['compass']) && !empty($_POST['editno'])) {   
     $compass = $_POST['compass'];
     $editno = $_POST['editno'];
}

  //削除ボタンが押されたら
   if(!empty($_POST['delete'])) {
     $delete = $_POST['delete'];
     $delpass = $_POST['delpass'];
}

  //編集ボタンが押されたら
   if(!empty($_POST['edit']) && !empty($_POST['editno'])) {
     $editno = $_POST['editno'];
     $editpass = $_POST['editpass'];
}

//削除機能
   if(!empty($delete)) {  
    $sql = 'SELECT * FROM tb WHERE id=:id';//レコードを取得
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $delno, PDO::PARAM_INT); 
    $stmt->execute();
    $results = $stmt->fetchAll();
    foreach ($results as $row) {
        if ($delpass == $row['compass']){
            $sql = 'DELETE FROM tb WHERE id=:id';//レコードを削除
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $delno, PDO::PARAM_INT);
            $stmt->execute();
        }
    }  
}

//編集機能
  if(!empty($edit)) {
    $sql = 'SELECT * FROM tb WHERE id=:id';//レコードを取得
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(';id', $editno,PDO::PARAM_INT);
    $stmt->execute();
    $results = $stmt->fetchAll();
    foreach($results as $row) {
      if($editpass == $row['compass']) {
        $editno_form = $row['id'];
        $editname_form = $row['name'];
        $editcom_form = $row['comment'];
        $editpass_form = $row['compass'];
      }
    }
}

  if(!empty($name) && !empty($comment)){

//編集モード
  if(!empty($editno)) {
      $sql = 'UPDATE tb SET name=:name,comment=:comment,//
      compass=:compass,date=:date WHERE id=:id';//レコードを更新
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
      $stmt->bindParam(':compass', $compass, PDO::PARAM_STR);
      $stmt->bindParam(':date', $date, PDO::PARAM_STR);
      $stmt->bindParam(':id', $edit, PDO::PARAM_INT);
      $stmt->execute();

//新規登録モード
  }else{    
      $sql = $pdo -> prepare("INSERT INTO tb (name, comment, compass, date)
      VALUES (:name, :comment, :compass, :date)");//テーブルにレコードを追加
      $sql -> bindParam(':name', $name, PDO::PARAM_STR);
      $sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
      $sql -> bindParam(':compass', $compass, PDO::PARAM_STR);
      $sql -> bindParam(':date', $date, PDO::PARAM_STR);
      $sql -> execute();
  }
}
?>

<form action="" method="post">
   <input type="text" name="name"placeholder="名前" 
  value="<?php if(!empty($edname)){echo $edName;}?>">
   <br>
   <input type="text" name="comment"placeholder="コメント" 
  value="<?php if(!empty($edcomment)){echo $edComment;} ?>">
   <input type="hidden" name="editnum" placeholder=""
  value="<?php if(!empty($edit)){echo $edit;} ?>">
   <br>
   <input type="text" name="comppass" placeholder="パスワード">
   <input type="submit" name="submit" >
   <br>

  <input type="text" name="delete" placeholder="削除対象番号">
   <br>
   <input type="text" name="delpass" placeholder="パスワード">
   <input type="submit" name="submit" value="削除" >
   <br>

   <input type="text" name="edit" placeholder="編集対象番号">
   <br>
   <input type="text" name="editpass" placeholder="パスワード">
   <input type="submit" name="submit" value="編集">
  
</form>

<?php
    $sql = 'SELECT * FROM tb';//レコードを取得
    $stmt = $pdo->query($sql);
    $results = $stmt->fetchAll();
    foreach ($results as $row){
        echo $row['id'].' ';
        echo $row['name'].' ';
        echo $row['comment'].' ';
        echo $row['date'].'<br>';
    }
?>

</body>
</html>
