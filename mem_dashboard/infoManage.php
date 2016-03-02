<?php
/**
 * Created by PhpStorm.
 * User: zh
 * Date: 15-10-22
 * Time: 下午10:15
 * 修改个人信息
 */
include_once('checksession.php');
require_once('bin/Mysql.php');
require_once('bin/output.php');


$sql = new Mysql();
$name = $_SESSION['mem_id'];

$row   = $sql->getLine("select * from member where username='$name'");

output_header();
output_top_bar("infoManage");

?>
<div style="margin-bottom:220px;">
    <!--表单的开始-->

    <h3 class="alert alert-info" style="display:block; text-align:center; margin-top:50px;">基本信息</h3>

    <form class="form-horizontal " method="POST" action="action/update_member.php"
          enctype="multipart/form-data">

        <div class="form-group">
            <label class="col-sm-5 control-label">姓:</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="firstname" name="firstname"
                       value="<?php echo $row['firstname']; ?>" placeholder="firstname" required>
                <input type="hidden" id="id" name="id" value="<?php echo $row['member_id']; ?>"
                       required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-5 control-label">名:</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="lastname" name="lastname"
                       value="<?php echo $row['lastname']; ?>" placeholder="lastname" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-5 control-label">性别:</label>
            <div class="col-sm-3">
                <label class="radio-inline">
                    <input type="radio" name="gender" id="male" value="male"
                        <?php if($row['gender']=='男') echo " checked=\"checked\""?>
                        > 男
                </label>
                <label class="radio-inline">
                    <input type="radio" name="gender" id="female" value="female"
                        <?php if($row['gender']=='女') echo " checked=\"checked\""?>> 女
                </label>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-5 control-label">详细地址:</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="address" name="address"
                       value="<?php echo $row['address']; ?>" placeholder="Address" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-5 control-label" >联系方式:</label>
            <div class="col-sm-3">
                <input type='tel' pattern="[0-9]{11,11}" class="form-control search" name="contact"
                       value="<?php echo $row['contact'] ?>" placeholder="Phone Number"
                       autocomplete="off" maxlength="11" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-5 control-label">职位:</label>

            <div class="col-sm-3">
                <select name="job_title" class="form-control">
                    <option><?php echo $row['job_title']; ?></option>
                    <option>技术运维</option>
                    <option>信息安全</option>
                    <option>前端开发</option>
                    <option>视觉设计</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-5 control-label">类型:</label>

            <div class="col-sm-3">
                <select name="type" class="form-control">
                    <option><?php echo $row['type']; ?></option>
                    <option>成员</option>
                    <option>教师</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-5 control-label">入学年份:</label>

            <div class="col-sm-3">
                <select name="year_level" class="form-control" required>
                    <option><?php echo $row['year_level']; ?></option>
                    <option><?php $time = time();
                        $year = date("Y", $time);
                        echo $year . "年"; ?></option>
                    <option><?php echo ((int)$year - 1) . "年" ?></option>
                    <option><?php echo ((int)$year - 2) . "年" ?></option>
                    <option><?php echo ((int)$year - 3) . "年" ?></option>
                    <!-- <option>Faculty</option> -->
                </select>
            </div>
        </div>



        <div class="form-group">
            <label class="col-sm-5 control-label">自我介绍(About Me):</label>
            <div class="col-sm-3">
            <textarea class="form-control" rows="3" name="self_intro"
                      placeholder="self intro"
                      autocomplete="off"><?php echo $row['self_intro'] ?></textarea>
            </div>
        </div>
        <!-- <div class="alert alert-info " style="display:block; width:420px; margin-left:480px; ">
          添加标签的位置
        </div> -->
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
