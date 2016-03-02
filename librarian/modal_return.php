	<div id="delete_book<?php echo $borrow_details_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
			<div class="alert alert-success">确定借阅者已经归还此书吗 ?</div>

		</div>
		<div class="modal-footer">
			<a class="btn btn-success" href="return_save.php<?php echo '?id='.$id; ?>&<?php echo 'book_id='.$book_id; ?>">Yes</a>
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;关闭</button>
		</div>
    </div>
	
