<?php

namespace App\Users;

use Core\DataHolder;

class User extends DataHolder
{
	protected array $properties = [
		'email',
		'password'
	];
	
	public function setEmail (?string $email)
	{
		$this->data['email'] = $email;
	}
	
	public function getEmail (): ?string
	{
		return $this->data['email'] ?? null;
	}
	
	public function setPassword (?string $email)
	{
		$this->data['password'] = $email;
	}
	
	public function getPassword (): ?string
	{
		return $this->data['password'] ?? null;
	}

}