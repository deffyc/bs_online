<?php
// You said that you starts session with a check:
// The fact is the $_SESSION always exists and if you aren't put
// something in it then it will be always empty,
// so the statment will return always true.
// --stackoverflow

//Start session
session_start();

// 测试代码 $_SESSION['mem_id']="cuilei";
// 检查session_member ID 是否存在
if (!isset($_SESSION['mem_id']) || (trim($_SESSION['mem_id']) == '')) {
    header("location: ../stulogin.php");
    exit();
}
