<?php
	//require '/wp-includes/post.php';
	
	global $post;
	$args = array(
		'numberposts' => -1,
		'post_type' => 'book'
	);
	
	$postList = get_posts($args);
?>

    <div class="container">
		<div class="row">
			<div class="col">
				<h1>Book List</h1>
				
				<form action="" method="post">
					<input type="hidden" name="listaction" value="display_insert_book" />
					<button type="submit" class="btn btn-primary">Add new book</button>
				</form>
				
				<table class="table" style="margin-top: 10px;">
					<thead class="thead-dark">
						<tr>
							<th>Id</th>
							<th>Title</th>
							<th>Description</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

<?php
	foreach ($postList as $post) :
		setup_postdata($post);
?>	
						<tr>
							<th><?php the_id(); ?></th>
							<th><?php the_title(); ?></th>
							<th><?php the_content(); ?></th>
							<th>
								<div class="btn-group" role="group">
									<form action="" method="post">
										<input type="hidden" name="listaction" value="display_edit_book" />
										<input type="hidden" name="postid" value="<?php the_id(); ?>" />
										
										<button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i></button>
									</form>
								</div>
							</th>
						</tr>
<?php
	endforeach; 
	wp_reset_postdata();
?>
					</tbody>
				</table>
				
			</div>
		</div>
	</div>
