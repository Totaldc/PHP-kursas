<?php 

use App\App;
use App\Users\User;
use App\Views\Navigation;
use Core\Views\Form;




$view_nav = new Navigation();
$form = new \App\Views\Forms\RegisterForm();


if ($form->isSubmitted()) {
	// filter characters
	// validate form according to validators
	if ($form->validate()) {
		$user = new User($form->getSubmitData());
		App::$db->insertRow('users', $user->_getData());
		//		$message = $db->save() ? 'Registracija sėkminga!' : 'Užsiregistruoti nepavyko';
		header('Location: login.php');
		exit;
	}
}
?>

<main>
	<h1>Registracija:</h1>
	<?php print $form->render(); ?>
	<?php if (isset($message)) : ?>
		<div class="message">
			<span><?php print $message; ?></span>
		</div>
	<?php endif; ?>
</main>