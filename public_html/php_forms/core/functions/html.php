<?php


function html_attr($array)
{
    $forma = '';
    foreach ($array as $key => $value) {
        $forma .= $key . '="' . $value . '"';

        
    }
    
    return $forma;

    
}

function input_attr(string $field_id, array $field): string
{
    $attributes = [
        'name' => $field_id,
        'type' => $field['type'],
        'value' => $field['value'] ?? ''
    ];
    // $attributes += $field['extra']['attr'];
    return html_attr($attributes);
}





function button_attr ($button_id, $button)
{
	$buttons = [
		'value' => $button_id,
		'title' => $button['title'],
	];
	$buttons += $button['extra']['attr'] ?? [];
	return html_attr($buttons);
}


function label_attr ($label_id, $label)
{
	$labels = [
		'for' => $label_id,
	];
	$labels += $label['extra']['attr'] ?? [];
	return html_attr($labels);
}

function select_attr(string $field_id, array $field): string
{
    $attributes = [
        'name' => $field_id,
        'íd' => $field['type']
    ];
   
    return html_attr($attributes);
}

function option_attr($option_id)
{
	$options = [
        'title' => $option_id,
    ];
    
    $option_title = $option_field['options'] ?? [];
	return html_attr($options);
}




