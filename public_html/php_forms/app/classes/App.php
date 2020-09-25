<?php

namespace App;

use \Core\FileDB;
use \Core\Session;

class App
{
	
	public static FileDB $db;
	public static Session $session;
	
	public function __construct ()
	{
		self::$db = new FileDB(DB_FILE);
		self::$db->load();
		self::$session = new Session();
	}
	
	public function __destruct ()
	{
		self::$db->save();
	}
	
}
