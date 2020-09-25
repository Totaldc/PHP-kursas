<?php

namespace Core;

class DataHolder
{
	protected array $data = [];
	protected array $properties = [];
	
	public function __construct (?array $data = null)
	{
		if ($data) {
			$this->_setData($data);
		}
	}
	
	public function _setData (array $data)
	{
		//go through all properties
		foreach ($this->properties as $property) {
			//			var_dump($property);
			//change the name according to setter, remove underscore
			$method = 'set' . str_replace('_', '', $property);
			//check if can be called by name
			//			var_dump($method);
			if (is_callable(array($this, $method))) {
				//if yes, call function by name and provide value
				$this->$method($data[$property] ?? null);
				// var_dump($data[$property]);
			} else {
				//if no, set property data key with argument $data value
				$this->data[$property] = $data[$property] ?? null;
			}
		}
	}
	
	public function _getData (): ?array
	{
		$data = [];
		
		foreach ($this->properties as $property) {
			$method = 'get' . str_replace('_', '', $property);
			
			if (is_callable(array($this, $method))) {
				//call getter
				$data[$property] = $this->$method();
			} else {
				$data[$property] = $this->data[$property] ?? null;
			}
		}
		
		return $data;
	}
	
}