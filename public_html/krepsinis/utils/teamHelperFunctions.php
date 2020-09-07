<?php
include 'utils/constants.php';

function rand_arr_el($arr)
{
  return $arr[rand(0, count($arr) - 1)];
}

function create_random_player()
{
  $player = [];
  $player['name'] = rand_arr_el(NAMES);
  $player['surname'] = rand_arr_el(SURNAMES);
  $player['number'] = rand(0, 99);
  $player['age'] = rand(18, 36);
  $player['height'] = rand(175, 230);
  $player['weight'] = round($player['height'] / (rand(18, 22) / 10));
  $player['position'] = rand_arr_el(POSITION_TYPES);
  return $player;
}

function map_player_num($player)
{
  return $player['number'];
}

function validate_uniq_team_numbers(&$team)
{
  $team_numbers = arr_map($team['players'], 'map_player_num');
  while (($rep_i = find_repetitive_value($team_numbers)) >= 0) {
    do {
      $potencial_replacement = rand(0, 99);
    } while (find_value($team_numbers, $potencial_replacement) !== -1);
    $team_numbers[$rep_i] = $potencial_replacement;
    $team['players'][$rep_i]['number'] = $team_numbers[$rep_i];
  }
}

function validate_player_positions(&$team, $min_pos_count)
{
  $players_position_count = [];
  foreach (POSITION_TYPES as $position_type)
    $players_position_count[$position_type] = 0;

  foreach ($team['players'] as $player)
    $players_position_count[$player['position']]++;

  foreach ($team['players'] as &$player) {
    $min_pos_count_key = arr_min_key($players_position_count);
    if ($players_position_count[$min_pos_count_key] >= $min_pos_count) break;
    $postion_type = $player['position'];
    if ($players_position_count[$postion_type] > $min_pos_count) {
      $player['position'] = $min_pos_count_key;
      $players_position_count[$postion_type]--;
      $players_position_count[$min_pos_count_key]++;
    }
  }
}

function create_team()
{
  $team = ['players' => []];
  $team['name'] = ucfirst(rand_arr_el(TEAM_ADJECTIVES)) . ' ' . ucfirst(rand_arr_el(TEAM_NOUNS));
  $team['coach'] = ucfirst(rand_arr_el(NAMES)) . ' ' . ucfirst(rand_arr_el(SURNAMES));
  for ($i = 0; $i < rand(11, 13); $i++)
    $team['players'][] = create_random_player();
  validate_uniq_team_numbers($team);
  validate_player_positions($team, 2);
  return $team;
}
function render_team($team)
{
?>
  <div class="container">
    <div class="team">
      <div class="team__coach">Coach: <?= $team['coach']; ?></div>
      <div class="team__name"><?= $team['name']; ?></div>
      <div class="players-table">
        <div class="players-table__title">Players</div>
        <div class="players-table__row players-table__row--header">
          <div>Name</div>
          <div>Surname</div>
          <div>Number</div>
          <div>Age</div>
          <div>Height</div>
          <div>Weight</div>
          <div>Position</div>
        </div>
        <div class="players-table__body">
          <?php foreach ($team['players'] as $player) : ?>
            <div class="players-table__row">
              <div><?= $player['name']; ?></div>
              <div><?= $player['surname']; ?></div>
              <div><?= $player['number']; ?></div>
              <div><?= $player['age']; ?></div>
              <div><?= $player['height']; ?></div>
              <div><?= $player['weight']; ?></div>
              <div><?= $player['position']; ?></div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div> ​ ​
<?php
}

/**
 * Sugeneruoja nurodytą kiekį krepšinio komandų
 *
 * @param int $count komandų kiekis
 * @return array sugeneruotų komandų masyvas
 */
function create_teams(int $count): array
{
  $all_teams = [];
  for ($i = 0; $i < $count; $i++) {
    $all_teams[] = create_team();
  }
  return $all_teams;
}

/**
 * Grąžina komandos žaidėjų skaičių,
 *
 * @param array $team krepšinio komanda
 * @return int žaidėjų skaičius
 */
function team_player_count($team)
{
  return count($team['players']);
}

/**
 * Atfiltruoja komandas pagal žaidėjų skaičių
 *
 * @param array $teams komandų masyvas
 * @param int $player_count žaidėjų skaičius
 * @return array Atfiltruotų komandų masyvas
 */
function filter_teams_by_player_count($teams, $player_count)
{
  $filtered_teams = [];
  foreach ($teams as $team) {
    if (team_player_count($team) === $player_count)
      $filtered_teams[] = $team;
  }
  var_dump($filtered_teams);
}




/**
 * Suskaičiuoja tam tikros krepšininko pocijos žaidėjų kiekį
 *
 * @param array $team krepšinio komanda
 * @param string $position krepšininko pozicija
 * @return int žaidėjų kiekis
 */
function team_player_position_count(array $team, string $position): int
{
  $position_count = 0;
  foreach ($team['players'] as $player) {
    if ($player['position'] === $position) 
      $position_count++;
  }
  return $position_count;
}


/**
 * Atfiltruoja komandas kurios turi nurodytą kiekį tam tikros pozicijos žaidėjų
 *
 * @param array $teams komandų masyvas
 * @param string $position krepšininko pozicija
 * @param int $count žaidėjų kiekis
 * @return array atrfiltruotų komandų masyvas
 */
function filter_teams_by_player_position_count($teams, $position, $count)
{
  $filtered_teams = [];
  foreach ($teams as $team) {
    if (team_player_position_count($team, $position) === $count)
      $filtered_teams[] = $team;
  }
  return $filtered_teams;
}

function count_all_players($all_)



