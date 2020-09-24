<?php

namespace App\Pixels;

class Pixel
{
	private array $data;
	private array $properties = [
		'coordinate_x',
		'coordinate_y',
		'color',
        'email',
        'size'

	];

	public function _setData(array $data)
	{
		//go through all properties
		foreach ($this->properties as $property) {
			//			var_dump($property);
			//change the name according to setter, remove underscore
			$new_prop = 'set' . str_replace('_', '', $property);
			//check if can be called by name
			//			var_dump($new_prop);
			if (is_callable(array($this, $new_prop))) {
				//if yes, call function by name and provide value
				$this->$new_prop($data[$property] ?? null);
				//				var_dump($data[$property]);
			} else {
				//if no, set property data key with argument $data value
				$this->data[$property] = $data[$property] ?? null;
			}
		}
	}

	public function _getData(): ?array
	{
		$new_properties = [];
		foreach ($this->properties as $property) {
			$new_prop = 'get' . str_replace('_', '', $property);
			if (is_callable(array($this, $new_prop))) {
				$new_properties[$property] = $this->$new_prop();
			} else {
				$new_properties[$property] = $this->data[$property];
			}
		}

		return $new_properties;
	}


	public function setCoordinateX(?int $x)
	{
		$this->data['coordinate_x'] = $x;
	}

	public function getCoordinateX(): ?string
	{
		return $this->data['coordinate_x'] ?? null;
	}

	public function setCoordinateY(?int $y)
	{
		$this->data['coordinate_y'] = $y;
	}

	public function getCoordinateY(): ?string
	{
		return $this->data['coordinate_x'] ?? null;
	}

	public function setColor(?string $color)
	{
		$this->data['color'] = $color;
	}

	public function getColor(): ?string
	{
		return $this->data['color'] ?? null;
	}

	public function setEmail(?string $email)
	{
		$this->data['email'] = $email;
	}

	public function getEmail(): ?string
	{
		return $this->data['email'] ?? null;
    }
    
    public function setSize(?int $size)
    {
        $this->data['size'] = $size;
    }

    public function getSize(): ?int
	{
		return $this->data['size'] ?? null;
	}
}
