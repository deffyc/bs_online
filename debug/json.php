<?php include'dbcon.php';?>

<?php
$sql = "SELECT * from book_sum";
$query = mysql_query($sql);;
while($row=mysql_fetch_array($query)){ 
	$arr[] = $row['data'];  
	//将其他值 插入 null 变成新数组;
	$json_insert=array_pad($arr,30,null);
		
} 

// 经过整合后的新数据转化成json
$json=json_encode($json_insert);

// echo $json;
echo "booksum($json)";

// echo '<br>';
?>

































<?php include 'dbclose.php' ?>