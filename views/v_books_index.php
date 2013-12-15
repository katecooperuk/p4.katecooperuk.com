<div class="content">	
	
	<?php if (count($books) == 0) :?>
		<article>
			<h4>There are no books on the shelf yet<br>
				<a href="/books/addBook/">Add some books to the shelf</a>
			</h4>
		</article>
	<?php endif; ?>
	
	<?php foreach($books as $post): ?>
			<div id="bookrow">
				<span id="title"><?=$post['title']?> - </span>
				<span id="author"><?=$post['author']?></span><br>
				<span id="member">Suggested by <?=$post['first_name']?> <?=$post['last_name']?></span><br>
				<div id="gpop"><script language='javascript'>GBS_insertPreviewButtonPopup('ISBN:<?=$post['isbn']?>');</script></div>
				<br>
			</div>
	<?php endforeach; ?>
	
</div>

<?=$books_addBook?>
