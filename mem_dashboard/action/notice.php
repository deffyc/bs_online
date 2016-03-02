
<?php
/**
 * Created by PhpStorm.
 * User: zh
 * Date: 15-10-24
 * Time: 下午3:22
 * 用来通知特殊事件
 */
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">
    <title>网协图书馆</title>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Bootstrap core CSS -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Footer css  -->
    <link href="../../assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../assets/css/footer.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="../../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
    <script src="../../assets/js/jquery/1.11.3/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>


    <!-- Custom styles for this template -->
</head>

<body>
<!-- Fixed navbar --><!--顶栏开始-->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="dashboard.php">成员登录</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li <?php if($start==0) echo "class=active"; ?>><a href="../dashboard.php">&nbsp;主页</a></li>
                <li <?php if($start==1) echo "class=active"; ?>><a href="../view_books.php">&nbsp;所有图书</a></li>
                <li <?php if($start==2) echo "class=active"; ?>><a href="../mybooks.php">&nbsp;我的图书</a></li>
                <li <?php if($start==3) echo "class=active"; ?>><a href="../myborrow.php">&nbsp;我的借阅关系</a></li>

                <li <?php if(0) echo "class=active"; ?>><a href="#myModal" data-toggle="modal">&nbsp;高级搜索</a></li>
                <li <?php if($start==4) echo "class=active";  ?> ><a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">&nbsp;信息管理
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="../infoManage.php">基本信息</a>
                        </li>
                        <li>
                            <a href="../edit_social_info.php">社交信息</a>
                        </li>
                        <li>
                            <a href="../edit_all_achievement.php">个人成就</a>
                        </li>
                        <li>
                            <a href="../edit_password.php">修改密码</a>
                        </li>
                    </ul>
                </li>
                <li><a href="../logout.php">&nbsp;登出</a></li>
            </ul>
            <p class="navbar-text navbar-right">欢迎:&nbsp;</p>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>
<!--顶栏结束-->

<div class="container  theme-showcase">
    <div class="row"></div>

    <!-- Main component for a primary marketing message or call to action -->
    <div class="row">
        <div class="jumbotron">
            <h4>NOTICE</h4>

            <p><?php echo $notice ?></p>

            <p>
                <a class="btn btn-lg btn-primary" href="../dashboard.php" role="button">回到首页 »</a>
            </p>
        </div>
    </div>

</div>

<!-- FOOTER -->
<footer class="footer ">
    <div class="container">
        <div class="row footer-top">
            <div class="col-xs-12  col-sm-12  col-lg-12 col-lg-offset-1 col-sm-offset-1">
                <div class="row about">
                    <div class="col-md-3 col-xs-3">
                        <h4>公众平台入口</h4>

                        <p class="follow-me-icons">
                            <a class="social-btn bspopover" data-toggle="popover" data-placement="top"
                               data-trigger="hover" data-html="true"
                               data-content="<img src=assets/img/wechat.jpg style='width: 140px; height: 140px;'>"
                               data-original-title="" title="">
                                <i class="fa fa-weixin fa-2"></i>
                            </a>
                        </p>
                    </div>
                    <div class="col-xs-3">
                        <h4>相关链接</h4>
                        <ul class="list-unstyled">
                            <li><a href="http://open.xiyouant.org/" target="_blank">开放资源</a></li>
                            <li><a href="http://doc.xiyounet.org/" target="_blank">内部文档</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-3">
                        <h4>Bug 提交</h4>
                        <ul class="list-unstyled">
                            <li><a href="mailto:me@leozhang2018.me">电子邮件</a></li>
                            <li><a class="social-btn bspopover" data-toggle="popover" data-placement="top"
                                   data-trigger="hover" data-html="true"
                                   data-content="<img src=assets/img/contactadmin.jpg style='width: 140px; height: 140px;'>"
                                   data-original-title="" title="">微信讨论组</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-3">
                        <h4>服务商</h4>
                        <ul class="list-unstyled">
                            <li><a href="http://http://www.qiniu.com/" target="_blank">七牛云存储</a></li>
                            <li><a href="http://www.aliyun.com" target="_blank">阿里云</a></li>
                        </ul>
                    </div>
                </div>

            </div>

        </div>
        <hr>
        <div class="row footer-bottom">
            <ul class="list-inline text-center">
                <li><a href="http://xiyounet.org" target="_blank">西安邮电大学网络科技协会</a></li>
                <li>当前呈现版本 15.10.18</li>
            </ul>
        </div>
    </div>
</footer>

<!--  popover initialization -->
<script>$(function () {
        $('[data-toggle="popover"]').popover()
    })</script>

</body>
</html>


