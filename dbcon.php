<!-- DB 连接文件,使用时请填充连接参数 -->
<?php
mysql_select_db('eb_lms',mysql_connect('****','****','****'))or die(mysql_error());
// 设置字符集为 utf8
mysql_query("SET NAMES 'utf8'");
?>
