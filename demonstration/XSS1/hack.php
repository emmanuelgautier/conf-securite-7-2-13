<?php

$pdo = new \PDO('mysql:host=localhost;dbname=securite', 'root', '');

if(!empty($_GET['n']) && !empty($_GET['p']))
{
	$name 		= $pdo->quote($_GET['n']);
	$password 	= $pdo->quote($_GET['p']);
	$pdo->exec("INSERT INTO demonstration_hack2 VALUES(NULL, ".$name.", ".$password.")");
}

?>