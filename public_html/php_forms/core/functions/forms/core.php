<?php
//
///**
// * Filter form array
// *
// * @param array $form
// * @return array
// */
//function sanitize_form_input_values (array $form): array
//{
//	$filter_params = [];
//	foreach ($form['fields'] as $key => $field) {
//		$filter_params[$key] = $field['filter'] ?? FILTER_SANITIZE_SPECIAL_CHARS;
//	}
//	return filter_input_array(INPUT_POST, $filter_params);
//}
//
///**
// * Validates form
// *
// * @param array $form
// * @param array $form_values
// * @return bool
// */
//function validate_form (array &$form, array $form_values): bool
//{
//	$success = true;
//	foreach ($form['fields'] as $key => &$field) {
//		// go through validators array
//		foreach ($field['validators'] ?? [] as $validator_key => $validator) {
//			//check if validator is array
//			if (is_array($validator)) {
//				$function = $validator_key;
//				$params = $validator;
//			} else {
//				$function = $validator;
//			}
//
//			if ($function($form_values[$key], $field, $params ?? null)) {
//				$field['value'] = $form_values[$key];
//			} else {
//				$success = false;
//				break;
//			}
//		}
//	}
//
//	foreach ($form['validators'] ?? [] as $validator_name => $validator_array) {
//		if (is_array($validator_array)) {
//			$new_function = $validator_name;
//			$new_params = $validator_array;
//		} else {
//			$new_function = $validator_array;
//		}
//
//		if (!$new_function($form_values, $form, $new_params ?? null)) {
//			$success = false;
//			break;
//		}
//	}
//
//	return $success;
//}

