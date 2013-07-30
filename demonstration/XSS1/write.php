<?php

if(!isAuthenticated()) header('location: index.php');

if(!empty($_POST['text']))
{
	$text 	= $pdo->quote($_POST['text']);	
	$pdo->exec("INSERT INTO demonstrationXSS1_message VALUES(NULL, ".intval(getUserId()).", ".$text.")");	
	$notice = "Message envoyé";
}

?>

	<h1>Envoyer un message</h1>
	
	<?php if(!empty($notice)) echo $notice; ?>
	<form method="post" action="">
		<label>Texte</label><br />
		<textarea name="text"></textarea><br />
		<input type="submit" value="envoyer" />
	</form>