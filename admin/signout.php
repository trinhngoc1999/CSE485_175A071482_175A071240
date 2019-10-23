<?php function location($url)
                        { ?>
                            <script type="text/javascript">
                            window.location = "<?=$url?>";
                            </script>
        <?php } ?>
<?php
    $conn = new mysqli('localhost','root','','trangweb') or die('Kết nối thất bại!'.mysqli_connect_error());
    mysqli_query($conn, 'SET NAMES UTF8');
    // hàm hủy session
    session_destroy();
    location("index.php");
?>
