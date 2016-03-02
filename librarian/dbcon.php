<?php

mysql_select_db('eb_lms',mysql_connect('localhost','demo','123456'))or die(mysql_error());
mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER_SET_CLIENT=utf8");
mysql_query("SET CHARACTER_SET_RESULTS=utf8");
?>
