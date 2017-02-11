<?php
function login(){
	$username = (isset($_POST['username']))?$_POST['username']:'';
	$password = (isset($_POST['password']))?$_POST['password']:'';
	if ($username==''||$password=='') 
	{
		header('Location: index.php');
	}
	if ($username=='admin'&&$password=='123') 
		{
			$_SESSION['user']=$username;
			header('Location: index.php');
		}
}
