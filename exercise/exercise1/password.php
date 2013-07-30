<?php

include("header.php");

if(!isAuthenticated()) header('Location: index.php');

if(!empty($_POST['password']) && !empty($_POST['check_password']))
{
	if($_POST['password'] === $_POST['check_password'])
	{
		$password = $pdo->quote(md5($_POST['password']));
		
		$pdo->exec("UPDATE exercise1_user SET password=".$password." WHERE id=".getUserId());
		header("Location: index.php");
	}
	else
		echo "Vous n'avez pas rentré deux fois le même mot de passe !";
}

?>


<form method="post" action="">
	<label>Nouveau mot de passe</label><input type="password" name="password" placeholder="mot de passe" /><br />
	<label>Confirmer mot de passe</label><input type="password" name="check_password" placeholder="même mot de passe" /><br />
	<input type="submit" value="changer" />
</form>