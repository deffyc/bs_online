<?php
/**
 * Created by PhpStorm.
 * User: zh
 * Date: 15-10-24
 * Time: 上午1:48
 * 修改文件，最后的返回对象未定

 */

include_once('../checksession.php');
require_once('../bin/Mysql.php');
if( isset($_POST['competition']) AND isset($_POST['description']))
{
    $sql = new Mysql();
    $username = $_POST['id'];
    $competition = $_POST['competition'];
    $description = $_POST['description'];

    $query = "UPDATE achievement set competition='$competition',description='$description' WHERE id='$id'";

    $ret = $sql->run($query);




    header('location:../dashboard.php');

}else{
    header('location:../dashboard.php');
}
