<?php
/**
 * Created by PhpStorm.
 * User: zh
 * Date: 15-10-25
 * Time: 上午12:12
 */
require_once('Mysql.php');

function get_name_by_session()
{
    $sql = new Mysql();
    $username = $_SESSION['mem_id'];
    $query = "SELECT * FROM member WHERE username='$username' ";
    // 查绚结果储存在 $result 变量中
    $row = $sql->getLine($query);


// 打印 firstname 行和 lastname 行数据
    $real_name = $row['firstname'] . " " . $row['lastname'] . '<br>';
    echo $real_name;

}

