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
    <title>Quản trị</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="css/thembaiviet.css">
</head>
<body>
  
    <div id="header">
        <div class="title col-md-6"> 
         
          <a class="navbar-brand" href="#">Đại học Nguyễn Tất Thành </a></div>
      <div class="ad_logout col-md-5">
         <ul  class="navbar-nav">
          
             <!-- Dropdown -->
             <li class="nav-item ">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                   Admin
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                 
                   <a class="dropdown-item" href="">Profile</a><hr>
                   
                   <a class="dropdown-item" href="logout.php">Log out</a>
                </div>
              </li>
          </ul>
      </div>
     </div> 
     <div class="content">
        <div class="content-left">  
            <ul>
               <li class="nav-item1">
                  <a href="admin.php">
                    Trang chủ 
                  </a>
                </li> <hr>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       Bài viết
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                         <a class="dropdown-item" href="thembaiviet.php">Thêm bài viết</a>
                         <a class="dropdown-item" href="chinhbaiviet.php">Chỉnh sửa bài viết</a>   
                         <a class="dropdown-item" href="xoabaiviet.php">Xóa bài viết</a>
                    </div>
                 </li><hr>
                 <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   Quản lý user
                    </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="quanlyuser.php">Danh sách user</a>
                    <a class="dropdown-item" href="danhsachquyen.php">Danh sách quyền</a>
                   
                  </div></li>
                 </ul>
     </div>
     <div class="content-right">
     <div id="page-wrapper">
                            <?php
                             $conn = mysqli_connect('localhost','root','','trangweb');
                             mysqli_set_charset($conn, 'UTF8');
                          if(!($conn)){
                              die ('Khong the ket noi co so du lieu');
                          };
                            if(isset($_POST['submit']))
                            {   
                                //s$target = "images/".basename($_FILES['image']['name']);
                                // $userid = mysqli_real_escape_string($conn, $_POST['id']); 
                                $title = mysqli_real_escape_string($conn, $_POST['title']); 
                               // $image = $_FILES['image']['name']; 
                                $content = mysqli_real_escape_string($conn, $_POST['content']); 
                                //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
                                if (!$title || !$content)
                                {
                                    echo "Vui lòng nhập đầy đủ thông tin trước khi cập nhật.";
                                    exit;
                                }
                      
                                $sql = "INSERT INTO posts (title,date, content) VALUES ('$title',now(),'$content')";
                                $result = mysqli_query($conn, $sql)   or die(mysqli_error($conn));
                                //if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
                                   // $msg = "Upload complete.";
                                //}else{
                                    //$msg = "Upload fail.";
                                //}
                        
                        
                                $sql = ("SELECT title, content FROM posts WHERE title='$title'");
                                echo'Bạn đã cập nhật thành công. <a href="javascript: history.go(-1)">Trở lại</a>';
                        
                            }
                            ?>
                                <form method="post" action="thembaiviet.php" enctype="multipart/form-data">
                                    <h3 id="result"></h3>
                                    <h2 style="color: rgb(56, 221, 84)">Thêm mới bài viết</h2>
                                    <div class="form-group">
                                        <label>Tiêu đề bài viết</label>
                                        <input type="text" name="title" class="form-control" value="">
                                    </div>
                                   <!-- <div class="form-group">
                                        <label>Ảnh</label><br>
                                        <input type="file" name="image">
                                    </div>  -->
                                    <div class="form-group">
                                        <label>Nội dung</label>
                                        <textarea name="content" class="form-control" style="height: 150px;"></textarea>
                                    </div>
                                   
                                   
                                    
                                    
                                   
                                    <button type="submit" id="submit" name="submit" class="btn btn-primary " >Thêm mới</button>
                                </form>
                               
                         </div>


     </div>
     </div>
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>  
</body>
</html>