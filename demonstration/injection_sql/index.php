<?php

include("header.php");

if(!empty($_POST['mail']))
{
	$mail = $pdo->quote($_POST['mail']);
	
	$pdo->exec("INSERT INTO demonstrationsql_maillist VALUES(NULL, ".$mail.")");
}

?>
	<body>
		<ul>
			<li><a href="category.php?id=1">Catégorie 1</a></li>
		</ul>
		
		<form method="post" action="">
			<label>Adresse mail</label><input type="text" name="mail" /><br />
			<input type="submit" value="ajouter mon adress mail" />
		</form>
	</body>
</html>