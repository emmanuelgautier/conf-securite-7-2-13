<?php

include("header.php");

if(!isAuthenticated()) header("location: index.php");

if(!empty($_POST['receiver']) && !empty($_POST['subject']) && !empty($_POST['text']))
{
	$receiver 	= $pdo->quote($_POST['receiver']);
	$subject 	= $pdo->quote($_POST['subject']);
	$text 		= $pdo->quote($_POST['text']);
	
	$user_id = $pdo->query("SELECT id FROM demonstrationXSS2_user WHERE username=".$receiver)->fetch();
	
	if(!empty($user_id['id']))
	{
		$id = intval($user_id['id']);
		
		$pdo->exec("INSERT INTO demonstrationXSS2_message VALUES(NULL, ".intval(getUserId()).", ".$id.", ".$subject.", ".$text.")");
		
		$notice = "Message envoyé";
	}
	else $notice = "Le pseudo indiqué n'existe pas";
}

?>

	<body>
		<h1>Envoyer un message</h1>

		<?php if(!empty($notice)) echo $notice; ?>
		<form method="post" action="">
			<label>Destinataire</label><input type="text" name="receiver" /><br />
			<label>Sujet</label><input type="text" name="subject" /><br />
			<label>Texte</label><br />
			<textarea name="text"></textarea><br />
			<input type="submit" value="envoyer" />
		</form>
	</body>
</html>