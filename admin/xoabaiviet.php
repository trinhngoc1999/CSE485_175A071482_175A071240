<?php
session_start();
 $conn = new mysqli('localhost','root','','trangweb') or die('Kết nối thất bại!'.mysqli_connect_error());
 mysqli_query($conn, 'SET NAMES UTF8');
  // gọi hàm session
$id = $_GET["id"];
  $query = "DELETE FROM posts WHERE id=$id";
  mysqli_query($conn, $query) ;
  header("Location: chinhbaiviet.php");
?>