<?php

namespace Core\Views;

class Form extends \Core\Abstracts\Views\Form
{
	
	public function render (string $template_path = ROOT . '/core/templates/form.tpl.php'): string
	{
		return parent::render($template_path);
	}
	
	/**
	 * Determines which button was pressed by reading "action"
	 * index in $_POST.
	 * If $_POST is empty, or doesnt contain action, returns null
	 *
	 * @return string|null
	 */
	static function getSubmitAction (): ?string
	{
		return $_POST['action'] ?? null;
	}
	
	/**
	 * Checks if the form is submitted
	 *
	 * Gets submit action from $_POST, and checks if form array
	 * has a button with such index
	 *
	 * @return bool
	 */
	public function isSubmitted (): bool
	{
		$target_button_index = self::getSubmitAction();
		
		return isset($this->data['buttons'][$target_button_index]);
	}
	
	/**
	 * Gets form submitted data
	 * If $filtered = false, returns $_POST if not empty (or null)
	 * If $filtered = true, returns filtered $_POST array
	 * based on form array: $this->data
	 *
	 * DO NOT CALL any functions, it has to be full-code
	 *
	 * @param bool $filter
	 * @return array|null
	 */
	public function getSubmitData ($filter = true): ?array
	{
		$filter_params = [];
		
		if ($filter) {
			foreach ($this->data['fields'] as $key => $field) {
				$filter_params[$key] = $field['filter'] ?? FILTER_SANITIZE_SPECIAL_CHARS;
			}
			
			return filter_input_array(INPUT_POST, $filter_params);
		}
		
		return $_POST;
	}
	
	/**
	 * Validates form based on $this->data
	 * Does NOT call any callbacks, just returns the result
	 * of the form
	 *
	 * Does not call function validate_form !!!,
	 * implements all functionality inside
	 *
	 * @return bool
	 */
	public function validate (): bool
	{
		$form = &$this->data;
		$form_values = $this->getSubmitData();
		$success = true;
		
		foreach ($form['fields'] as $key => &$field) {
			// go through validators array
			foreach ($field['validators'] ?? [] as $validator_key => $validator) {
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
		
		if ($success) {
			foreach ($form['validators'] ?? [] as $validator_name => $validator_array) {
				if (is_array($validator_array)) {
					$new_function = $validator_name;
					$new_params = $validator_array;
				} else {
					$new_function = $validator_array;
				}
				
				if (!$new_function($form_values, $form, $new_params ?? null)) {
					$success = false;
					break;
				}
			}
		}
		
		return $success;
	}
	
}