<?php

/**
 * saves array to file
 *
 * @param $array
 * @param $file_name
 * @return bool
 */
function array_to_file (array $array, string $file_name): bool
{
	
	$string = json_encode($array);
	//	$data_written = file_put_contents($file_name, $string);
	//	if($data_written === false){
	//		return false;
	//	} else {
	//		return true;
	//	}
	return file_put_contents($file_name, $string) !== false;
}

/**
 * generates array from json
 *
 * @param $file_name
 * @return array|false|mixed
 */
function file_to_array(string $file_name)
{
	if (file_exists($file_name)) {
		$data = file_get_contents($file_name);
		$decoded = json_decode($data, true);
		return is_array($decoded) ? $decoded : [];
	} else {
		return false;
	}
}

