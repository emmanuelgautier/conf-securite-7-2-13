<?php

$messages = $pdo->query("SELECT * FROM demonstrationXSS1_message")->fetchAll();

$statement = $pdo->prepare("SELECT username FROM demonstrationXSS1_user WHERE id=:id");

?>

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
				$username = $statement->execute(array('id' => intval($messages[$n]['id_sender']))); 
				
				echo "<TR><TD>".$username['username']."</TD></TR>\n";
				echo "<TR><TD>".stripslashes($messages[$n]['message'])."</TD></TR>";
				
				$n++;
			}
		?>
		</TBODY>
	</TABLE>

<?php

$statement->closeCursor();

?>