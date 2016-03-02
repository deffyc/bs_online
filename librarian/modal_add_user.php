<div id="add_user" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-body">
    <div class="alert alert-info">
      <strong>添加管理员</strong>
    </div>
    <form class="form-horizontal" method="post">
      <div class="control-group">
        <label class="control-label" for="inputEmail">用户名</label>
        <div class="controls">
          <input type="text" id="inputEmail" name="username" placeholder="Username" required>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputPassword">密码</label>
        <div class="controls">
          <input type="password" name="password" id="inputPassword" placeholder="Password" required>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputEmail">姓</label>
        <div class="controls">
          <input type="text" id="inputEmail" name="firstname" placeholder="Username" required>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputEmail">名</label>
        <div class="controls">
          <input type="text" id="inputEmail" name="lastname" placeholder="Username" required>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <button name="submit" type="submit" class="btn btn-success">
            <i class="icon-save icon-large"></i>&nbsp;保存</button>
        </div>
      </div>
    </form>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">
      <i class="icon-remove icon-large"></i>&nbsp;退出</button>
  </div>
</div>

<?php if (isset($_POST['submit'])){ $username=$_POST['username']; $password=$_POST['password']; $firstname=$_POST['firstname']; $lastname=$_POST['lastname']; mysql_query("insert into users (username,password,firstname,lastname)
values('$username','$password','$firstname','$lastname')")or die(mysql_error()); } ?>
