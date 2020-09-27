<nav>
	<?php foreach($nav as $page): ?>
		<a href="<?php print $page['url'];?>"><?php print $page['title'];?></a>
	<?php endforeach; ?>
</nav>