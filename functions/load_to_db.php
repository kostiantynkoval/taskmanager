<?php
	$inputname 		= (isset($_POST['inputname']))?$_POST['inputname']:"";
	$inputemail 	= (isset($_POST['inputemail']))?$_POST['inputemail']:"";
	$inputtext 		= (isset($_POST['inputtext']))?$_POST['inputtext']:"";
	$imagename 		= (isset($_POST['imagename']))?$_POST['imagename']:"";
	$compID1 			= (isset($_POST['compID1']))?$_POST['compID1']:"";

	if ($inputname==""||$inputemail==""||$inputtext=="")
	{
		$imagename="";
	}
	$file_lines = file("../images_original/".$compID1."fileNames.txt");

	for ($i=0; $i < count($file_lines); $i++) 
	{
		$dataFile = explode("|", $file_lines[$i]);
		$dataFile[1] = str_replace(array("\n\r", '\n\r', "\n", '\n'), "", $dataFile[1]);
		$dataFile[0] = str_replace(array("\n\r", '\n\r', "\n", '\n'), "", $dataFile[0]);
		if ($compID1==trim($dataFile[1]))
		{
			if ($compID1.trim($dataFile[0])!=$imagename)
			{
				if (file_exists('../images_original/'.$compID1.trim($dataFile[0]))) 
				{
					unlink('../images_original/'.$compID1.trim($dataFile[0]));
				}
			}
		}	
	}

	if (file_exists('../images_original/'.$compID1.'fileNames.txt')) {
		unlink('../images_original/'.$compID1.'fileNames.txt');
	};
	
	$imagename = "images_original/".$imagename;
	require_once('../functions/model.php');
	$res = $pdo->query("INSERT INTO `taskmanager`(`name`, `email`, `text`, `image`, `done`) VALUES ('".$inputname."', '".$inputemail."', '".$inputtext."', '".$imagename."','0')");
	header("Location: ../index.php");

?>