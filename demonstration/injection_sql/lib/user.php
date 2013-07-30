<?php

session_start();

if(!isAuthenticated() && !empty($_COOKIE['auth']))
{
	$cookie = $pdo->quote(addslashes($_COOKIE['auth']));
	$auth = $pdo->query("SELECT id FROM demonstrationXSS2_user WHERE token=".$cookie)->fetch();
	
	if(!empty($auth['id']))
	{
		setAuthenticated(true);
		setUserId(intval($auth['id']));
	}
}

function setAuthenticated($authenticated = false)
{
	if(!empty($authenticated))
	{
		$_SESSION['auth'] = true;
	}
	else
	{	
		$_SESSION['auth'] = false;
		setcookie('auth', "", time() - 3600);
	}
}

function isAuthenticated()
{
	if(isset($_SESSION['auth']) && $_SESSION['auth'] === true && isset($_SESSION['userid']) && $_SESSION['userid'] != 0) return true;
	else return false;
}

function setUserId($id)
{
	$_SESSION['userid'] = $id;
}

function getUserId()
{
	return $_SESSION['userid'];
}

?>