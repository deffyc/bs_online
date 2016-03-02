<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_books.php'); ?>

<!-- 接受来自douban_catch.php 的post查询结果 -->
<?php
		$douban_book_title=$_POST['douban_book_title'];
		$douban_author=$_POST['douban_author'];
		$douban_publisher=$_POST['douban_publisher'];
		$douban_isbn=$_POST['douban_isbn'];
		$douban_copyright_year=$_POST['douban_copyright_year'];
 ?>

<div class="container">
  <div class="margin-top">
    <div class="row">
      <div class="span12">

        <div class="alert alert-info">增加图书</div>
        <p>
          <a href="books.php" class="btn btn-info">
            <i class="icon-arrow-left icon-large"></i>&nbsp;返回</a>
        </p>
        <div class="addstudent">
          <div class="details">填写图书详细信息</div>

          <form class="form-horizontal" method="POST" action="books_save.php" enctype="multipart/form-data">

            <div class="control-group">
              <label class="control-label" for="inputEmail">图书名称:</label>
              <div class="controls">
                <input type="text" class="span4" id="inputEmail" name="book_title" value="<?php echo $douban_book_title;?>" placeholder="Book Title" required>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="inputPassword">分类：</label>
              <div class="controls">
                <select name="category_id">
                  <option></option>
                  <?php
									$cat_query = mysql_query("select * from category");
									while($cat_row = mysql_fetch_array($cat_query)){
									?>
                  <option value="<?php echo $cat_row['category_id']; ?>"><?php echo $cat_row['classname']; ?></option>
                  <?php  } ?>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="inputEmail">作者:</label>
              <div class="controls">
                <input type="text" class="span4" id="inputPassword" name="author" value="<?php echo $douban_author;?>" placeholder="Author" required>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="iionputPassword">数量:</label>
              <div class="controls">
                <input type="text" class="span1" id="inputPassword" name="book_copies" placeholder="" required>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="inputPassword">出版社:</label>
              <div class="controls">
                <input type="text" class="span4" id="inputPassword" name="publisher_name" value="<?php echo $douban_publisher;?>" placeholder="Publisher Name" required>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputPassword">ISBN:</label>
              <div class="controls">
                <input type="text" class="span4" id="inputPassword" name="isbn" value="<?php echo $douban_isbn;?>" placeholder="ISBN" required>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputPassword">出版年:</label>
              <div class="controls">
                <input type="text" id="inputPassword" name="copyright_year" value="<?php echo $douban_copyright_year;?>" placeholder="Copyright Year" required>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputPassword">状态:</label>
              <div class="controls">
                <select name="status" required>
                  <option></option>
                  <option>新书</option>
                  <option>旧书</option>
                  <option>丢失</option>
                  <option>损坏</option>
                </select>
              </div>
            </div>

            <div class="control-group">
              <div class="controls">
                <button name="submit" type="submit" class="btn btn-info">
                  <i class="icon-save icon-large"></i>&nbsp;保存</button>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#douban_Modal">豆瓣抓取(Beta)</button>
              </div>

            </div>
          </form>

          <!-- 查询isbn 表单-->

          <form method="POST" action="douban_catch.php">
            <!-- Modal -->
            <div id="douban_Modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

              <div class="modal-body">

                <div class="input-prepend input-append">
                  <span class="add-on">ISBN&nbsp;:</span>
                  <input class="input-xlarge" id="focusedInput" name="input_isbn" type="text" placeholder="请输入 isbn" required>
                </div>

              </div>

              <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
                <button type="submit" class="btn btn-info">&nbsp;抓取</button>
                <!-- <a name="submit_isbn" type="submit" class="btn btn-info"></a> -->
              </div>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<?php include('footer.php') ?>
