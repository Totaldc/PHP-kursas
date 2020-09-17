<?php foreach (generate_nav() ?? [] as $field): ?>
		
    <!-- Checking if input has label -->
    <a href= <?php print $field['url'] ?>><?php print $field['title'] ?></a>

<?php endforeach; ?>
