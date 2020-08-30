<?php include 'config/init.php'; ?>

<?php
$job = new Job;


$template = new Template('templates/frontpage.php');
$template->title = 'Latest Jobs';
$template->jobs = $job->getAllJobs();

print $template;