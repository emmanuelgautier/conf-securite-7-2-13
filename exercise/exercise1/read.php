<?php

include("header.php");

if(!isAuthenticated()) header("location: index.php");

$messages = $pdo->query("SELECT * FROM exercise1_message WHERE id_receiver=".intval(getUserId()))->fetchAll();

$statement = $pdo->prepare("SELECT username FROM exercise1_user WHERE id=:id");

?>

<body>
	<TABLE>
		<THEAD>
			<TR><TH>Auteur</TH><TH>Message</TH></TR>
		</THEAD>
		<TBODY>
		<?php
			$n = 0;
			$m = count($messages);
			
			while($n < $m)
			{
				$username = $statement->execute(array("id" => intval($messages[$n]['id_sender'])));
				
				echo "<TR><TD>".$username."</TD><TD>".stripslashes($messages[$n]['subject'])."</TD></TR>\n";
				ECHO "<TR><TD colspan=\"2\">".stripslashes($messages[$n]['message'])."</TD></TR>";
				
				$n++;
			}
		?>
		</TBODY>
	</TABLE>
</body>

<?php

$statement->closeCursor();

?>