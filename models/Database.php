<?php
class Database
{
	private static $instance = null;

	protected $db = null;

	public function __construct()
	{
		if (!self::$instance) {
			self::$instance = new PDO('mysql:dbname=zoo;host=localhost;charset=utf8', 'root', '', [
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
			]);
		}


		$this->db = self::$instance;
	}
}