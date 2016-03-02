<?php
/**
 * Created by PhpStorm.
 * User: zh
 * Date: 15-10-25
 * Time: 上午4:45
 * 显示图书馆所有书籍
 *
 * 未完成 : 未分页
 * 讨论 Archiev 的状态
 */

include_once('checksession.php');
require_once('bin/output.php');
require_once('bin/Mysql.php');
output_header();
output_top_bar("view_books");
$sql = new Mysql();
$date = $sql->getDate("SELECT * FROM book JOIN category ON book.category_id=category.category_id WHERE book_copies!=0"); // 查找数据库中图书库存不为 0 的书籍信息
?>

	<div class="container">
		<div class="margin-top">
			<div class="row">
				<div class="span12">
					<div class="panel-heading"></div>
					<div class="panel-heading"></div>
					<div class="panel-heading"></div>
					<div class="pull-right">
						<a href="" onclick="window.print()" class="btn btn-success"> Print</a>
					</div>
					<div class="panel panel-success">
						<!-- Default panel contents -->

						<div class="panel-heading">所有图书</div>
						<table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">


							<thead>
							<tr>
								<th>No</th>
								<th>图书名称</th>
								<th>分类</th>
								<th>作者</th>
								<th class="action">库存</th>
								<th class="action">可借</th>
								<th>出版社</th>
								<th>ISBN</th>
								<th>出版年</th>
								<th>添加时间</th>
								<th>状态</th>

							</tr>
							</thead>
							<tbody>
							<?php
							foreach ($date as $row){
								$book_id = $row['book_id'];
								$count = $sql->getValue("SELECT COUNT(*) FROM book_info WHERE book_id=$book_id AND status=0");

								?>
								<tr class="del<?php echo $row['book_id'] ?>">
									<td><?php echo $row['book_id']; ?></td>
									<td><?php echo $row['book_title']; ?></td>
									<td><?php echo $row['classname']; ?> </td>
									<td><?php echo $row['author']; ?> </td>
									<td class="action"><?php echo /* $row['book_copies']; */
										$row['book_copies']; ?> </td>
									<td class="action"><?php echo $count;    //;   ?> </td>
									<td><?php echo $row['publisher_name']; ?></td>
									<td><?php echo $row['isbn']; ?></td>
									<td><?php echo $row['copyright_year']; ?></td>
									<td><?php echo $row['date_added']; ?></td>
									<td><?php echo $row['status']; ?></td>
								</tr>
								<?php


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
// 分页后添加
//output_footer();
?>