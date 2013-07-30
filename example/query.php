<!DOCTYPE html>
<html>
	<head>
		<title>Mon super site a piraté</title>
	</head>
	
	<body>

	<?php 	
		if(!empty($_GET['q'])) {
			$pdo = new \PDO('mysql:host=localhost;dbname=securite', 'root', '');
			$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			
			$query = $pdo->quote($_GET['q']);
			
			$filename = $pdo->query("SELECT * FROM file WHERE filename=".$query)->fetch();
			
			if(!empty($filename['id']))
				include($_GET['q'].".html"); 
			else
				header("location: index.html");
			
			} 
		
		?>

	</body>
</html>