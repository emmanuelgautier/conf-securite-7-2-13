<?php

include("header.php");

?>

	<body>
		<?php
			if(isAuthenticated()) include("write.php");
			include("read.php");
		?>
	</body>
</html>