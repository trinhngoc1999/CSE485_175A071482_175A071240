<?php
    $conn = new mysqli('localhost','root','','trangweb') or die('Kết nối thất bại!'.mysqli_connect_error());
    mysqli_query($conn, 'SET NAMES UTF8');
    session_start(); // gọi hàm session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="submit" value="Đăng xuất" name="signout">
        <?php  
            if(isset($_POST['signout'])){
                include"signout.php";
            }
        ?>
    </form>
</body>
</html>