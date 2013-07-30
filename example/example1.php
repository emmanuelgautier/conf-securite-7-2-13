<?php 

$pdo = new \PDO('mysql:host=localhost;dbname=securite', 'root', '');
$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

if(!empty($_POST['name']) && !empty($_POST['text']))
{
	$name = $pdo->quote(addslashes($_POST['name']));
	$text = $pdo->quote(addslashes($_POST['text']));
	
	$pdo->exec("INSERT INTO example1 VALUES(NULL, ".$name.", ".$text.")");
}

$comment = $pdo->query("SELECT * FROM example1")->fetchAll();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Exemple 1</title>
		<style>
		table { width: 100%; border-collapse: collapse; }
		table tbody { background-color: #D9F2EE; }
		table thead { background-color: #ADC4C1; }
		table td, th { padding: 5px; border: 1px solid black; }
		.post { width: 100%; background-color: #DDE6E5; }
		</style>
	</head>
	<body>
		<section class="post">
			Vive Windows ! <br />
			
			<br />
			
			Pour tout les MAC users et Linuxiens vous pouvez commenter cette publication ci-dessous (trolls autorisés ;) ) :
		</section>
		
		<br /><br />
	
		<form action="" method="post">
			<label>Nom : </label><input type="text" name="name" placeholder="votre nom" /><br />
			<label>Votre texte : </label><br /><textarea name="text" cols="125" rows="5"></textarea><br />
			<input type="submit" value="envoyer" />
		</form>
		
		<br /><br />
		
		<TABLE>
			<THEAD>
				<TR><TH>Nom</TH><TH>Commentaire</TH></TR>
			</THEAD>
			<TBODY>
				<?php
				
				$n=0;
				$m = count($comment);
				while($n < $m)
				{
					echo "<TR><TD style='width: 20%;'>".stripslashes($comment[$n]['name'])."</TD><TD>".stripslashes($comment[$n]['text'])."</TD></TR>\n";
					
					$n++;
				}
				
				?>
			</TBODY>
		</TABLE>
	</body>
</html>