<?php
namespace App\Views\Tables;

use App\App;
use Core\Abstracts\Views\Table;

class UsersTable extends Table
{
	public function __construct ()
	{
		$users = App::$db->getRowsWhere('users', []);
		$table_array = [
			'headers' => [
				'Email',
				'Password'
			],
			'rows' => $users,
		];
		
		parent::__construct($table_array);
	}
}