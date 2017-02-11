<?php

$id  		= (isset($_GET['id']))?$_GET['id']:"";

require_once 'model.php';

$res  = $pdo->query("DELETE FROM `taskmanager` WHERE id='".$id."'");

header('Location: ../index.php');