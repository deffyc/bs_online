<?php include 'dbcon.php';?>



<?php 
$user_query=mysql_query("select isbn from book where status != 'Archive'")or die(mysql_error());
									while($row=mysql_fetch_array($user_query)){
									 // $book_isbn=$row['isbn']; 

									echo $row['isbn'];

								}

?>