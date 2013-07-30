<?php

function anti_script($string)
{
	return preg_replace("#script#", "", $string);
}

?>