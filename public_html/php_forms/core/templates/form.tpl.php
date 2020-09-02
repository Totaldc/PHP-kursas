<form <?php print html_attr(($form['attr'] ?? []) + ['method' => 'POST']); ?>>
	
	<!-- Field Generation Start -->
	<?php foreach ($form['fields'] ?? [] as $field_id => $field): ?>
		
		<!-- Checking if input has label -->
		<?php if (isset($field['label'])): ?>
			<label><span>
					<?php print $field['label'] ?>
				</span>
		<?php endif; ?>
		
		<!-- Checking if input type is select -->
		<?php if ($field['type'] == 'select'): ?>
			<select <?php print select_attr($field_id, $field); ?>>
				<!-- Options Generation Start -->
				<?php foreach ($field['options'] ?? [] as $option_id => $option): ?>
					<option
						<?php print option_attr($option_id, $field); ?>>
						<?php print is_array($option) ? $option['title'] : $option; ?>
					</option>
				<?php endforeach; ?>
			</select>
			<!-- Options generation End -->
		
		<?php else: ?>
			<input <?php print input_attr($field_id, $field); ?>>
		<?php endif; ?>
		<?php if (isset($field['label'])) : ?>
			</label>
		<?php endif; ?>
	<?php if(isset($field['error'])): ?>
		<span class="error"><?php print $field['error']; ?></span>
		<?php endif; ?>
	<?php endforeach; ?>
	<!-- Field Generation End -->
	
	<!-- Button Generation Start -->
	<?php foreach ($form['buttons'] ?? [] as $button_id => $button): ?>
		<button <?php print button_attr($button); ?>><?php print $button['title']; ?>
		</button>
	<?php endforeach; ?>
	<!-- Button Generation End -->
</form>

