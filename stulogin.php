<!-- 安全须知 -->
<!-- $_SERVER["PHP_SELF"] 是一种超全局变量，它返回当前执行脚本的文件名。 -->
<!-- $_SERVER["PHP_SELF"] 将表单数据发送到页面本身，而不是跳转到另一张页面。这样，用户就能够在表单页面获得错误提示信息。 -->
<!-- htmlspecialchars() 函数把特殊字符转换为 HTML 实体。这意味着 < 和 > 之类的 HTML 字符会被替换为 &lt; 和 &gt; 。 -->
<!-- 这样可防止攻击者通过在表单中注入 HTML 或 JavaScript 代码（XSS）对代码进行利用。				 -->

<?php include ('header.php');?>
<!-- 接受来自signup.php 的post查询结果 -->
<?php
		$signup_info=$_POST['signup_info'];
 ?>
<div class="container">

  <form class="form-signin" method="POST">
    <h2 class="form-signin-heading">成员登录</h2>
    <label for="inputEmail" class="sr-only">用户名</label>
    <input type="text" name="student_no" id="inputEmail" class="form-control" placeholder="Username" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <div class="checkbox">
      <label>
        <input type="checkbox" value="remember-me">记住我
      </label>
    </div>

    <button type="button" name="signup" class="btn btn-primary btn-block" data-toggle="modal" data-target=".bs-example-modal-lg">注册</button>
    <button name="submit" class="btn btn-success btn-block" type="submit">登入</button>
    <?php
        if (isset($_POST['signup_info'])) {
				?>
    <div class="alert alert-warning"><?php echo $signup_info; ?></div>
    <?php
        }
        ?>

    <!-- 成员登录验证 -->
  	<?php
									//连接数据库
									include 'dbcon.php';
									// post submit请求
									if (isset($_POST['submit'])) {
									// 启动 session
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
									} else {
										// 否则提示
											?>
    							<div class="alert alert-warning">看起来不妙啊喂! 检查一下用户名和密码呗</div>
    						<?php
									}
?>

  </form>
  <!-- 登录表单结束	      -->
  <!-- 注册模态框开始 -->
  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="gridSystemModalLabel">请成员填写并核实如下信息</h4>
        </div>
        <!-- 注册表单 -->
        <form class="form-signin" method="POST" action="signup.php">
          <div class="form-group">
            <label for="Inputusername">用户名</label>
            <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
          </div>

          <div class="form-group">
            <label for="Password">密码</label>
            <input type="password" name="password" class="form-control" placeholder="Password" required autofocus>
          </div>

          <div class="form-group">
            <label for="name">姓名</label>
            <input name="firstname" class="form-control" placeholder="姓" required autofocus>
            <input name="lastname" class="form-control" placeholder="名" required autofocus>
          </div>

          <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
          </div>

          <div class="form-group">
            <label for="gender">性别</label>
            <select name="gender" class="form-control">
              <option>男</option>
              <option>女</option>
            </select>
          </div>

          <div class="form-group">
            <label for="id_number">学号</label>
            <input name="id_number" class="form-control" placeholder="8 位学号" required autofocus>
          </div>
          <!-- <p class="text-center bg-danger">注册已经关闭</p> -->
          <!-- <button type="submit" class="btn btn-info btn-block" disabled="disabled">确认</button> -->
          <button type="submit" name="signup" class="btn btn-info btn-block">确认</button>
        </form>
  			<!-- 注册表单结束 -->

      </div>
    </div>
  </div>
<!-- 注册模态框结束 -->
</div>
<!-- /container -->
