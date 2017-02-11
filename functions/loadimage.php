<?php
$compID 	= (isset($_POST['compID']))?$_POST['compID']:"";
$F 			= (isset($_FILES['myimage']))?$_FILES['myimage']:'';
$fileName 	= $F['name'];
//header('Location: index.php?balbes');
$fp = fopen('/../images_original/fileNames.txt', 'a+');
if ($fp) 
{
	if ($F!='') 
	{
		fwrite($fp, "{$fileName}|{$compID}\r\n");
	}
	fclose($fp);
}
if ($F=='') 
{
	exit();
}
if ($F['error']!=0) 
{
	echo "Error: ".$F['error']."<br>";
	exit();
}
$arrType = ['image/png', 'image/jpeg', 'image/gif'];
if (in_array($F['type'], $arrType)==false) 
{
	echo "Error: wrong type";
	exit();
}
$arrExt = ['.png', '.jpg', '.jpeg', '.gif'];
$index = strpos($F['name'], '.');
if (!($index!==false&&in_array(strtolower(substr($F['name'], $index)), $arrExt))) 
{
	echo "Error: wrong extention".substr($F['name'], $index)."<br>".$index."<br>";
	exit();
}
if (move_uploaded_file($F['tmp_name'], 'images/'.$compID.$F['name'])==false) 
{
	echo "Ошибка перемещения загруженного файла";
	exit();
}

$filename = '/../images_original/'.$compID.$F['name'];
$arrInfo = getimagesize($filename);
$srcW=$arrInfo[0];
$srcH=$arrInfo[1];

//Загружаем изображение в память
switch ($arrInfo['mime'])
{
	case 'image/gif':
		$imgSrc = imagecreatefromgif($filename);
		break;
	//case IMG_JPG:
	case 'image/jpeg':
		$imgSrc = imagecreatefromjpeg($filename);
		break;
	case 'image/png':
		$imgSrc = imagecreatefrompng($filename);
		break;
}
//Опред размер нового изобр
if ($srcW<$srcH) //портретная ориентация
{
	$dstW = 240*$srcW/$srcH;
	$dstH = 320;
}
else //альбомная ориентация
{
	$dstW = 320;
	$dstH = 240*$srcH/$srcW;
}
//создание нового изображения
$imgDst = imagecreatetruecolor($dstW, $dstH);
imagecopyresized(
	$imgDst, 
	$imgSrc, 
	0, 0, 
	0, 0, 
	$dstW, 
	$dstH, 
	$srcW, 
	$srcH);
imagedestroy($imgSrc);

switch ($arrInfo['mime']) 
{
	case 'image/gif':
		imagegif($imgDst, '/../images_original/'.$compID.$F['name']);
		break;
	
	//case IMG_JPG:
	case 'image/jpeg':
		imagejpeg($imgDst, '/../images_original/'.$compID.$F['name']);
		break;
	case 'image/png':
		imagepng($imgDst, '/../images_original/'.$compID.$F['name']);
		break;
}
imagedestroy($imgDst);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LoadImage</title>
</head>
<body onload="writeResult()">
	<script type="text/javascript">
		function writeResult()
		{
			var imagename = parent.document.getElementById('imagename');
			var preview = parent.document.getElementById('preview');
			if (imagename!=null&&preview!=null ) 
				{
					imagename.value = "<?php echo $compID.$F['name']; ?>";
					preview.src 	= "<?php echo '/../images_original/'.$compID.$F['name']; ?>";
				};
		}
	</script>
</body>
</html>