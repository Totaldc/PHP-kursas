<?php
include 'utils/teamHelperFunctions.php';

// Visų šiu užduočių rezultatus reikia pateikti skaitomu HTML formatu
// 1. Sukurkite 8 komandas
$teams = create_teams(8);
show_player_count($teams);
// render_teams($teams);
// 2. Suskaičiuokite šių komandų visų žaidėjų skaičių
$players_count = sum_teams_players($teams);
// 3. Suskaičiuokite šių komandų vidutinį žaidėjų skaičiu vienoje komandoje
$avg_players_count_per_team = avg_players_per_team($teams);
// 4. Suskaičiuokite kiek yra komandų su 11, 12 ir kiek su 13 žaidėjų
$teams_sizes = [];
for ($i = 11; $i <= 13; $i++) {
  $teams_sizes[$i] = teams_with_team_size_count($teams, $i);
}
// 5. Suskaičiuokite kiek šiose 8 komanduose yra 'C' pozicijos žaidėjų
$players_position_c = teams_players_position_count($teams, 'C');
// 6. Suskaičiuokite kiek šiose 8 komanduose yra NE 'C' pozicijos žaidėjų
$players_position_not_c = $players_count - $players_position_c;
// 7. Atfiltruokite komandas kurios turi po 2 LF žaidėjus
$teams_LF_2 = filter_teams_by_player_position_count($teams, 'LF', 2);
// 8. Išsiaiškinkite kurios pozicijos žaidėjų yra daugiausiai tarp šių 8 komandų
$position_count_table = form_player_position_count_array($teams);
$position_max = arr_max_key($position_count_table);
// 9. Išsiaiškinkite kurios pozicijos žaidėjų yra mažiausiai tarp šių 8 komandų
$position_min = arr_min_key($position_count_table);
// 10. Sudarykite lentelę, kurioje būtų pateikta kiekvienos komandos žaidėjų kiekis
// pagal poziciją procentais. Paskutinėje lentelėje turėtų būti visų komandų žaidėjų
// kiekis pagal poziciją procentais. 


  
// 1. Sukurti asociatyvų masyvą, kuris atspindi varžybas ir turi tokias savybes:
//   date,
//   time,
//   location,
//   team1,
//   team2,
//   score,


?>

<div>Iš viso žaidėjų: <?= $players_count; ?></div>
<hr>
<div>Vidutinis žaidėjų skaičius komandoje: <?= $avg_players_count_per_team; ?></div>
<hr>
<?php foreach ($teams_sizes as $team_size => $team_size_count) : ?>
  <div>Komandų kiekis su <?= $team_size ?> žaidėjų: <?= $team_size_count ?></div>
<?php endforeach; ?>
<hr>
<div>C pozicijos žaidėjai: <?= $players_position_c ?></div>
<hr>
<div>NE C pozicijos žaidėjai: <?= $players_position_not_c ?></div>
<hr>
<div>Komandos turinčios 2 LF tipo žaidėjus: <?= count($teams_LF_2) ?></div>
<!-- <?php render_teams($teams_LF_2); ?> -->
<hr>
<div>Daugiausiai yra <?= $position_max?> pozicijos žaidėjų: <?= $position_count_table[$position_max] ?></div>
<div>Mažiausiai yra <?= $position_min?> pozicijos žaidėjų: <?= $position_count_table[$position_min] ?></div>