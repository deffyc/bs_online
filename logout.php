<?php
// 登出文件
session_start();
session_destroy();
header('location:index.php');

?>
