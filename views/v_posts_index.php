<div class="content">
	<?php if (count($posts) == 0) :?>

		<article>
			You are not following anyone yet, choose some <a href="/posts/users/">Book Club Members</a>to follow			
		</article>
	
	<?php endif; ?>

	<?php foreach($posts as $post): ?>

		<article>
			<img class="posts" src="/uploads/avatars/<?=$post['avatar']?>" >
			<div id="name"><?=$post['first_name']?> <?=$post['last_name']?> posted:</div>
			<div id="post"><?=$post['content']?></div>
			<div id="time"><?=Time::display($post['created'])?></div>	
		</article>

	<?php endforeach; ?>
</div>