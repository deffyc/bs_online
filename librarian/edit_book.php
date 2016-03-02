<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_books.php'); ?>
<?php $get_id = $_GET['id']; ?>
<div class="container">
  <div class="margin-top">
    <div class="row">
      <div class="span12">
        <?php
		$query=mysql_query("select * from book LEFT JOIN category on category.category_id  = book.category_id where book_id='$get_id'")or die(mysql_error());
		$row=mysql_fetch_array($query);
		$category_id = $row['category_id'];
		?>
        <div class="alert alert-info">
          <i class="icon-pencil"></i>&nbsp;编辑图书信息</div>
        <p>
          <a class="btn btn-info" href="books.php">
            <i class="icon-arrow-left icon-large"></i>&nbsp;返回</a>
        </p>
        <div class="addstudent">
          <div class="details">请填写如下信息</div>
          <form class="form-horizontal" method="POST" action="update_books.php" enctype="multipart/form-data">

            <div class="control-group">
              <label class="control-label" for="inputEmail">图书名:</label>
              <div class="controls">
                <input type="text" class="span4" id="inputEmail" name="book_title" value="<?php echo $row['book_title']; ?>" placeholder="book_title" required>
                <input type="hidden" id="inputEmail" name="id" value="<?php echo $get_id;  ?>" placeholder="book_title" required>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputPassword">分类:</label>
              <div class="controls">
                <select name="category_id">
                  <option value="<?php echo $category_id; ?>"><?php echo $row['classname']; ?></option>
                  <?php $query1 = mysql_query("select * from category where category_id != '$category_id'")or die(mysql_error());
				          while($row1 = mysql_fetch_array($query1)){
				          ?>
                  <option value="<?php echo $row1['category_id']; ?>"><?php echo $row1['classname']; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputPassword">作者:</label>
              <div class="controls">
                <input type="text" class="span4" id="inputPassword" name="author" value="<?php echo $row['author']; ?>" placeholder="author" required>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputPassword">数量:</label>
              <div class="controls">
                <input class="span1" type="text" id="inputPassword" name="book_copies" value="<?php echo $row['book_copies']; ?>" placeholder="book_copies" required>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputPassword">出版社:</label>
              <div class="controls">
                <input type="text" class="span4" id="inputPassword" name="publisher_name" value="<?php echo $row['publisher_name']; ?>" placeholder="publisher_name" required>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputPassword">ISBN:</label>
              <div class="controls">
                <input type="text" class="span4" id="inputPassword" name="isbn" value="<?php echo $row['isbn']; ?>" placeholder="isbn" required>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputPassword">出版年:</label>
              <div class="controls">
                <input type="text" id="inputPassword" name="copyright_year" value="<?php echo $row['copyright_year']; ?>" placeholder="copyright_year" required>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="inputPassword">状态:</label>
              <div class="controls">
                <select name="status">
                  <option><?php echo $row['status']; ?></option>
                  <option>新书</option>
                  <option>旧书</option>
                  <option>丢失</option>
                  <option>损坏</option>
                </select>
              </div>
            </div>

            <div class="control-group">
              <div class="controls">
                <button name="submit" type="submit" class="btn btn-success">
                  <i class="icon-save icon-large"></i>&nbsp;Update</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include('footer.php') ?>
