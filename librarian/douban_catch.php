<?php

									// 针对 Xampp 上 php提示 true 未定义变量
									// error_reporting(0)
									$book_isbn=$_POST['input_isbn'];
									// 静态测试
									// $book_isbn = "9787111305958";
									// echo $row['isbn'];
									// echo '<br>';
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
									// 出版日期
									$pubdate = $data['pubdate'];
									// 出版社
									$publisher = $data['publisher'];
									// ISBN
									$isbn13 = $data['isbn13'];

									?>

 <form action='add_books.php' method='post' name='frm'>

 		<input type='hidden' name='douban_book_title' value='<?php  echo $title ?>'>
 		<input type='hidden' name='douban_author' value='<?php echo $author ?>'>
  	<input type='hidden' name='douban_publisher' value='<?php echo $publisher ?>'>
  	<input type='hidden' name='douban_isbn' value='<?php echo $isbn13 ?>'>
  	<input type='hidden' name='douban_copyright_year' value='<?php echo $pubdate ?>'>
 </form>

?>
 <script language="JavaScript">
document.frm.submit();
</script>
