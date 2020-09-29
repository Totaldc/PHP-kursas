<?php

use App\App;
use App\Views\Navigation;
use Core\Views\Form;


$view_nav = new Navigation();
$login = new \App\Views\Forms\LoginForm();



if ($login->isSubmitted()) {
	if ($login->validate()) {
		header('Location: index.php');
	} else {
		$message = 'Prisijungti nepavyko';
	}
}

?>

<main>
	<h1>Login:</h1>
	<?php print $login->render(); ?>
	<?php if (isset($message)) : ?>
		<div class="message">
			<span><?php print $message; ?></span>
		</div>
	<?php endif; ?>
</main>