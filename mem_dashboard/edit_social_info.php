<?php
/**
 * Created by PhpStorm.
 * User: zh
 * Date: 15-10-22
 * Time: 下午10:15
 * 添加个人社会信息
 */
include_once('checksession.php');
require_once('./bin/output.php');
require_once('./bin/output.php');


$sql = new Mysql();

$name = $_SESSION['mem_id'];
$row = $sql->getLine("select * from social_info JOIN member ON member.member_id=social_info.member_id where member.username='$name'");
if(!$row)
{
    $ret = $sql->run("INSERT INTO social_info(member_id) SELECT member_id FROM member WHERE username='$name'");
    $row = $sql->getLine("select * from social_info JOIN member ON member.member_id=social_info.member_id where member.username='$name'");
}






output_header();
output_top_bar("edit_social_info");



?>

<div style="margin-bottom:220px;">
 <!--表单的开始-->
     <h3 class="alert alert-info" style="display:block; text-align:center; margin-top:50px;">社交信息</h3>

    <form class="form-horizontal" method="POST" action="action/update_social_info.php"
          enctype="multipart/form-data">

        <div class="form-group">
          <label class="col-sm-5 control-label">个人站点:</label>
          <div class="col-sm-3">
            <input class="form-control" type="url" id="my_url" name="website"
                   value="<?php echo $row['website']; ?>" placeholder="blog http://url">
          </div>
        </div>
        <div class="form-group">
            <label class="col-sm-5 control-label">微信:</label>
            <div class="col-sm-3">
                <input class="form-control"  name="wechat"
                       value="<?php echo $row['wechat']; ?>" placeholder="wechat" >
                <input id="member_id" name="member_id" type="hidden"
                       value="<?php echo $row['member_id']; ?>" placeholder="wechat"  >
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-5 control-label">QQ:</label>
            <div class="col-sm-3">
                <input class="form-control"  name="qq"
                       value="<?php echo $row['qq']; ?>" placeholder="qq" >
            </div>
        </div>


        <div class="form-group">
          <label class="col-sm-5 control-label">github:</label>
          <div class="col-sm-3">
            <input class="form-control" type="url" name="github"
                   value="<?php echo $row['github']; ?>" placeholder="github http://url">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-5 control-label">dribbble:</label>
          <div class="col-sm-3">
            <input class="form-control" type="url" name="dribbble"
                   value="<?php echo $row['dribbble']; ?>" placeholder="dribbble http://url" >
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-5 control-label">领英:</label>
          <div class="col-sm-3">
            <input class="form-control" type="url" name="linkedin"
                   value="<?php echo $row['linkedin']; ?>" placeholder="linkedin http://url">
          </div>
        </div>
          <div class="form-group">
          <label class="col-sm-5 control-label">微博:</label>
          <div class="col-sm-3">
            <input class="form-control" type="url" name="weibo"
                   value="<?php echo $row['weibo']; ?>" placeholder="weibo http://url">
          </div>
        </div>

         <div class="form-group">
          <label class="col-sm-5 control-label">推特:</label>
          <div class="col-sm-3">
            <input class="form-control" type="url" name="twitter"
                   value="<?php echo $row['twitter']; ?>" placeholder="twitter http://url">
          </div>
        </div>

         <div class="form-group">
          <label class="col-sm-5 control-label">instagram:</label>
          <div class="col-sm-3">
            <input class="form-control" type="url" name="instagram"
                   value="<?php echo $row['instagram']; ?>" placeholder="instagram http://url" >
          </div>
        </div>

       <div class="form-group">
          <label class="col-sm-5 control-label">facebook:</label>
          <div class="col-sm-3">
            <input class="form-control" type="url" name="facebook"
                   value="<?php echo $row['facebook']; ?>" placeholder="facebook http://url" >
          </div>
        </div>

        <div class="form-group">
        <div class="col-sm-offset-7 col-sm-3">
          <button type="submit" class="btn btn-info">Update</button>
        </div>
      </div>

    </form>

    <!--表单的结束-->
  </div>

<?php
output_footer();


?>


