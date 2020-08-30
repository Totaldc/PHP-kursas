<?php include 'config/init.php'; ?>

<?php

$template = new Template('templates/frontpage.php');
$template->title = 'Latest Jobs';

print $template;