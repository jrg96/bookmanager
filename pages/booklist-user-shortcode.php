<?php
	//require '/wp-includes/post.php';
	
	global $post;
	$args = array(
		'numberposts' => -1,
		'post_type' => 'post'
	);
	
	$postList = get_posts($args);
?>

<table class="table">
	<thead class="thead-dark">
		<tr>
			<th>Id</th>
			<th>Title</th>
			<th>Description</th>
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
		</tr>

<?php
	endforeach; 
	wp_reset_postdata();
?>

	</tbody>
</table>