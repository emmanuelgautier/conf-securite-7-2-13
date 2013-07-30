<?php

function getMysqlConnexion()
{
	$db = new \PDO('mysql:host=localhost;dbname=securite', 'root', '');
	$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	return $db;
}

?>