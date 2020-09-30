<?php

namespace App\Views\Forms;

use Core\Views\Form;

class RegisterForm extends Form
{
	public function __construct ()
	{
		$form_array = [
			'attr' => [
				'method' => 'POST',
			],
			'fields' => [
				'email' => [
					'label' => 'Your Email:',
					'type' => 'email',
					'validators' => [
						'validate_field_not_empty',
						'validate_user_unique',
					],
					'extra' => [
						'attr' => [
							'placeholder' => 'Pvz. aivaras@makdraiveris.lt',
						],
					],
				],
				'password' => [
					'label' => 'Password:',
					'type' => 'password',
					'validators' => [
						'validate_field_not_empty',
					],
				],
				'password_repeat' => [
					'label' => 'Repeat Password:',
					'type' => 'password',
					'validators' => [
						'validate_field_not_empty',
					],
				],
			],
			'buttons' => [
				'submit' => [
					'title' => 'Register',
					'type' => 'submit',
					'value' => 'submit',
				],
			],
			'validators' => [
				'validate_fields_match' => [
					'fields' => [
						'password',
						'password_repeat',
					],
					'error' => 'Laukeliai privalo sutapti',
				],
			],
		];
		
		parent::__construct($form_array);
	}
}