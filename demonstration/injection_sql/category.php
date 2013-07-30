<?php

include("header.php");

if(!empty($_GET['id']))
{
	$products = $pdo->query("SELECT * FROM demonstrationsql_products WHERE id=".$_GET['id'])->fetchAll();
}

?>

<body>
	<TABLE>
	<?php
	
	$m = count($products);
	$n = 0;
	
	while($n<$m)
	{
		echo "<TR>
				<TD>".$products[$n]['products_name']."</TD>
				<TD>".$products[$n]['price']."</TD>
			</TR>\n";
	
		$n++;
	}
	
	?>
	</TABLE>
</body>