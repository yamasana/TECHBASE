<!DOCTYPE html>
<html lang="ja">
    <head>
        <html charset="UTF-8">
        <title>mission1-20</title>
    </head>
</html>

<body>

   <form action="" method="post">
        <input type="text" name="str">
        <input type="submit" name="submit">
    </form>
    <?php
            $str = $_POST["str"];
            echo $str;
    ?>

</body>
</html>