<?php
/**
 * Created by PhpStorm.
 * User: zh
 * Date: 15-10-23
 * Time: 上午12:12
 * 添加个人荣誉
 */
include_once('checksession.php');
include_once('bin/output.php');
include_once('bin/function.php');

?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->

</head>
<body>

<h3>添加比赛成绩</h3>

<form class="form-horizontal" method="POST" action="./action/update_add_achievement.php"
      enctype="multipart/form-data">
    <div>
        <label>比赛名</label>
        <input type="text"  name="competition"
               value="" placeholder="比赛名(包含年份)" required>
    </div>
    <div>
        <label>奖项</label>
        <input type="text"  name="description"
               value="" placeholder="奖项或排名" required>
    </div>


    <button name="submit" type="submit">
        Update
    </button>


</form>

<!--  popover initialization -->


</body>
</html>
