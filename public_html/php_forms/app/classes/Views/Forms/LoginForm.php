<?php

namespace App\Views\Forms;

class LoginForm extends \Core\Views\Form {
	
	public function  __construct (array $form = [])
	{
		$form_login = [
			'attr' => [
				'method' => 'POST',
			],
			'fields' => [
				'email' => [
					'label' => 'Your Email:',
					'type' => 'email',
					'validators' => [
						'validate_field_not_empty',
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
			],
			'buttons' => [
				'submit' => [
					'title' => 'Login',
					'type' => 'submit',
					'value' => 'submit',
				],
			],
			'validators' => [
				'validate_login'
			]
		];
		
		parent::__construct($form_login);
	}
	
}