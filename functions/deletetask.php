<?php

$id  		= (isset($_GET['id']))?$_GET['id']:"";

require_once 'model.php';

$res 	= $pdo->query("SELECT `image` FROM `taskmanager` WHERE `id`='".$id."'");
$task = $res->fetch();

$res  = $pdo->query("DELETE FROM `taskmanager` WHERE id='".$id."'");
if (file_exists('../'.$task['image'])) {
		unlink('../'.$task['image']);
};

header('Location: ../index.php');