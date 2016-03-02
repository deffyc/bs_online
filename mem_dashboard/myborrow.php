<?php
/**
 * Created by PhpStorm.
 * User: zh
 * Date: 15-10-25
 * Time: 下午5:16
 * 显示我的借阅关系,我借的图书,借我图书
 * 可能的话提供一个提醒机制
 * 借我的图书未完成
 * 和之前的历史记录
 */
// 展示自己的书籍,自己借出的书,和自己借入的书
include_once('checksession.php');
require_once('./bin/Mysql.php');
require_once('./bin/output.php');
//$_SESSION['mem_id']='leozhang';
$username = $_SESSION['mem_id'];
$sql = new Mysql();

output_header();
output_top_bar("myborrow");
?>

<?php

//$borrowing_book = $sql->getDate("SELECT  book.book_title AS title , member.firstname AS firstname,member.lastname AS lastname , member.id_number AS id_number
// , borrow.date_borrow AS date_borrow , borrow.due_date AS due_date
//    FROM  borrowdetails JOIN borrow ON borrowdetails.borrow_id = borrow.borrow_id
//   JOIN book_entity ON borrowdetails.book_entity_id = book_entity.id
// JOIN member ON book_entity.member_id=member.member_id
// JOIN book ON borrowdetails.book_id=book.book_id
//  WHERE borrow.member_id IN ( SELECT member_id  FROM member WHERE member.username='$username')
//    AND  borrow_status='pending'   ");
$borrowed_book = $sql->getDate("SELECT borrower_name, book_entity.id AS id ,member.firstname AS firstname, member.lastname AS lastname ,book.book_title AS title,borrow.due_date AS due_date,borrow.date_borrow AS date_borrow
                        FROM borrowdetails  JOIN book_entity
                         ON (borrowdetails.book_entity_id=book_entity.id AND  borrowdetails.borrow_status='pending')
                                       JOIN member ON (book_entity.member_id =member.member_id
                                       AND member.member_id IN (SELECT member_id FROM member WHERE username = '$username'))
                                       JOIN book ON (borrowdetails.book_id=book.book_id)
                                       JOIN borrow ON (borrowdetails.borrow_id=borrow.borrow_id)"); // 我届出的图书

//
//书的实体 信息
//书的拥有者的信息
// 判断 借书者是否为 本人
// 判断 该书的 状态

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
                    <div class="panel-heading">你借出的图书</div>

                    <!-- Table -->
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-hover" id="example">
                        <thead>
                        <tr>
                            <th>图书名</th>
                            <th>借阅人</th>
                            <!--                            <th>学号</th>-->
                            <th>借书时间</th>
                            <th>截止时间</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        if ($borrowed_book) {
                            foreach ($borrowed_book as $row_result) {
                                ?>

                                <tr>


                                    <td><?php echo $row_result['title'] ?></td>
                                    <td><?php echo $row_result['borrower_name'] ?></td>
                                    <!--                                    <td>-->
                                    <?php //echo $row_result['id_number'] ?><!--</td>-->
                                    <td><?php echo $row_result['date_borrow'] ?></td>
                                    <td><?php echo $row_result['due_date'] ?></td>


                                </tr>


                                <!-- while 循环结束 -->
                            <?php }
                        }
                        ?>


                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>

<?php


// 借阅的图书
//$borrowed_book = $sql->getDate("SELECT book_entity.id AS id ,member.id_number AS id_number,member.firstname AS firstname, member.lastname AS lastname ,book.book_title AS title,borrow.due_date AS due_date
//                        FROM borrowdetails  JOIN book_entity
//                         ON (borrowdetails.book_entity_id=book_entity.id AND  borrowdetails.borrow_status='pending')
//                                       JOIN member ON (book_entity.member_id =member.member_id
//                                       AND member.member_id IN (SELECT member_id FROM member WHERE username = '$username'))
//                                       JOIN book ON (borrowdetails.book_id=book.book_id)
//                                       JOIN borrow ON (borrowdetails.borrow_id=borrow.borrow_id)");
$borrowing_book = $sql->getDate("SELECT  book.book_title AS title , book_entity.id AS book_id ,member.firstname AS firstname,member.lastname AS lastname , member.id_number AS id_number , borrow.date_borrow AS date_borrow , borrow.due_date AS due_date
    FROM  borrowdetails JOIN borrow ON borrowdetails.borrow_id = borrow.borrow_id
   JOIN book_entity ON borrowdetails.book_entity_id = book_entity.id
 JOIN member ON book_entity.member_id=member.member_id
 JOIN book ON borrowdetails.book_id=book.book_id
  WHERE borrow.member_id IN ( SELECT member_id  FROM member WHERE member.username='$username')
    AND  borrow_status='pending' "); // 我借阅的图书
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
                    <div class="panel-heading">你借入的图书</div>

                    <!-- Table -->
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-hover" id="example">
                        <thead>
                        <tr>
                            <th>图书名</th>
                            <th>书籍拥有人</th>
                            <th>学号</th>
                            <th>借书时间</th>
                            <th>截止时间</th>
                            <th>是否超期</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        if ($borrowing_book) {
                            foreach ($borrowing_book as $row_result) {
                                ?>

                                <tr>


                                    <td><?php echo $row_result['title'] ?></td>
                                    <td><?php echo $row_result['firstname'] . " " . $row_result['lastname'] ?></td>
                                    <td><?php echo $row_result['id_number'] ?></td>
                                    <td><?php echo $row_result['date_borrow'] ?></td>
                                    <td><?php echo $row_result['due_date'] ?></td>


                                </tr>


                                <!-- while 循环结束 -->
                            <?php }
                        }
                        ?>


                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>



