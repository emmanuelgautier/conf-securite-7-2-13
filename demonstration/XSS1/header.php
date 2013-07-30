<?php

include("lib/PDOFactory.php");

$pdo = getMysqlConnexion();

include("lib/user.php");

?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Mon site pas du tout sécurisé</title>
	</head>
	
	<header>
		<nav>
			<ul>
				<li><a href="index.php">Accueil</a></li>
				<?php if(isAuthenticated()) { ?>
				<li><a href="logout.php">Deconnexion</a></li>
				<?php } 
				else { include("login.php"); } ?>
			</ul>
		</nav>
	</header>