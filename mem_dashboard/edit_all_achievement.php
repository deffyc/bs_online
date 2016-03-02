<?php
/**
 * Created by PhpStorm.
 * User: zh
 * Date: 15-10-24
 * Time: 上午1:34
 */
include_once('checksession.php');
include_once('bin/output.php');
include_once('bin/function.php');

$sql = new Mysql();
$name = $_SESSION['mem_id'];
$ret = $sql->getDate("SELECT id,competition,description  FROM achievement JOIN member ON achievement.member_id = member.member_id WHERE member.username='$name' ");
output_header();
output_top_bar("edit_all_achievement");
?>

<div style="margin-bottom:220px;">
    <!--表单的开始-->

    <h3 class="alert alert-info" style="display:block; text-align:center; margin-top:50px;">个人成就</h3>

    <div class="col-sm-5" style=" margin-left:33%">
        <table id="table" class="table">

            <th>比赛</th>
            <th>名次</th>
<!--            <th></th>-->
            <th style="display:none;">id</th>

            <?php
            if ($ret) {
                foreach ($ret as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row['competition'] ?></td>
                        <td><?php echo $row['description'] ?></td>
<!--                        <td>-->
<!--                            <button type="button" class="btn btn-sm btn-info" data-toggle="modal"-->
<!--                                    data-target="#exampleModal" data-whatever="@getbootstrap">Modify-->
<!--                            </button>-->
<!--                        </td>-->
                        <td style="display:none;"><?php echo $row['id']; ?></td>
                    </tr>
                    <?php
                }
            }
            ?>

        </table>
    </div>

    <!--表单的结束-->
</div>

<!-- 弹框显示开始 -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">修改信息</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="action/update_social_info.php"
                      enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="match-name" class="control-label" >比赛:</label>
                        <input type="text" class="form-control" id="match-name">
                    </div>
                    <div class="form-group">
                        <label for="match-rank" class="control-label">奖项:</label>
                        <input type="text" class="form-control" id="match-rank">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Send message</button>
            </div>
        </div>
    </div>
</div>

<!-- 弹框显示结束 -->

<?php
output_footer();

?>

