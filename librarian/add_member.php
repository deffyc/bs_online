<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_member.php'); ?>
<div class="container">
  <div class="margin-top">
    <div class="row">
      <div class="span12">

        <div class="alert alert-info">添加新员</div>
        <p>
          <a href="member.php" class="btn btn-info">
            <i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>
        </p>
        <div class="addstudent">
          <div class="details">请填写详细信息</div>
          <form class="form-horizontal" method="POST" action="member_save.php" enctype="multipart/form-data">

            <div class="control-group">
              <label class="control-label" for="inputEmail">姓:</label>
              <div class="controls">
                <input type="text" id="inputEmail" name="firstname" placeholder="Firstname" required>

              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputPassword">名:</label>
              <div class="controls">
                <input type="text" id="inputPassword" name="lastname" placeholder="Lastname" required>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputPassword">性别:</label>
              <div class="controls">
                <select name="gender" required>
                  <option></option>
                  <option>男</option>
                  <option>女</option>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputPassword">详细地址:</label>
              <div class="controls">
                <input type="text" id="inputPassword" name="address" placeholder="Address" required>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputPassword">联系电话:</label>
              <div class="controls">
                <input type='tel' pattern="[0-9]{11,11}" class="search" name="contact" placeholder="Phone Number" autocomplete="off" maxlength="11">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputPassword">类型:</label>
              <div class="controls">
                <select name="type" required>

                  <option></option>
                  <option>学生</option>
                  <option>老湿</option>
                  <option></option>

                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="inputPassword">年级:</label>
              <div class="controls">
                <select name="year_level">

                  <option></option>
                  <option>大一</option>
                  <option>大二</option>
                  <option>大三</option>
                  <option>大四</option>
                  <!-- <option>Faculty</option> -->
                </select>
              </div>
            </div>

            <div class="control-group">
              <div class="controls">
                <button name="submit" type="submit" class="btn btn-success">
                  <i class="icon-save icon-large"></i>&nbsp;Save</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include('footer.php') ?>
