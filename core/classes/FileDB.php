<?php

namespace Core;

class FileDB
{
	private string $file_name;
	private array $data;
	
	public function __construct (string $file_name)
	{
		$this->file_name = $file_name;
		$this->data = [];
	}
	
	/**
	 * Sets temporary (this data) data to passed array
	 *
	 * @param array $data_array
	 */
	public function setData (array $data_array)
	{
		$this->data = $data_array;
	}
	
	/**
	 * Returns temporary data
	 *
	 * @return array
	 */
	public function getData (): array
	{
		return $this->data;
	}
	
	/**
	 * Saves temporary data array to file as json-encoded string
	 *
	 * @return bool
	 */
	public function save (): bool
	{
		$string = json_encode($this->data, JSON_PRETTY_PRINT);
		return file_put_contents($this->file_name, $string) !== false;
	}
	
	/**
	 * Sets temporary data to decoded json file
	 */
	public function load ()
	{
		if (file_exists($this->file_name)) {
			$data = file_get_contents($this->file_name);
			$decoded = json_decode($data, true);
			$this->data = $decoded ?? [];
		} else {
			$this->data = [];
		}
	}
	
	/**
	 * Creates empty array in data on index table_name
	 *
	 * @param $table_name
	 * @return bool
	 */
	public function createTable (string $table_name): bool
	{
		if (!$this->tableExists($table_name)) {
			$this->data[$table_name] = [];
			return true;
		}
		
		return false;
	}
	
	/**
	 * Check if table name exists in data array
	 *
	 * @param string $table_name
	 * @return bool
	 */
	public function tableExists (string $table_name): bool
	{
		return isset($this->data[$table_name]);
	}
	
	/**
	 * Delete provided table with its index
	 *
	 * @param string $table_name
	 * @return bool
	 */
	public function dropTable (string $table_name): bool
	{
		if ($this->tableExists($table_name)) {
			unset($this->data[$table_name]);
			return true;
		}
		
		return false;
	}
	
	/**
	 * Delete all info from table provided
	 *
	 * @param $table_name
	 * @return bool
	 */
	public function truncateTable ($table_name): bool
	{
		if ($this->tableExists($table_name)) {
			$this->data[$table_name] = [];
			return true;
		}
		
		return false;
	}
	
	/**
	 * Inserts $row into table ($table_name) according to index provided ($row_id) (or not).
	 *
	 * @param string $table_name
	 * @param array $row
	 * @param string|null $row_id
	 * @return false
	 */
	public function insertRow (string $table_name, array $row, string $row_id = null)
	{
		//check if index provided
		if ($row_id === null) {
			//if not, put $row into table auto increment index
			$this->data[$table_name][] = $row;
			//return last index from chosen array
			return array_key_last($this->data[$table_name]);
		} else {
			//check if provided $row_id does not exist
			if (!$this->rowExists($table_name, $row_id)) {
				//if not, put $row into table with $row_id provided
				$this->data[$table_name][$row_id] = $row;
				//return index
				return array_key_last($this->data[$table_name]);
			}
		}
		
		return false;
	}
	
	/**
	 * Check if row exists in provided table according to index provided ($row_id)
	 *
	 * @param $table_name
	 * @param $row_id
	 * @return bool
	 */
	public function rowExists (string $table_name, string $row_id): bool
	{
		return isset($this->data[$table_name][$row_id]);
	}
	
	/**
	 * Update $row array if index exists
	 *
	 * @param $table_name
	 * @param $row_id
	 * @param $row
	 * @return bool
	 */
	public function updateRow (string $table_name, $row_id, array $row): bool
	{
		if ($this->rowExists($table_name, $row_id)) {
			$this->data[$table_name][$row_id] = $row;
			return true;
		}
		
		return false;
	}
	
	/**
	 * Delete row according to index provided
	 *
	 * @param string $table_name
	 * @param $row_id
	 * @return bool
	 */
	public function deleteRow (string $table_name, $row_id): bool
	{
		if ($this->rowExists($table_name, $row_id)) {
			unset($this->data[$table_name][$row_id]);
			return true;
		}
		
		return false;
	}
	
	/**
	 * Get $row according to index provided
	 *
	 * @param string $table_name
	 * @param $row_id
	 * @return false|mixed
	 */
	public function getRowByID (string $table_name, $row_id)
	{
		if ($this->rowExists($table_name, $row_id)) {
			return $this->data[$table_name][$row_id];
		}
		
		return false;
	}
	
	/**
	 * Find and return array of rows based on $conditions
	 *
	 * @param $table_name
	 * @param array $conditions
	 * @return array
	 */
	public function getRowsWhere (string $table_name, array $conditions): array
	{
		$new_arr = [];
		if ($this->tableExists($table_name)) {
			foreach ($this->data[$table_name] as $index_name => $row_array) {
				$found = true;
				foreach ($conditions as $condition_key => $condition_value) {
					if ($row_array[$condition_key] !== $condition_value) {
						$found = false;
						break;
					}
				}
				if ($found) {
					$new_arr[$index_name] = $row_array;
				}
			}
		}
		
		return $new_arr;
	}
	
	/**
	 * Return first found row according to conditions
	 *
	 * @param string $table_name
	 * @param array $condition
	 * @return false|mixed
	 */
	public function getRowWhere (string $table_name, array $condition)
	{
		if ($this->tableExists($table_name)) {
			foreach ($this->data[$table_name] as $index_name => $row_array) {
				$found = true;
				foreach ($condition as $condition_key => $condition_value) {
					if ($row_array[$condition_key] !== $condition_value) {
						$found = false;
						break;
					}
				}
				if ($found) {
					return $row_array;
				}
			}
		}
		
		return false;
	}
}

