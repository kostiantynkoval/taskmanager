<?php
$IDValue = intval(time()*1000+rand(100, 999));
?>
<iframe src="views/blank.html" frameborder="0" width="0" height="0" style="width:0; height:0" name="abc"></iframe>
<div class="container">
<form action="functions/loadimage.php" method="POST" target="abc" enctype="multipart/form-data">
	<div class="col-sm-6 col-md-4 col-lg-3">
	<div class="form-group">
		<label for="inputfile">Выберите изображение</label>
		<input type="file" id="inputfile" name="myimage">
		<input type="hidden" name="compID" value="<?php echo $IDValue; ?>">
	</div>
	<button type="submit" class="btn btn-info">Предпросмотр</button>
	</div>
<div class="col-sm-6 col-md-4 col-lg-3">
<div class="thumbnail previewparent">
	<img class="previewimg" src="../images_original/previmg.png" id="preview" alt="">
</div>
</div>
</form>
<div class="row"></div>
<form action="../functions/load_to_db.php" method="POST" onsubmit="return checkInput()">
	<input type="hidden" name="imagename" id="imagename" value="">
  <div class="form-group">
    <label for="inputname">Ваше имя</label>
    <input type="text" class="form-control" name="inputname" id="inputname">
  </div>
  <div class="form-group">
    <label for="inputemail">Адрес электронной почты</label>
    <input type="email" class="form-control" name="inputemail" id="inputemail">
  </div>
  <div class="form-group">
    <label for="inputtext">Текст задачи</label>
  	<textarea class="form-control" name="inputtext" id="inputtext" rows="3"></textarea>
  </div>
  <input type="hidden" name="compID1" value="<?php echo $IDValue; ?>">
  <button type="submit" class="btn btn-primary">Добавить задачу</button>
   <a href="../index.php" class="btn btn-warning" role="button">Назад</a>
</form>
</div>

<script>
	function checkInput()
	{
		var imagename = document.getElementById('imagename');
		var inputname = document.getElementById('inputname');
		var inputemail = document.getElementById('inputemail');
		var inputtext = document.getElementById('inputtext');

		if (imagename != null) 
		{
			if (imagename.value == ""||inputname.value == ""||inputemail.value == ""||inputtext.value == "") 
			{
				alert("Введены неполные данные!");
				return false;
			};
			return true;
		};
		return false;
	}
</script>