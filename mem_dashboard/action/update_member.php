<?php
/*
 * 提交 用户信息
 * 初始化 用户 头像信息
 * 格式:
 * http://7xjlp0.com1.z0.glb.clouddn.com/年级_名字拼音
 */

include_once('../checksession.php');
require_once('../bin/Mysql.php');

require '../vendor/autoload.php';
use Overtrue\Pinyin\Pinyin;
Pinyin::set('delimiter','');
Pinyin::set('accent',false); // 设置 中文转拼音 类库, 无分隔，无音调

$sql = new Mysql();
if (isset($_POST['id'])){

    $id=$_POST['id'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $gender=$_POST['gender'];
    if($gender=='male')
    {
        $gender = '男';
    }else{
        $gender = '女';
    }
    $address=$_POST['address'];
    $contact=$_POST['contact'];
    $type=$_POST['type'];
    $year_level=$_POST['year_level'];

    $job_title = $_POST['job_title'];
    $self_intro = $_POST['self_intro'];



    $row = $sql->getLine("SELECT * FROM member WHERE member_id ='$id'");
    $student_id = $row['id_number'];
    $name_pinyin = Pinyin::trans($firstname.$lastname); // 获取拼音
    $year = substr($student_id, 2, 2); // 获取年级
   
    $url = "http://7xjlp0.com1.z0.glb.clouddn.com/".$year.'_'.$name_pinyin.".jpg";

    if($lastname=='煜堃')
    {
        $url = "http://7xjlp0.com1.z0.glb.clouddn.com/".$year.'_'.'zhangyukun'.".jpg";
    } // 堃字无法转换，特殊处理一下

    $sql->run("update member set firstname='$firstname',lastname='$lastname',gender='$gender',address = '$address',contact = '$contact',type = '$type',year_level = '$year_level',job_title='$job_title',self_intro='$self_intro'
 ,portrait='$url'   where member_id='$id'");

    header('location:../dashboard.php');
}
?>
