
<?php
session_start();
// Xóa đi một biến Session
if (isset($_SESSION['user']))
{
    unset($_SESSION['user']);
    
    header('location:index1.php') ;
}
//Xóa toàn bộ Session
session_destroy();
?>

