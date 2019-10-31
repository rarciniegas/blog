<h2><?php echo $post['title']; ?></h2>
<small class="post-date">Posted on: <?php echo $post['created_at']; ?></small><br>
<div class="post-body">
<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $post['image']).'" height="200" width="200" class="img-thumbnail" />' ?> 
	<?php echo $post['body']; ?>
</div>


	<hr>

	<a class="btn btn-default pull-left" type="button" href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">Edit</a>
	<?php echo form_open('/posts/delete/'.$post['id']); ?>
		<input type="submit" value="Delete" class="btn btn-danger">

	</form>
