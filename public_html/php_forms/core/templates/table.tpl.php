<table>
	<thead>
	<tr>
		<?php foreach ($table['headers'] as $header): ?>
			<th><?php print $header; ?></th>
		<?php endforeach; ?>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($table['rows'] as $row => $row_value): ?>
		<tr>
			<?php foreach ($row_value as $table_data): ?>
				<td>
					<?php print $table_data; ?>
				</td>
			<?php endforeach; ?>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>

