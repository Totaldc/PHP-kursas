<nav>
	<?php foreach($data as $page): ?>
		<a href="<?php print $page['url'];?>"><?php print $page['title'];?></a>
	<?php endforeach; ?>
</nav>