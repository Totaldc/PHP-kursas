<?php
include 'utils/teamHelperFunctions.php';

$teams = create_teams(16);
$teams_with_1_C = filter_teams_by_player_position_count($teams, 'C', 1);
$teams_with_2_C = filter_teams_by_player_position_count($teams, 'C', 2);
$teams_with_3_C = filter_teams_by_player_position_count($teams, 'C', 3);
$teams_with_4_C = filter_teams_by_player_position_count($teams, 'C', 4);
?>
<div>Komandos su 1 C posizijos žaidėju: <?= count($teams_with_1_C)?></div>
<div>Komandos su 2 C posizijos žaidėju: <?= count($teams_with_2_C)?></div>
<div>Komandos su 3 C posizijos žaidėju: <?= count($teams_with_3_C)?></div>
<div>Komandos su 4 C posizijos žaidėju: <?= count($teams_with_4_C)?></div>

