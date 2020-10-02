<?php


namespace App\Views\Forms;


use Core\Views\Form;

class PixelAddForm extends Form
{
	public function __construct ()
	{
		$form_array = [
			'attr' => [
				'method' => 'POST',
			],
			'fields' => [
				'coordinate_x' => [
					'type' => 'text',
					'value' => '',
					'validators' => [
						'validate_field_not_empty',
						'validate_field_is_number',
						'validate_field_range' => [
							'min' => 0,
							'max' => 499,
						],
					],
					'extra' => [
						'attr' => [
							'placeholder' => 'X koordinate',
						],
					],
				],
				'coordinate_y' => [
					'type' => 'text',
					'value' => '',
					'validators' => [
						'validate_field_not_empty',
						'validate_field_is_number',
						'validate_field_range' => [
							'min' => 0,
							'max' => 499,
						],
					],
					'extra' => [
						'attr' => [
							'placeholder' => 'Y koordinate',
						],
					],
				],
				'color' => [
					'type' => 'select',
					'value' => 'blue',
					'validators' => [
						'validate_option'
					],
					'options' => [
						'red' => 'Red',
						'blue' => 'Blue',
						'green' => 'Green',
						'black' => 'Black',
					],
					'extra' => [
						'attr' => [
							'class' => 'color-selector'
						]
					]
				],
				'size' => [
					'label' => 'Pixeliuko dydis',
					'value' => 10,
					'type' => 'range',
					'min_value' => 1,
					'max_value' => 20,
					'validators' => [
						'validate_field_range' => [
							'min' => 1,
							'max' => 20,
						],
					],
				],
			],
			'buttons' => [
				'submit' => [
					'title' => 'Sukurk pixeli',
					'type' => 'submit',
				],
			],
			'validators' => [
				'validate_pixel_coordinates',
			]
		];
		
		parent::__construct($form_array);
	}
}