<?php include 'header.php';?>
<?php include 'dbcon.php' ;?>
<?php include 'nav_viewallbooks.php';?>
<?php

//查询图书信息
$book_title = $_POST['book_name'];?>
<div class="container">

		<div class="row">

<?php
$user_query=mysql_query("select isbn from book where status != 'Archive'and book_title LIKE  '%$book_title%'")or die(mysql_error());
									while($row=mysql_fetch_array($user_query)){

									//针对 Xampp 上 php提示 true 未定义变量
									error_reporting(0);
									$book_isbn=$row['isbn'];
									// 静态测试
									//调用豆瓣 api 开始
									$apikey = "06c70ebcddf6849b14552c3699e38dd1";
									// 待解码的 JSON 字符串，必须是 UTF-8 编码数据
									$json = file_get_contents("https://api.douban.com/v2/book/isbn/:$book_isbn?apikey=$apikey");
									// true返回对象类型
									$data = json_decode($json,ture);
									// 图书标题
									$title = $data['title'];
									// 图书副标题
									$subtitle = $data['subtitle'];
									// 作者信息
									$author = $data['author'][0];
									// 封面
									$images_small = $data['images']['small'];
									$images_medium = $data['images']['medium'];
									$images_large = $data['images']['large'];
									// 出版日期
									$pubdate = $data['pubdate'];
									// 出版社
									$publisher = $data['publisher'];
									// ISBN
									$isbn13 = $data['isbn13'];
									// author_intro
									$author_intro = $data['author_intro'];
									// summary
									$summary = $data['summary'];
									// 豆瓣直达
									$alt = $data['alt'];
									?>

     							<!-- HTML here -->
									<!-- 预留 container -->
							<div class="col-xs-6 col-lg-3">
									<div class="thumbnail" style="width:280px;height:230px;">
					      				<img src="<?php echo $images_medium;?>" alt="<?php echo $title." ".$subtitle;?> "class="img-responsive">
					      					<div class="caption text-center" style="position:absolute; bottom:20px; left:30px">
					       					 <p class="text-center"><?php echo $title ?></p>
					        					<a href="#" class="btn btn-primary" role="button">成员借阅</a>
					        					<a target=_blank href="<?php echo $alt;?>" class="btn btn-success" role="button">豆瓣直达</a>
					        					<a id="temp1" tabindex="0" class="btn btn-info" role="button" data-toggle="popover"  title="<?php echo $title;?>">详情</a>
							  						<!-- <a target=_blank href="book_info.php" class="btn btn-info" role="button">详情</a> -->
							  						<!-- <?php echo $summary; ?> -->
					      					</div>

					      			</div>
							</div>

<!-- end of while -->
<?php } ?>

<!-- end of row -->
			</div>
<!-- end of col-xs-12 col-sm-9 -->
		<!-- </div> -->
<!-- end of container -->
</div>
