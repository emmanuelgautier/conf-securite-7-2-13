<?php
	include("header.php");
	
	if(isAuthenticated()) header("location: index.php");
	
	if(!empty($_POST['username']) && !empty($_POST['password']))
	{
		$username = $pdo->quote($_POST['username']);
		$password = $pdo->quote(md5($_POST['password']));
		
		$user = $pdo->query("SELECT id FROM exercise1_user WHERE username=".$username." AND password=".$password)->fetch();
		
		if(!empty($user['id']))
		{
			setAuthenticated(true);
			setUserId(intval($user['id']));
			
			if($_POST['stay'] == 'on')
			{
				$key = sha1(uniqid(rand(), true));
				setcookie('auth', $key, time() + 3600);
				
				$key = $pdo->quote($key);
				$pdo->exec("UPDATE exercise1_user SET token=".$key." WHERE id=".intval($user['id']));
			}
			
			header("location: index.php");
		}
		else
		{
			$error = "Mauvais couple Pseudo/mot de passe";
		}
	}
	
	/*
	 * Pour pouvoir tester :
	 * 
	 * username / password
	 * 
	 * 'admin' / 'password'
	 * 'user1' / 'password'
	 * 
	 * */
?>
	<body>
		<?php if(!empty($error)) echo $error; ?>
		<form method="post" action="login.php">
			<label>pseudo</label><input type="text" name="username" /><br />
			<label>Mot de passe</label><input type="password" name="password" /><br />
			<input type="checkbox" name="stay" /><label>Rester connecté</label><br />
			<input type="submit" value="envoyer" />
		</form>
	</body>
</html>