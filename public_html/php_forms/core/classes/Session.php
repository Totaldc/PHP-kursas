<?php

namespace Core;

use App\App;

class Session
{
	private ?array $user = null;
	
	public function __construct ()
	{
		$this->loginFromCookie();
	}
	
	/**
	 * Login user from server side cookie
	 *
	 * @return bool
	 */
	public function loginFromCookie (): bool
	{
		if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
			return $this->login($_SESSION['email'], $_SESSION['password']);
		}
		
		return false;
	}
	
	/**
	 * Login user, if user exists in db
	 *
	 * @param string $email
	 * @param string $password
	 * @return bool
	 */
	public function login (string $email, string $password): bool
	{
		$user = App::$db->getRowWhere('users', ['email' => $email, 'password' => $password]);
		if ($user) {
			$_SESSION['email'] = $email;
			$_SESSION['password'] = $password;
			$this->user = $user;
			return true;
		}
		return false;
	}
	
	/**
	 * Get user if logged in
	 *
	 * @return null|mixed
	 */
	public function getUser (): ?array
	{
		return $this->user;
	}
	
	/**
	 * Logout user from the website
	 *
	 * @param null $redirect
	 */
	public function logout ($redirect = null)
	{
		setcookie('PHPSESSID', null, -1);
		session_destroy();
		$_SESSION = [];
		if ($redirect) {
			header('Location:' . $redirect);
			exit;
		}
	}
}