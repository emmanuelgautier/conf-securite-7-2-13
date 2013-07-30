<?php

include("header.php");

?>

	<body>
		<?php 
		if(isAuthenticated()) echo '<a href="logout.php">Se deconnecter</a><br />
		<a href="password.php">Changer de mot de passe</a><br />';
		else echo '<a href="login.php">Se connecter</a><br />';
		?>
		
		<a href="category.php?id=1">Catégorie 1</a>
	</body>
</html>