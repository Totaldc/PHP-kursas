<?php

namespace App\Pixels;

use Core\DataHolder;

class Pixel extends DataHolder
{
	protected array $properties = [
		'coordinate_x',
		'coordinate_y',
		'color',
		'email',
		'size'
	];
	
	public function setCoordinateX (?int $x)
	{
		$this->data['coordinate_x'] = $x;
	}
	
	public function getCoordinateX (): ?string
	{
		return $this->data['coordinate_x'] ?? null;
	}
	
	public function setCoordinateY (?int $y)
	{
		$this->data['coordinate_y'] = $y;
	}
	
	public function getCoordinateY (): ?string
	{
		return $this->data['coordinate_y'] ?? null;
	}
	
	public function setColor (?string $color)
	{
		$this->data['color'] = $color;
	}
	
	public function getColor (): ?string
	{
		return $this->data['color'] ?? null;
	}
	
	public function setEmail (?string $email)
	{
		$this->data['email'] = $email;
	}
	
	public function getEmail (): ?string
	{
		return $this->data['email'] ?? null;
	}
	
	public function setsize (?int $size)
	{
		$this->data['size'] = $size;
	}
	
	public function getSize (): ?string
	{
		return $this->data['size'] ?? null;
	}
}
