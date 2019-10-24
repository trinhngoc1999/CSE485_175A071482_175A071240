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
    <link rel="stylesheet" href="css/index.css">
    
</head>
<body style="background-image:url(img/bann.jpg);">
        <div class="header-w3l">
                <h1>ĐH NGUYỄN TẤT THÀNH</h1>
            </div>
        <div class="wthree-form">
            <form action="#" method="post">
                    <div class="form-sub-w3">
                        <input type="text" name="user" placeholder="Username " required="" />
                   
                    </div>
                    <div class="form-sub-w3">
                        <input type="password" name="pass" placeholder="Password" required="" />
                   
                    </div>
                   <div class="md3">
                       <h6><a href="">Forgot Password?</a></h6>
                       <div class="right-w31">
                            <input name=" submit" type="submit" value="Login">
                       </div><br>
                       <div class="register"><a href="register.php">Register</a></div>
                   </div>
                   
                </form>
            </div>
  
        <?php function location($url)
                        { ?>
                            <script type="text/javascript">
                            window.location = "<?=$url?>";
                            </script>
        <?php } ?>
        <?php
        //kiểm tra có bấm nút login chưa
            if(isset($_POST['submit'])){
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