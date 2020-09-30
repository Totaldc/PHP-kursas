<?php

namespace App\Views\Forms;

use Core\Views\Form;

class LoginForm extends Form
{
	public function __construct ()
	{
		$form_array = [
			'attr' => [
				'method' => 'POST',
			],
			'fields' => [
				'email' => [
					'label' => 'Enter Email:',
					'type' => 'email',
					'validators' => [
						'validate_field_not_empty',
					],
					'extra' => [
						'attr' => [
							'placeholder' => 'Pvz. umpa@lumpa.lt',
						],
					],
				],
				'password' => [
					'label' => 'Enter Password:',
					'type' => 'password',
					'validators' => [
						'validate_field_not_empty',
					],
//					'extra' => [
//						'attr' => [
//							'placeholder' => 'Enter your password',
//						],
//					],
				],
			],
			'buttons' => [
				'submit' => [
					'title' => 'Login',
					'type' => 'submit',
					'value' => 'submit',
				],
			],
//			'validators' => [
//				'validate_login'
//			]
		];
		
		parent::__construct($form_array);
	}
}