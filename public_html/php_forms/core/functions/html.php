<?php

require('validators.php');

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

/**
 * filter form array
 *
 * @param array $form
 * @return array
 */
function sanitize_form_input_values(array $form): array
{
	$filter_params = [];
	foreach ($form['fields'] as $key => $field) {
		$filter_params[$key] = $field['filter'] ?? FILTER_SANITIZE_SPECIAL_CHARS;
	}
	return filter_input_array(INPUT_POST, $filter_params);
}


// function validate_form(&$form, $form_values)
// {
// 	$success = true;

// 	foreach ($form['fields'] as $key => &$field) {
// 		foreach ($field['validators'] as $key => $validator) {
// 			if (is_array($validator)) {
// 				$validator = $key;
// 				var_dump($validator);
// 				// got through validators array
// 				foreach ($field['validators'] as $validator) {
// 					// check if function can be called
// 					if (is_callable($validator)) {
// 						//call function
// 						if ($validator($form_values[$key]['validate_field_range'], $field)) {
// 							$field['value'] = $form_values[$key];
// 						} else {
// 							$success = false;
// 							break;
// 						}
// 					}
// 				}
// 			} else {
// 				// got through validators array
// 				foreach ($field['validators'] as $validator) {
// 					// check if function can be called
// 					if (is_callable($validator)) {
// 						//call function
// 						if ($validator($form_values[$key], $field)) {
// 							$field['value'] = $form_values[$key];
// 						} else {
// 							$success = false;
// 							break;
// 						}
// 					}
// 				}
// 			}
// 		}
// 	}

// 	return $success;
// }


// function validate_form(array &$form, array $form_values)
// {
// 	$success = true;

// 	foreach ($form as $form_key => &$field){
// 		if($form_key === 'validators'){
// 			print 'valio ble';
// 			foreach($field as $valid_key => $validator){
// 				var_dump($valid_key);
// 				foreach($validator as $key){
// 					var_dump($key);

				
// 				if (is_callable($valid_key)) {
// 					var_dump('Is colable ble');
// 					// call function
// 					if ($valid_key($form_values, $field)) {
// 						$field['value'] = $form_values[$form_key];
// 						var_dump($form_values[$form_key]);
// 					} else {
// 						$success = false;
// 						break;
// 					}
// 				}
// 			}
// 		}
// 	}
// 	}

// 	foreach ($form['fields'] as $key => &$field) {
// 		// go through validators array
// 		foreach ($field['validators'] as $validator_key => $validator) {
// 			//check if validator is array
// 			if (is_array($validator)) {
// 				// check if validator is callable
// 				if (is_callable($validator_key)) {
// 					// call function
// 					if ($validator_key($form_values[$key], $field, $validator)) {
// 						$field['value'] = $form_values[$key];
// 					} else {
// 						$success = false;
// 						break;
// 					}
// 				}
// 				continue;
// 			}
// 			//if not array
// 			if (is_callable($validator)) {
// 				// call function
// 				if ($validator($form_values[$key], $field)) {
// 					$field['value'] = $form_values[$key];
// 				} else {
// 					$success = false;
// 					break;
// 				}
// 			}
// 		}
// 	}
// 	return $success;
// }

function validate_form(array &$form, array $form_values): bool
{
    $success = true;
    foreach ($form['fields'] as $key => &$field) {
		// go through validators array
		
        foreach ($field['validators'] as $validator_key => $validator) {
            //check if validator is array
            if (is_array($validator)) {
                $function = $validator_key;
                $params = $validator;
            } else {
                $function = $validator;
			}
			
            if ($function($form_values[$key], $field, $params ?? null)) {
                $field['value'] = $form_values[$key];
            } else {
                $success = false;
                break;
            }
        }
	}
	
    foreach ($form['validators'] as $validator_key => $validator) {
        if (is_array($validator)) {
            $function = $validator_key;
            $params = $validator;
        } else {
            $function = $validator;
        }
       
        if (!$function($form_values, $form, $params ?? null)) {
            $success = false;
            break;
        }
    }
    return $success;
}
