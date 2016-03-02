<?php
// 变量赋空
$member_username = $member_password = $member_firstname = $member_lastname = $member_gender = $member_email = $member_id = "";


if(!isset($_POST['signup'])){
    exit('Sign up Forbidden');
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{

		if 	(empty($_POST["username"]))
    		{$nameErr = "Name is required";}
    	else
			{$member_username = test_input($_POST['username']);
			//用户名长度超过 15 禁止
			if (strlen($member_username) >= 15)
				{$nameErr = "Name Forbiden";
					exit('Invaild Name Formate');}
			}

		if  (empty($_POST["password"]))
			{$passwordErr = "Password is required";}
		else
			{$member_password = test_input($_POST['password']);
			// 密码长度超过 15 禁止
			if (strlen($member_password) > 15)
				{$passwordErr = "Password Forbiden";
					exit('Invalid Password  Formate');}
			}


		if  (empty($_POST["firstname"]))
			{$firstnameErr = "firstname is required";}
		else
			{$member_firstname = test_input($_POST['firstname']);
			// 长度超过 6 禁止
			if (strlen($member_firstname) > 6)
				{$firstnameErr = "First Forbiden";
					exit('Invalid Firstname Formate');}
			}


		if  (empty($_POST["lastname"]))
			{$firstnameErr = "lastname is required";}
		else
			{$member_lastname = test_input($_POST['lastname']);
			// 长度超过 9 禁止
			if (strlen($member_lastname) > 9)
				{$lastnameErr = "Lastname Forbiden";
					exit('Invalid Lastname Formate');}
			}


		if  (empty($_POST["gender"]))
			{$genderErr = "gender is required";}
		else
			{$member_gender = test_input($_POST['gender']);
			// 仅限男女
			if ( strlen($member_gender) != 3)
				{$genderErr = "Gender Forbiden";
					exit('Invalid Gender Formate');}
			}


		if (empty($_POST["email"]))
			{$emailErr = "email is required";}
		else
			{$member_email = test_input($_POST['email']);

			$email = test_input($_POST["email"]);
   			// 正则验证 Email
    		if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
      		{
      		$emailErr = "Invalid email format";}

			}

		if (empty($_POST["id_number"]))
			{$id_numberErr = "id_number is required";}
		else
			{$member_id = test_input($_POST['id_number']);

			// 学号长度不为 8 禁止
			if (strlen($member_id) != 8)
			{$ID_Err = "Invalid ID format";
			exit('Invalid ID format');}
			}

}

  // 使用 PHP trim() 函数去除用户输入数据中不必要的字符 (如：空格，tab，换行)
  // 使用 PHP stripslashes()函数去除用户输入数据中的反斜杠 (\)
  		function test_input($data)
  	{
   		  $data = trim($data);
    		$data = stripslashes($data);
    		$data = htmlspecialchars($data);
    		return $data;
  	}
  //包含数据库文件
  include('dbcon.php');

  //检测用户名是否已经存在
  $check_query = mysql_query("SELECT username FROM member WHERE username='$member_username' limit 1");
  if(mysql_fetch_array($check_query)){
      echo '',$member_username,' 已存在。<a href="javascript:history.back(-1);">返回</a>';
      exit;
  }

  // 插入数据库
  mysql_query("insert into member(username,password,id_number,email,firstname,lastname,gender,status)
  values('$member_username','$member_password','$member_id','$member_email','$member_firstname','$member_lastname','$member_gender','Active')")
  or die(mysql_error());
  ?>

   <form action='stulogin.php' method='post' name='signup_info'>
  	<input type='hidden' name='signup_info' value='注册成功,请登录'>
   </form>

  ?>
  <!-- 提交后跳转至登录 -->
   <script language="JavaScript">
  document.signup_info.submit();
  </script>
