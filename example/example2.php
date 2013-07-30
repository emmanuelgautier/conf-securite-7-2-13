<?php

$pdo = new \PDO('mysql:host=localhost;dbname=securite', 'root', '');
$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

if(!empty($_POST['username']) && !empty($_POST['password']))
{	
	$user = $pdo->query("SELECT * FROM example2 WHERE username='".$_POST['username']."' AND password='".md5($_POST['password'])."'")->fetch();
	
	if(!empty($user['id'])) $notice = "Authentification réussite";
	else $notice = "Echec de l'authentification";
}

?>
"
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Exemple 2</title>
	</head>
	
	<body>
		<?php if(!empty($notice)) echo $notice; ?>
		<form method="post" action="">
			<label>pseudo : </label><input type="text" name="username" /><br />
			<label>Password : </label><input type="password" name="password" /><br />
			<input type="submit" value="connexion" />
		</form>
	</body>
</html>