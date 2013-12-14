<?php if (count($books) == 0) :?>
	<article>
		<h4>There are no books on the shelf yet<br>
			<a href="/books/addBook/">Add some books to the shelf</a>
		</h4>
	</article>
<?php endif; ?>

<?php foreach($books as $post): ?>
	<div id="title"><?=$post['title']?></div>
	<div id="author"><?=$post['author']?></div>
	<div id="name">Suggested by <?=$post['first_name']?></div>
	<br>
<?php endforeach; ?>