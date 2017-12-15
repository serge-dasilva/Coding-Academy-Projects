<?php

define ("ERROR_LOG_FILE","error.log");

Class Connect_db
{
	private static $bdd = null;

	protected function __construct(){
	}

	public static function getBdd()
	{
		$host = "127.0.0.1";
		$port = 3306;
		$db = "rush_mvc";
		$username = "root";
		$passwd="root";

		if (!isset(self::$bdd))
			{
			try 
			{
			  self::$bdd = new PDO("mysql:host=" . $host . ";dbname=" . $db, $username, $passwd, [
				  PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
			  ]);
			  //echo "Connection established and database rush_mvc selected.\n";
			}
			catch (PDOException $e)
			{
			  error_log($e->getMessage(), 3, ERROR_LOG_FILE);
			  echo "PDO ERROR:" . $e->getMessage() . "storage in ERROR_LOG_FILE\n";
			  echo "Connection failed\n";
			  return 0;
			}

			}
		return self::$bdd;
	}

}

?>