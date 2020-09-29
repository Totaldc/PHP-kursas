<?php
$view_add_form = new \App\Views\Forms\AddForm();
?>

<div class="add container">
		<h1>Add pixel</h1>
		<?php print $view_add_form->render(); ?>
		<?php if (isset($message)) : ?>
			<div class="message">
				<span><?php print $message; ?></span>
			</div>
		<?php endif; ?>
	</div>