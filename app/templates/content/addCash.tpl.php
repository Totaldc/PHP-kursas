<h1>Sveikas, <?php print \App\App::$session->getUser()['email']; ?>!</h1>
    <span>Jūsų balansas: <?php ; ?></span>
<?php print $data['form']; ?>
<?php var_dump($data['form']) ?>
<?php if (isset($data['error'])) : ?>
	<div class="form-box">
		<span class="error"><?php print $data['error']; ?></span>
	</div>
<?php endif; ?>


