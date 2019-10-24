<?php
    $conn = new mysqli('localhost','root','','trangweb') or die('Kết nối thất bại!'.mysqli_connect_error());
    mysqli_query($conn, 'SET NAMES UTF8');
    session_start(); // gọi hàm session
?>
<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $sure = htmlspecialchars($_POST['sure'], ENT_QUOTES);
    if ($sure == 'Yes') { 
      $id = $_GET["id"];
      $query1 = "SELECT * FROM taikhoan WHERE id = $id";
      $result1 = mysqli_query($conn, $query1);
      if(mysqli_num_rows($result1)>0)
      {
        $row=mysqli_fetch_assoc($result1);
       
          $query2 = "DELETE FRom taikhoan WHERE id=$id";
          mysqli_query($conn, $query2);
          header("Location: quanlyuser.php");
       } 
    }
   
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản trị</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="css/edit.css">
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
     <h3>Delete Users</h3>
              <div class="card-body">
                  <?php
                  $id = $_GET["id"];
                  $query = "SELECT * FROM taikhoan WHERE id = $id";
                  $result = mysqli_query($conn, $query);
                  if(mysqli_num_rows($result)>0)
                  {
                    $row=mysqli_fetch_assoc($result);
                    $name1 = $row['user'];
                  }
                  ?>
                  <form method="post">
                  
                  <p class="card-category">Bạn có muốn xóa <?php
                        echo "" . $name1;
                        ?></p>                
                    <input id="submit-yes" class="btn btn-primary pull-right" type="submit" name="sure"value="No"> 
                    <input id="submit-no" class="btn btn-primary pull-right" type="submit" name="sure" value="Yes">
                    
                    
                    <div class="clearfix"></div>
     </div>
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>  
</body>
</html>