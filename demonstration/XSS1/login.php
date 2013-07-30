<?php
	
	if(!empty($_POST['username']) && !empty($_POST['password']))
	{		
		$username = $pdo->quote($_POST['username']);
		$password = $pdo->quote(md5($_POST['password']));
		
		$user = $pdo->query("SELECT id FROM demonstrationXSS1_user WHERE username=".$username." AND password=".$password)->fetch();
		
		if(!empty($user['id']))
		{
			setAuthenticated(true);
			setUserId(intval($user['id']));
			
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
		<?php if(!empty($error)) echo $error; ?>
		<form method="post" action="">
			<label>pseudo</label><input type="text" name="username" /><br />
			<label>Mot de passe</label><input type="password" name="password" /><br />
			<input type="submit" value="envoyer" />
		</form>
