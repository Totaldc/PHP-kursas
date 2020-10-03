<?php


namespace App\Views\Forms;


use Core\Views\Form;

class AddForm extends Form
{
	public function __construct ()
	{
		$form_array = [
			'attr' => [
				'method' => 'POST',
			],
			'fields' => [
				'balansas' => [
					'type' => 'text',
					'value' => '',
					'validators' => [
						'validate_field_not_empty',
						'validate_field_is_number',
						'validate_field_range' => [
							'min' => 50,
							'max' => 9999,
						],
					],
					'extra' => [
						'attr' => [
							'placeholder' => 'Balansas',
						],
					],
				],
			],
			'buttons' => [
				'submit' => [
					'title' => 'INESTI',
					'type' => 'submit',
                ],
                'submit2' => [
					'title' => 'NUSIIMTI',
					'type' => 'submit',
				],
			],
			'validators' => [
				// 'validate_pixel_coordinates',
			]
		];

		parent::__construct($form_array);
	}
}