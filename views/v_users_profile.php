<div class="content">

	<h2><?=$user->first_name?> <?=$user->last_name?>'s Profile</h2>

	<?php if(isset($avatar)): ?>
		<img src="<?=$user->avatar; ?>" class='profile'>
	<?php else: ?>
		<img src='/uploads/default.gif'>
		<div id="prompt">Upload your own avatar image</div>

	<?php endif; ?>

	<form method='POST' action="/users/picture/" enctype="multipart/form-data" >
	
		<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
		<input type='file' accept='image' name='avatar'><br>
    	
    		<?php if(isset($error)): ?>
				<div class='error'>
					Image upload failed, please try again.
				</div>
				<br>
			<?php endif; ?>
    	
		<input type='submit' name='submit' value='Upload Avatar'>
	
	</form>

	<h2>My Posts</h2>
		<?php foreach($posts as $post): ?>
	
			<div id="post"><?=$post['content']?></div>
			<div id="time"><?=Time::display($post['created'])?></div>
			<br>
	
		<?php endforeach;?>
</div>