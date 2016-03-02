<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_user.php'); ?>
<div class="container">
  <div class="margin-top">
    <div class="row">
      <div class="span2">
        <ul class="nav nav-tabs nav-stacked">
          <li>
            <a href="#add_user" data-toggle="modal">
              <i class="icon-plus icon-large"></i>&nbsp;<strong>添加管理员</strong>
            </a>
          </li>
        </ul>

        <!-- Modal add user -->
        <?php include('modal_add_user.php'); ?>

      </div>
      <div class="span10">

        <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
          <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>
              <i class="icon-user icon-large"></i>&nbsp;管理员列表</strong>
          </div>
          <thead>
            <tr>
              <th>用户名</th>
              <th>密码</th>
              <th>Firstname</th>
              <th>Lastname</th>
              <th>管理</th>
            </tr>
          </thead>
          <tbody>

            <?php $user_query=mysql_query("select * from users")or die(mysql_error());
									while($row=mysql_fetch_array($user_query)){
									$id=$row['user_id']; ?>
            <tr class="del<?php echo $id ?>">
              <td><?php echo $row['username']; ?></td>
              <td><?php echo $row['password']; ?></td>
              <td><?php echo $row['firstname']; ?></td>
              <td><?php echo $row['lastname']; ?></td>
              <td width="100">
                <a rel="tooltip" title="Delete" id="<?php echo $id; ?>" href="#delete_user<?php echo $id; ?>" data-toggle="modal" class="btn btn-danger">
                  <i class="icon-trash icon-large"></i>
                </a>
                <?php include('delete_user_modal.php'); ?>
                <a rel="tooltip" title="Edit" id="e<?php echo $id; ?>" href="#edit<?php echo $id; ?>" data-toggle="modal" class="btn btn-success">
                  <i class="icon-pencil icon-large"></i>
                </a>
                <?php include('modal_edit_user.php'); ?>
              </td>
              <?php include('toolttip_edit_delete.php'); ?>
              <!-- Modal edit user -->

            </tr>
            <?php } ?>

          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>
<?php include('footer.php') ?>
