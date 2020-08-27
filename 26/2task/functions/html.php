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
    $attributes += $field['extra']['attr'];
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

