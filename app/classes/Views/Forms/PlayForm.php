<?php


namespace App\Views\Forms;


use Core\Views\Form;

class PlayForm extends Form
{
	public function __construct ()
	{
		$form_array = [
			'attr' => [
				'method' => 'POST',
			],
			'pic' => [
                'img1' => 'https://hatrabbits.com/wp-content/uploads/2016/12/rare-combinaties.jpg',
                'img2' => 'https://images.unsplash.com/photo-1508138221679-760a23a2285b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80',
                'img3' => 'https://www.computerhope.com/jargon/r/random-dice.jpg',
            ],
            'fields' => [
				'balansas' => [
					'type' => 'text',
					'value' => '',
					'validators' => [
						'validate_field_not_empty',
						'validate_field_is_number',
						'validate_field_range' => [
							'min' => 5,
							'max' => 5,
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
                'submit2' => [
					'title' => 'STATYK',
					'type' => 'submit',
				],
			],
	
		];

		parent::__construct($form_array);
	}
}