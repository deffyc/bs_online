<?php
/**
 * Created by PhpStorm.
 * User: zh
 * Date: 15-10-23
 * Time: 下午11:00
 */

include_once('../checksession.php');
require_once('../bin/Mysql.php');
if( isset($_POST['competition']) AND isset($_POST['description']))
{
    $sql = new Mysql();
    $username = $_SESSION['mem_id'];
    $competition = $_POST['competition'];
    $description = $_POST['description'];

    $query = " INSERT INTO achievement ( competition,description,member_id) SELECT  '$competition' as competition,'$description' as description,member_id FROM member WHERE username='$username'";

    $sql->run($query);

    header('location:../dashboard.php');

}else{
    header('location:../dashboard.php');
}

