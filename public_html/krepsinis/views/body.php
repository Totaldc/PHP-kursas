<?php
include 'utils/teamHelperFunctions.php';

// Visų šiu užduočių rezultatus reikia pateikti skaitomu HTML formatu
// 1. Sukurkite 8 komandas
$teams = create_teams(8);
render_teams($teams);
// 2. Suskaičiuokite šių komandų visų žaidėjų skaičiu
print sum_players($teams);
// 3. Suskaičiuokite šių komandų vidutinį žaidėjų skaičiu vienoje komandoje
print sum_avg ($teams);

// 4. Suskaičiuokite kiek yra komandų su 11, 12 ir kiek su 13 žaidėjų
if_more($teams);
// 5. Suskaičiuokite kiek šiose 8 komanduose yra 'C' pozicijos žaidėj
$teams_with_2_C = team_player_position_count($teams, 'C');
// 6. Suskaičiuokite kiek šiose 8 komanduose yra NE 'C' pozicijos žaidėjų
$teams_with_2_LF = team_player_position_count($teams, 'LF');
// 7. Atfiltruokite komandas kurios turi po 2 LF žaidėju
$teams_with_2_LFF = filter_teams_by_player_position_count($teams, 'LF', 2);
// 8. Išsiaiškinkite kurios pozicijos žaidėjų yra daugiausiai tarp šių 8 komandų
// 9. Išsiaiškinkite kurios pozicijos žaidėjų yra mažiausiai tarp šių 8 komandų
// 10. Sudarykite lentelę, kurioje būtų pateikta kiekvienos komandos žaidėjų kiekis
// pagal poziciją procentais. Paskutinėje lentelėje turėtų būti visų komandų žaidėjų
// kiekis pagal poziciją procentais. 


?>

<div>Komandos su 2 C posizijos žaidėju: <?= count($teams_with_2_C)?></div>
<div>Komandos su 2 LF posizijos žaidėju: <?= count($teams_with_2_LF)?></div>
<div>Komandos su 2 LF posizijos žaidėju: <?= count($teams_with_2_LFF)?></div>
