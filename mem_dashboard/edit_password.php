<?php
/**
 * Created by PhpStorm.
 * User: zh
 * Date: 15-10-22
 * Time: 下午10:15
 * 修改密码
 * 做一个 密码相同的检验 还有隐藏输入
 */
include_once('checksession.php');
include_once('./bin/output.php');
include_once('./bin/Mysql.php');

output_header();
output_top_bar("edit_password");
?>

<!--表单开始 onsubmit="return checkForm();" onblur="checkPwd();" onblur="checkRepwd();"  onblur="checkPwd();"-->
<div style="margin-bottom:220px;">
    <h3 class="alert alert-info" style="display:block; text-align:center; margin-top:50px;">重置密码</h3>
     <form id="modifyPas" class="form-horizontal" method="POST"  action="action/update_password.php"
          enctype="multipart/form-data">
        <div class="form-group">
            <label class="col-sm-5 control-label">旧密码确认:</label>
            <div class="col-sm-3">
              <input type="password" class="form-control" name="old_password" value=""
                   placeholder="旧密码" >
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-5 control-label">新密码:</label>
            <div class="col-sm-3">
              <input type="password" id="pwd" class="form-control" name="new_password"
                   placeholder="6 ~ 12 位" >
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-5 control-label">新密码确认:</label>
            <div class="col-sm-3">
              <input type="password" class="form-control" id="repwd" name="re_new_password"
                   placeholder="6 ~ 12 位" >
            </div>
        </div>
        <div class="alert alert-warning col-sm-offset-5 col-sm-3" role="alert" id="tip" style="display:none;"></div>
        <div class="form-group">
          <div class="col-sm-offset-7 col-sm-3">
            <button type="submit" id="submit-btn" name="submit" class="btn btn-info">Update</button>
          </div>
        </div>

    </form>
</div>


<!---->
<!--<script type="text/javascript">-->
<!---->
<!--    /*校验密码*/-->
<!--    function checkPwd() {-->
<!--        var reg = /^\d{6}$/i;-->
<!--        var pwd = document.getElementById("pwd").value;-->
<!---->
<!--        return  reg.test(pwd);-->
<!--    }-->
<!---->
<!--    /*校验2次密码是否一致*/-->
<!--    function checkRepwd() {-->
<!--        var pwd = document.getElementById("pwd").value;-->
<!--        var repwd = document.getElementById("repwd").value;-->
<!--        var tip = document.getElementById("tip");-->
<!--        if(pwd==repwd) {-->
<!--            tip.innerHTML = "OK".fontcolor("green");-->
<!--        } else {-->
<!--            tip.innerHTML = "两次密码不一致".fontcolor("red");-->
<!--        }-->
<!--        return pwd==repwd;-->
<!--    }-->
<!---->
<!--    //控制form表单的提交-->
<!--    function checkForm() {-->
<!---->
<!--        if(checkPwd() && checkRepwd()){-->
<!---->
<!--            return true;-->
<!--        }else{-->
<!--            return false;-->
<!--        }-->
<!---->
<!--    }-->
<!---->
<!--    $("#submit-btn").click(function(){-->
<!--        $("#tip").show();-->
<!--    });-->
<!---->
<!--    $("input").focus(function(){-->
<!--        $("#tip").hide();-->
<!--    });-->
<!---->
<!--</script>-->
<!--表单结束-->
<?
output_footer();


?>

