<?php
/**
 * Created by PhpStorm.
 * User: zh
 * Date: 15-10-23
 * Time: 下午8:06
 * // 获取提交的信息，并且检验 url 可访问否
 */

include_once('../checksession.php');
require_once('../bin/Mysql.php');
$sql = new Mysql();
$member_id = $_POST['member_id'];
$website =$_POST['website'];
$facebook =$_POST['facebook'];
$github =$_POST['github'];
$dribbble =$_POST['dribbble'];
$linkedin =$_POST['linkedin'];
$weibo =$_POST['weibo'];
$twitter  =$_POST['twitter'];
$instagram =$_POST['instagram'];
$wechat =$_POST['wechat'];
$qq = $_POST['qq'];

$row = $sql->getLine("SELECT * FROM social_info WHERE member_id='$member_id'");
if(!$row)
{
    $sql->run("INSERT INTO social_info (member_id) VALUES ('$member_id')"); // 建立一条数据
}

$sql->run("UPDATE `social_info` SET `website`='$website', `github`='$github', `dribbble`='$dribbble', `linkedin`='$linkedin', `weibo`='$weibo'
,`twitter`='$twitter', `instagram`='$instagram', `facebook`='$facebook', `wechat`='$wechat' ,qq='$qq' WHERE member_id='$member_id'");


header('location:../dashboard.php');


