<?php

include("header.php");

?>

	<body>
		<?php 
		if(isAuthenticated()) echo '<a href="read.php">Lire mes messages</a><br />
		<a href="write.php">Ecrire mes messages</a><br />
		<a href="logout.php">Se deconnecter</a><br />';
		else echo '<a href="login.php">Se connecter</a>';
		?>
	
	</body>
</html>