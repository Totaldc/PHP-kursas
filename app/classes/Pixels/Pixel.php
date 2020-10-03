<?php

namespace App\Pixels;

use Core\DataHolder;

class Pixel extends DataHolder
{
	protected array $properties = [
		'balansas',
		'email',
	];
	
	public function setBalansas (?int $balansas)
	{
		$this->data['balansas'] = $balansas;
	}
	
	public function getBalansas (): ?string
	{
		return $this->data['balansas'] ?? null;
	}
	
	
	public function setEmail (?string $email)
	{
		$this->data['email'] = $email;
	}
	
	public function getEmail (): ?string
	{
		return $this->data['email'] ?? null;
	}
	
}
