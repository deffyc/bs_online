<?php
/**
 * Created by PhpStorm.
 * User: zh
 * Date: 15-10-24
 * Time: 下午2:59
 * 密码确认
 */
include_once('../checksession.php');
include_once('../bin/Mysql.php');

$sql = new Mysql();
$name = $_SESSION['mem_id'];

$old_password = trim($_POST['old_password']);
$new_password = trim($_POST['new_password']);
$re_new_password =trim( $_POST['re_new_password']);
if( strlen($new_password) < 6 OR   strlen($new_password) > 12   )
{
    $notice = "在 6 ~ 12 之间 ";
    require_once("notice.php");
    exit;
}

if($new_password!=$re_new_password)
{
    $notice = "两次密码不相同,请重新操作";
    require_once("notice.php");
    exit;

}

$row = $sql->getLine("SELECT * FROM member WHERE username = '$name' ");

if($row['password']==$old_password)
{
    $ret = $sql->run("UPDATE member set password='$new_password' WHERE username = '$name'");

    session_destroy();
    $notice = "修改密码成功,请重新登陆";
}else{
    $notice = "密码确认失败,请重新输入";
}
require_once("notice.php");
?>




