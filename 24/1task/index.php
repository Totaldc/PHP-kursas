<?php

$game = [
	'objects' => [
		[
			'x' => 50,
			'y' => 2,
			'class' => 'car',
		],
		[
			'x' => 22,
			'y' => 4,
			'class' => 'ballas',
		],
		[
			'x' => 6,
			'y' => 0,
			'class' => 'motorcycle',
		],
		[
			'x' => 80,
			'y' => 0,
			'class' => 'girl',
		],
	],
];

$hud = [
	'stats' => [

		[
			'x' => 0,
			'y' => 70,
			'class' => 'class',
		],
	],

	'stars' => [

		'star'  => '⭐',
	],
];

$time = [

	'clock' =>	[

		[
			'x' => 15,
			'y' => 88,
			'tme' => date('H:m:i'),
		],
	],
];
$counter = 0;
foreach ($game['objects'] as $key => $object) {
	//		$x = true;
	//		$y = !$x;

	$object['on_fire'] = rand(true, false);
	$object['is_target'] = !$object['on_fire'];

	if ($object['on_fire']) {
		$object['class'] .= ' fire';
		$counter++;
	}

	if ($object['is_target']) {
		$object['class'] .= ' target';
	}




	// $object['class'] .= ' ' . ($object['on_fire'] ? 'fire' : 'target');
	//		var_dump($object['on_fire'] ? 'fire' : 'target');

	$game['objects'][$key] = $object;
}

//	var_dump($game);

$wpn  = rand(0, 3);

foreach ($hud['stats'] as $key => $stat) {

	//		$x = true;
	//		$y = !$x;

	if ($wpn === 1) {
		$stat['class'] .= ' bat';
	}

	if ($wpn === 0) {
		$stat['class'] .= ' fist';
	}

	if ($wpn === 2) {
		$stat['class'] .= ' knife';
	}

	if ($wpn === 3) {
		$stat['class'] .= ' saw';
	}

	// $object['class'] .= ' ' . ($object['on_fire'] ? 'fire' : 'target');
	//		var_dump($object['on_fire'] ? 'fire' : 'target');

	$hud['stats'][$key] = $stat;
}


//armor bar

$total = rand(1, 5000);
$current = rand(1, $total);
$percent = round(($current / $total) * 100, 1);

//health bar

$htotal = rand(1, 5000);
$hcurrent = rand(1, $htotal);
$hpercent = round(($hcurrent / $htotal) * 100, 1);

//CASH COUNTER

$cash = 1000 + 200 * $counter;

//STAR COUNTER




?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>PHP in GTA</title>
	<style>
		body {
			margin: 0;
			padding: 0;
		}

		.bg {
			background-image: url("https://www.gta-5.com/wp-content/uploads/2013/09/vinewood-streets-background.jpg");
			background-size: cover;
			min-height: 100vh;
			max-width: 100vw;
			position: relative;
		}

		.flex {
			display: flex;
		}

		.object {
			position: absolute;
			background-size: contain;
			background-repeat: no-repeat;
			background-position-y: bottom;
		}

		.stat {
			position: absolute;
			background-size: contain;
			background-repeat: no-repeat;
			background-position-y: bottom;
		}

		.star {
			position: absolute;
			background-size: contain;
			background-repeat: no-repeat;
			background-position-y: bottom;
		}



		.clock {
			position: absolute;
			background-size: contain;
			background-repeat: no-repeat;
			background-position-y: bottom;
		}

		.car {
			background-image: url('car.png');
			width: 250px;
		}

		.ballas {
			background-image: url('ballas.png');
			height: 250px;
		}

		.girl {
			background-image: url('girl.png');
			height: 250px;
		}

		.motorcycle {
			background-image: url('motorcycle.png');
			width: 200px;
		}

		.fire {
			content: url("fire.png");
		}

		.target {
			content: url("target.png");
		}

		.bat {
			content: url("bat.png");
			width: 200px;
		}

		.fist {
			content: url("fist.png");
			width: 200px;
		}

		.knife {
			content: url('knife.png');
			width: 200px;
		}

		.saw {
			content: url('saw.png');
			width: 200px;
		}

		/* armor bar */

		.outter {
			position: absolute;
			left: 233px;
			top: 55px;
			height: 10px;
			width: 115px;
			border: solid 1px black;
			background-color: #DCDCDC;
		}

		.inner {
			height: 10px;
			width: <?php print $percent; ?>%;
			border-right: solid 1px black;
			background-color: blue;
		}

		/* HEALT BAR */

		.h-outter {
			position: absolute;
			left: 10px;
			top: 230px;
			height: 25px;
			width: 180px;
			border: solid 1px black;
			background-color: #DCDCDC;
		}

		.h-inner {
			height: 25px;
			width: <?php print $hpercent; ?>%;
			border-right: solid 1px black;
			background-color: red;
		}

		/* cash counter */

		.cash {
			position: absolute;
			left: 10px;
			top: 255px;
			font-size: 36px;
			font-weight: bold;
		}

		/* STAR counter */

		.stars {
			position: absolute;
			top: 295px;
			left: 10px;
		}
	</style>
</head>

<body>
	<div class="bg">

		<?php foreach ($game['objects'] as $object) : ?>
			<div class="object <?php print $object['class']; ?>" style="bottom: <?php print $object['y']; ?>%; left: <?php print $object['x']; ?>%;">
			</div>
		<?php endforeach; ?>


		<?php foreach ($hud['stats'] as $stat) : ?>
			<div class="stat <?php print $stat['class']; ?>" style="bottom: <?php print $stat['y']; ?>%; left: <?php print $stat['x']; ?>%;">
			</div>
		<?php endforeach; ?>

		<?php foreach ($time['clock'] as $item) : ?>
			<div class="clock" style="bottom: <?php print $item['y']; ?>%; left: <?php print $item['x']; ?>%;">
				<h1><?php print $item['tme']; ?></h1>
			</div>
		<?php endforeach; ?>


		<div class="outter">
			<div class="inner"></div>
		</div>

		<div class="h-outter">
			<div class="h-inner"></div>
		</div>

		<div class="cash">
			$<?php print $cash; ?>
		</div>

		<div class="stars">

			<?php

			for ($i = 1; $i <= $counter; $i++) {
				foreach ($hud['stars'] as $star) {
					print $star;
				}
			}


			?>

		</div>




	</div>
</body>

</html>