      <div class="navbar navbar-fixed-top navbar-inverse">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="nav-collapse collapse">
                        <!-- .nav, .navbar-search, .navbar-form, etc -->
					<ul class="nav">
					<li><a href="dashboard.php"><i class="icon-home icon-large"></i>&nbsp;主页</a></li>
					<li class="active"><a href="users.php"><i class="icon-user icon-large"></i>&nbsp;用户</a></li>
					<?php include 'dropdown.php';?>
					<li><a href="books.php"><i class="icon-book icon-large"></i>&nbsp;图书管理</a></li>
					<li><a href="member.php"><i class="icon-group icon-large"></i>&nbsp;成员管理</a></li>
					<li><a href="archive.php"><i class="icon-list-alt icon-large"></i>&nbsp;归档</a></li>
					<li><a href="#myModal" data-toggle="modal"><i class="icon-search icon-large"></i>&nbsp;高级搜索</a></li>


					<li><a href="logout.php"><i class="icon-signout icon-large"></i>&nbsp;登出</a></li>
					</ul>
					 <div class="pull-right">
						<div class="admin">欢迎管理员</div>
                     </div>
                    </div>
                </div>
            </div>
        </div>

<?php include 'search_form.php';?>
