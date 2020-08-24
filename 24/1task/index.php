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
	
	foreach ($game['objects'] as $key => $object) {
//		$x = true;
//		$y = !$x;
		
		$object['on_fire'] = rand(true, false);
		$object['is_target'] = !$object['on_fire'];

		if ($object['on_fire']) {
			$object['class'] .= ' fire';
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

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
		
		.bat{
			content: url("bat.png");
			width: 200px;
		}
		.fist{
			content: url("fist.png");
			width: 200px;
		}

		.knife{
			content: url('knife.png');
			width: 200px;
		}

		.saw{
			content: url('saw.png');
			width: 200px;
		}



	</style>
</head>
<body>
<div class="bg">

		<?php foreach ($game['objects'] as $object): ?>
			<div class="object <?php print $object['class']; ?>"
				style="bottom: <?php print $object['y']; ?>%; left: <?php print $object['x']; ?>%;">
			</div>
		<?php endforeach; ?>


		<?php foreach ($hud['stats'] as $stat): ?>
				<div class="stat <?php print $stat['class']; ?>"
					style="bottom: <?php print $stat['y']; ?>%; left: <?php print $stat['x']; ?>%;">
				</div>
		<?php endforeach; ?>	
				
		<?php foreach ($time['clock'] as $item): ?>
				<div class="clock"
					style="bottom: <?php print $item['y']; ?>%; left: <?php print $item['x']; ?>%;">
					<h1><?php print $item['tme']; ?></h1>
				</div>
		<?php endforeach; ?>

	
	
</div>
</body>
</html>