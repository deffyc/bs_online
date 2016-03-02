<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_dashboard.php'); ?>
<?php $get_id = $_GET['id']; ?>
<div class="container">
  <div class="margin-top">
    <div class="row">
      <div class="span12">
        <?php
		$query=mysql_query("select * from member where member_id='$get_id'")or die(mysql_error());
		$row=mysql_fetch_array($query);

		?>
        <div class="alert alert-info">
          <i class="icon-pencil"></i>&nbsp;编辑成员信息</div>
        <p>
          <a class="btn btn-info" href="member.php">
            <i class="icon-arrow-left icon-large"></i>&nbsp;返回</a>
        </p>
        <div class="addstudent">
          <div class="details">请输入详细信息</div>
          <form class="form-horizontal" method="POST" action="update_member.php" enctype="multipart/form-data">

            <div class="control-group">
              <label class="control-label" for="inputEmail">姓:</label>
              <div class="controls">
                <input type="text" id="inputEmail" name="firstname" value="<?php echo $row['firstname']; ?>" placeholder="姓" required>
                <input type="hidden" id="inputEmail" name="id" value="<?php echo $get_id;  ?>" placeholder="姓" required>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputPassword">名:</label>
              <div class="controls">
                <input type="text" id="inputPassword" name="lastname" value="<?php echo $row['lastname']; ?>" placeholder="名" required>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputPassword">性别:</label>
              <div class="controls">
                <input type="text" id="inputPassword" name="gender" value="<?php echo $row['gender']; ?>" placeholder="Gender" required>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputPassword">详细地址:</label>
              <div class="controls">
                <input type="text" id="inputPassword" name="address" value="<?php echo $row['address']; ?>" placeholder="Address" required>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputPassword">联系方式:</label>
              <div class="controls">
                <input type='tel' pattern="[0-9]{11,11}" class="search" name="contact" placeholder="Phone Number" autocomplete="off" maxlength="11">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputPassword">类型:</label>
              <div class="controls">
                <select name="type" required>

                  <option><?php echo $row['type']; ?></option>
                  <option>成员</option>
                  <option>教师</option>

                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="inputPassword">年级:</label>
              <div class="controls">
                <select name="year_level" required>
                  <option><?php echo $row['year_level']; ?></option>
                  <option>大一</option>
                  <option>大二</option>
                  <option>大三</option>
                  <option>大四</option>
                  <!-- <option>Faculty</option> -->
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="inputPassword">Status:</label>
              <div class="controls">
                <select name="status" required>
                  <option><?php  echo $row['status']; ?></option>
                  <option>Active</option>
                  <option>Banned</option>
                </select>
              </div>
            </div>

            <div class="control-group">
              <div class="controls">
                <button name="submit" type="submit" class="btn btn-success">
                  <i class="icon-save icon-large"></i>&nbsp;Update</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include('footer.php') ?>
