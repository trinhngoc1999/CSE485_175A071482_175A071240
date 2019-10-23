<?php
    $conn = new mysqli('localhost','root','','trangweb') or die('Kết nối thất bại!'.mysqli_connect_error());
	mysqli_query($conn, 'SET NAMES UTF8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div>
		<a href="index.php">trang chủ</a>
		<form method="post">
			Tên đăng ký <input type="text" name="user"><br><br>
			Mật khẩu <input type="password" name="pass"><br><br>
			Email	<input type="text" name="email">
			Số điện thoại	<input type="text" name="phones">
			<input type="submit" name="register" value="Đăng ký"><br><br>
			<!-- <a href="index.php">Đăng nhập</a> -->
            <?php
            // kiểm tra xem có bấm nút đăng ký chưa
                if (isset($_POST['register'])) {
                    //kiểm tra xem các ô nhập có rỗng hay không
                    if (!empty($_POST['user']) && !empty($_POST['pass']) && !empty($_POST['email']) && !empty($_POST['phones'])) {
                        //đặt các biến
                        $user = $_POST['user'];
                        $pass = password_hash($_POST['pass'],PASSWORD_DEFAULT);   //băm mật khẩu
                        $email = $_POST['email'];
                        $phones = $_POST['phones'];     
                        // thực hiện lệnh kiểm tra xem đã tồn tại tài khoản chưa
                    $row = mysqli_query($conn,"SELECT * from taikhoan where user = '{$user}' and email='{$email}'");
                        //đếm số bản ghi 
                        $count = mysqli_num_rows($row);
                            //nếu số bản ghi bằng 0 thì đăng ký
                        if($count==0){
                            mysqli_query($conn,"INSERT into taikhoan(user,pass,email,phones) values('$user','$pass','$email','$phones')") or die(mysqli_error($conn));
    
                            echo "đăng ký thành công, vui lòng quay về trang đăng nhập lại!!!";
                        }
                        else echo "Tài khoản đã tồn tại";
                    }
                    else echo "Nhập tài khoản để đăng ký";
                }
            ?> 
		</form>
	</div>
</body>
</html>