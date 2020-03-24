<?php
	global $post;
	
	// $id is the global variable defined at bookmanager-admin.php
	$post = get_post($id);
	
	setup_postdata($post);
?>
    <div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Book List Edit</h1>
				
				<div class="">
					<div class="card-header">
						<h4 class="card-title">Book information</h4>
					</div>
					<div class="card-body">
						<form action="" method="post">
							<input type="hidden" name="postid" value="<?php the_id(); ?>" />

							<div class="form-group">
								<label for="frmTitle" class="col-sm-12 control-label">Title</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" name="frmTitle" value="<?php the_title(); ?>" />
								</div>
							</div>
							
							<div class="form-group">
								<label for="frmDescription" class="col-sm-12 control-label">Description</label>
								<div class="col-sm-12">
									<textarea class="form-control" name="frmDescription"><?php the_content(); ?></textarea>
								</div>
							</div>
							
							<div class="col-sm-8 col-sm-offset-4">
								<button type="submit" name="listaction" value="process_book_update" class="btn btn-success">Update</button>
								<button type="submit" name="listaction" value="cancel_book_update" class="btn btn-warning">Cancel</button>
								<button type="submit" name="listaction" value="process_book_delete" class="btn btn-danger">Delete</button>
							</div>
						</form>
					</div>
				</div>
				
			</div>
		</div>
	</div>
