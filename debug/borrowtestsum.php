<!-- 图书总量后台统计 -->
<?php include'dbcon.php';?>
<?php
$amount_of_book_sql = "SELECT book_id from book where status !='Archive'";
$amount_of_book_query = mysql_query($amount_of_book_sql);
$amount_of_book = mysql_num_rows($amount_of_book_query);
echo $amount_of_book;
?>