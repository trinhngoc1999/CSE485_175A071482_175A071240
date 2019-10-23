<?php
    $conn = new mysqli('localhost','root','','trangweb') or die('Kết nối thất bại!'.mysqli_connect_error());
    mysqli_query($conn, 'SET NAMES UTF8');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
</head>
<body>
    <form method="post">
        Tên đăng nhập: 
        <input type="text" name="user">
        <br>
        Mật khẩu:
        <input type="password" name="pass">
        <br>
        <input type="submit" name="login" value="Đăng nhập">
        <a href="register.php">Đăng ký?</a>
        <?php function location($url)
                        { ?>
                            <script type="text/javascript">
                            window.location = "<?=$url?>";
                            </script>
        <?php } ?>
        <?php
        //kiểm tra có bấm nút login chưa
            if(isset($_POST['login'])){
                //kiểm tra có rỗng không
                if(!empty($_POST['user']) && !empty($_POST['pass'])){
                    //đặt biến
                    $user=$_POST['user'];
                    $pass=$_POST['pass'];
                    //gán thông tin tài khoản vào session
                    $_SESSION['user']=$user;
                    $_SESSION['pass']=$pass;

                    $sql = mysqli_query($conn,"SELECT * from taikhoan where user = '{$user}'");
					$row=mysqli_fetch_assoc($sql);

							if(password_verify($pass, $row['pass'])){
							    location("admin.php");
                            }
                            else{
                                echo'lỗi';
                            }
                    
                }
                else{
                    echo"Vui lòng nhập đầy đủ thông tin";
                }
            }
        ?>

    </form>
</body>
</html>