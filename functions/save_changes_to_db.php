<?php
$id  		= (isset($_POST['id']))?$_POST['id']:"";
$text   = (isset($_POST['text']))?$_POST['text']:"";
$done   = (isset($_POST['done']))?$_POST['done']:"";
if ($done=="on") {
	$done=1;
} else {
	$done=0;
}

require_once 'model.php';

$res  = $pdo->query("UPDATE `taskmanager` SET `text`='".$text."',`done`='".$done."' WHERE `id` = '".$id."'");

header('Location: ../index.php');