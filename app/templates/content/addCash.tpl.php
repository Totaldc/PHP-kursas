<?php

use App\App;

?>

<h1>Sveikas, <?php print \App\App::$session->getUser()['email']; ?>!</h1>
    <h2>Jūsų balansas: 
	<?php $userRows = App::$db->getRowsWhere('accounts', ['email' => $_SESSION['email']]);
		foreach ($userRows as $key => $row): ?>
	<?php print $row['balansas']; ?>
		<?php endforeach; ?></h2>
<?php print $data['form']; ?>
<?php if (isset($data['error'])) : ?>
	<div class="form-box">
		<span class="error"><?php print $data['error']; ?></span>
	</div>
<?php endif; ?>


