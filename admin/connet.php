<?php
    $conn = new mysqli('localhost','root','','trangweb') or die('Kết nối thất bại!'.mysqli_connect_error());
	mysqli_query($conn, 'SET NAMES UTF8');
?>