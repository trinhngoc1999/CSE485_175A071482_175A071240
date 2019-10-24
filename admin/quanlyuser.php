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
    
    <link rel="stylesheet" href="css/admin.css">
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
        <h2>Quản Lý</h2>
     <table class="table">
                 <thead class="text-primary ">
                 <tr>
                   <th>ID</th>
                   <th>Name</th>
                    <th>Email</th>
                    <th>Phones</th>
                    <th>Option</th>
                 </tr>
                </thead>
               
                <?php
                       $sql = "select * from taikhoan";
                      mysqli_set_charset($conn, "UTF8");
                       $result = mysqli_query($conn, $sql);
                        $i = 1;
                         while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                   <tr>
                       <td><?php echo $i ?></td>
                         <td><?php echo $row["user"] ?></td>
                                                        
                        <td class="text-primary"><?php echo $row["email"] ?></td>
                        <td class="text-primary"><?php echo $row["phones"] ?></td>
                          <td>
                          <?php // if ($row["user_lv"] == 1) echo '<a class="btn btn-success" href="#" role="button">ADMIN</a>';
                               // else if  ($row["user_lv"] == 2)
                           
                                //    echo '<a class="btn btn-success" href="#" role="button">Giảng viên</a>';
                         ?>
                        </td>
                         <td>
                            <div class="">
                          <a href="edit.php?id=<?php echo $row["id"] ?>" class="btn btn-warning modal-trigger">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                 Edit
                         </a>
                         <a href="delete.php?id=<?php echo $row["id"] ?>" class="btn btn-danger" id="btn-submit-del" type="button" onclick="myFunction()">
                           <i class="fa fa-trash" aria-hidden="true"></i>
                               Delete
                          </a>
                                                                
                       </div>
                           </td>
                            </tr>
                       <?php $i++;
                        }
                    ?>
                        
               </table>
     
     </div>
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>  
</body>
</html>