<div class="container">
	<div class="wall">
		<div class="poop-wall">
			<?php foreach ($data ?? [] as $pixel): ?>
				<span class="pixel <?php print $pixel['color']; ?>"
				      style="bottom: <?php print $pixel['coordinate_y']; ?>px;
						      left: <?php print
					      $pixel['coordinate_x']; ?>px;
						      width: <?php print $pixel['size']; ?>px;
						      height: <?php print
					      $pixel['size']; ?>px;">
				</span>
			<?php endforeach; ?>
		</div>
	</div>
</div>
