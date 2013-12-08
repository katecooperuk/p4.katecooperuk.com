<?php if (count($posts) == 0) :?>

	<article>
	
		<h4>You are not following anyone yet,<br>
			choose some <a href="/posts/users/">Book Club Members</a> to follow
			</h4>
			
	</article>
	
<?php endif; ?>

<?php foreach($posts as $post): ?>

	<article>

    	<h1><?=$post['first_name']?> <?=$post['last_name']?> posted:</h1>

		<p><?=$post['content']?></p>

		<time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>">
        	<?=Time::display($post['created'])?>
		</time>

	</article>

<?php endforeach; ?>