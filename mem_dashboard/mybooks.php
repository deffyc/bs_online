<?php
/**
 * Created by PhpStorm.
 * User: zh
 * Date: 15-10-25
 * Time: 上午5:16
 */

// 展示自己的书籍,自己借出的书,和自己借入的书
include_once('checksession.php');
require_once('./bin/Mysql.php');
require_once('./bin/output.php');
//$_SESSION['mem_id']='leozhang';
$username = $_SESSION['mem_id'];
$sql = new Mysql();

output_header();
output_top_bar("mybooks");
$my_own_book = $sql->getDate("SELECT book_info.book_title AS book_title ,book_info.status AS book_status, publisher_name,copyright_year,author,book_info.isbn FROM book_info JOIN book ON book_info.book_id=book.book_id WHERE member_id IN ( SELECT member_id  FROM member WHERE username='$username')");
?>



<div class="container">
    <div class="margin-top">
        <div class="row">
            <div class="span12">
                <div class="panel-heading"></div>
                <div class="panel-heading"></div>
                <div class="panel-heading"></div>
                <div class="panel panel-warning">
                    <!-- Default panel contents -->
                    <div class="panel-heading">拥有图书查看</div>

                    <!-- Table -->
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-hover" id="example">
                        <thead>
                        <tr>
                            <th>图书名</th>
                            <th>作者</th>
                            <th>出版社</th>
                            <th>出版日期</th>
                            <th>Isbn</th>
                            <th>借阅状态</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($my_own_book) {
                            foreach ($my_own_book as $row) {
                                ?>
                                <tr>
                                    <td><?php echo $row['book_title'] ?></td>
                                    <td><?php echo $row['author'] ?></td>
                                    <td><?php echo $row['publisher_name'] ?></td>
                                    <td><?php echo $row['copyright_year'] ?></td>
                                    <td><?php echo $row['isbn'] ?></td>
                                    <td><?php if ($row['status'] == 0) echo "可借"; else echo "不可借"; ?></td>
                                </tr>
                                <?php
                            }
                        }

                        ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>





