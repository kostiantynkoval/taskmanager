<?php
$IDValue = intval(time()*1000+rand(100, 999));
?>
<iframe src="views/blank.html" frameborder="0" width="0" height="0" style="width:0px; height:0px" name="abc"></iframe>
<div class="container">
<form action="/../functions/loadimage.php" method="POST" target="abc" enctype="multipart/form-data">
	<div class="col-sm-6 col-md-4 col-lg-3">
	<div class="form-group">
		<label for="inputfile">Выберите изображение</label>
		<input type="file" id="inputfile" name="myimage">
		<input type="hidden" name="compID" value="<?php echo $IDValue; ?>">
	</div>
	<button type="submit" class="btn btn-info">Предпросмотр</button>
	</div>
<div class="col-sm-6 col-md-4 col-lg-3">
<div class="thumbnail" style="width: 240px; height: 180px">
	<img src="" id="preview" alt="">
</div>
</div>
</form>
<div class="row"></div>
<form action="loadform2.php" method="POST" onsubmit="return checkImage()">
  <div class="form-group">
    <label for="inputname">Ваше имя</label>
    <input type="text" class="form-control" id="inputname">
  </div>
  <div class="form-group">
    <label for="inputemail">Адрес электронной почты</label>
    <input type="email" class="form-control" id="inputemail">
  </div>
  <div class="form-group">
    <label for="inputtext">Текст задачи</label>
  	<textarea class="form-control" id="inputtext" rows="3"></textarea>
  </div>
  <input type="hidden" name="done" value="0">
  <button type="submit" class="btn btn-primary">Добавить задачу</button>
   <a href="../index.php" class="btn btn-warning" role="button">Назад</a>
</form>
</div>

<script>
	function checkImage()
	{
		var imagename = document.getElementById('imagename');
		if (imagename != null) 
			{
				if (imagename.value == "") 
					{
						alert("Изображение не предзагружено!");
						return false;
					};
				return true;
			};
		return false;
	}
</script>