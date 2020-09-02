<?php

require ('validators.php');

/**
 * Generates attributes
 *
 * @param array $attrs
 * @return string
 */
function html_attr (array $attrs): string
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
function input_attr (string $field_id, array $field)
{
	$attributes = [
		'name' => $field_id,
		'type' => $field['type'],
		'value' => $field['value'] ?? '',
	];
	
	$attributes += $field['extra']['attr'] ?? [];
	
	return html_attr($attributes);
}


/**
 * Generates select tag
 *
 * @param string $select_id
 * @param array $select
 * @return string
 */
function select_attr (string $select_id, array $select)
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
function option_attr (string $option_id, array $field): string
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
function button_attr (array $button)
{
	$button_data = [
		'name' => 'name',
		'type' => $button['type'],
		'value' => $button['value'],
	];
	
	$button_data += $button['extra']['attr'] ?? [];
	
	return html_attr($button_data);
}

/**
 * filter form array
 *
 * @param array $form
 * @return array
 */
function sanitize_form_input_values (array $form): array
{
	$filter_params = [];
	foreach ($form['fields'] as $key => $field) {
        $filter_params[$key] = $field['filter'] ?? FILTER_SANITIZE_SPECIAL_CHARS;
        var_dump($filter_params);
	}
	return filter_input_array(INPUT_POST, $filter_params);
}

/**
 * Generates error message, if value is empty
 *
 * @param array $form
 * @param array $form_values
 * @return bool
 */
function validate_form(&$form, $form_values)
{
    $success = true;
    foreach ($form['fields'] as $key => &$field) {
        
        

        if (in_array('validate_field_not_empty', $field['validators'] )) {
            if (validate_field_not_empty($form_values[$key], $field)) { 
                $field['value'] = $form_values[$key];
              
            } else {
                $success = false;
            }
        }

        
        if (in_array('validate_field_is_number', $field['validators'] )) {
            if (validate_field_is_number($form_values[$key], $field)) { 
                $field['value'] = $form_values[$key];
            
            } else {
                $success = false;
            }
        }

}
return $success;
}


