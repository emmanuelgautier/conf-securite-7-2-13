<?php

include("lib/user.php");

setAuthenticated(false);
setUserId(0);

header("location: index.php");

?>