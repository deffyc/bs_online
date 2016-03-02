<!-- 成员登录验证 文件 -->
<?php
		// 连接数据库
		include 'dbcon.php';
		// post submit请求
		if (isset($_POST['submit']))
		{
		//启动 session
		session_start();
		// post student 账号密码
		$student_no = $_POST['student_no'];
		$password = $_POST['password'];
		$query = "SELECT * FROM member WHERE username='$student_no' AND password='$password' AND status = 'Active'";
		$result = mysql_query($query) or die(mysql_error());
		$num_row = mysql_num_rows($result);
		$row = mysql_fetch_array($result);

		// 成功则重定向至 mem_dashboard
		if ($num_row > 0) {
		header('location:mem_dashboard/dashboard.php');
		// 根据 $row['student_no'] 生成 session id 转储至$_SESSION['mem_id']
		// 测试,将 student_no 存入 session
		$_SESSION['mem_id'] = $student_no;
		// $_SESSION['mem_id'] = $row['username'];
		}
		else
		 {
		// 否则提示
				?>
		<div class="alert alert-warning">看起来不妙啊喂! 检查一下用户名和密码呗</div>
			<?php
		}
	}
												?>
