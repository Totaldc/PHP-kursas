<?php

/**
 * Generates attributes
 *
 * @param array $attrs
 * @return string
 */
function html_attr(array $attrs): string
{
	$attributes = [];
	foreach ($attrs as $attr_key => $attr_value) {
		if (!is_bool($attrs)) {
			$attributes[] = "$attr_key=\"$attr_value\"";
		} else {
			$attributes[] = $attr_key;
		}
	}

	return implode(' ', $attributes);
}

/**
 * Generates inputs
 *
 * @param string $field_id
 * @param array $field
 * @return string
 */
function input_attr(string $field_id, array $field)
{
	$attributes = [
		'name' => $field_id,
		'type' => $field['type'],
		'value' => $field['value'] ?? '',
	];

	$attributes += $field['extra']['attr'] ?? [];

	return html_attr($attributes);
}

function generate_nav()
{
	if (is_logged_in()) {
		return $nav =
			[
				[
					'url' => 'index.php',
					'title' => 'Home'
				],
				[
					'url' => 'add.php',
					'title' => 'Add'
				],
				[
					'url' => 'logout.php',
					'title' => 'Logout'
				]
			];
	} else {
		return $nav =
			[
				[
					'url' => 'index.php',
					'title' => 'Home'
				],
				[
					'url' => 'register.php',
					'title' => 'Register'
				],
				[
					'url' => 'login.php',
					'title' => 'Login'
				]
			];
	}
}


/**
 * Generates select tag
 *
 * @param string $select_id
 * @param array $select
 * @return string
 */
function select_attr(string $select_id, array $select)
{
	$attributes = [
		'name' => $select_id,
	];

	$attributes += $select['extra']['attr'] ?? [];

	return html_attr($attributes);
}

/**
 * Generating new option tag
 *
 * @param string $option_id
 * @param $field
 * @return string
 */
function option_attr(string $option_id, array $field): string
{
	$option = $field['options'][$option_id];
	$attributes = [
		'value' => $option_id,
	];

	if ($field['value'] == $option_id)
		$attributes['selected'] = true;
	if (is_array($option))
		$attributes += $option['attr'] ?? [];

	return html_attr($attributes);
}

/**
 * Generates button
 *
 * @param array $button
 * @return string
 */
function button_attr(array $button)
{
	$button_data = [
		'name' => 'name',
		'type' => $button['type'],
		'value' => $button['value'],
	];

	$button_data += $button['extra']['attr'] ?? [];

	return html_attr($button_data);
}
