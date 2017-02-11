<?php
require_once 'functions/functions.php';
session_start();
if (isset($_POST['username'])) {login();}
if (isset($_GET['action'])) 
	{
		unset($_SESSION['user']);
		header('Location: index.php');
	}
$user = (isset($_SESSION['user']))?$_SESSION['user']:'';
//echo "<br>$user<br>";
$page = (isset($_GET['page']))?$_GET['page']:'home';
       
?>
<!DOCTYPE html>
<html>
<head>
	<title>TaskManager1.0.0</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/style.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<!-- Header добавление новой задачи и кнопка входа админа -->
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <span class="navbar-brand">Менеджер задач</span>
	    </div>
	    <ul class="nav navbar-nav">
	      <li><a href="index.php?page=newtask">Новая задача</a></li>
	    </ul>
	    <?php if ($user==''): ?>
	    	<div class="nav navbar-nav  navbar-right">
	    	<button id="adminbutton" class="btn btn-danger navbar-btn"><span class="glyphicon glyphicon-log-in"></span> Админ</button>
	    </div>
	  	<?php else: ?>
	  		<div class="nav navbar-nav  navbar-right">
	    	<a href="index.php?action=logout" class="btn btn-danger navbar-btn"><span class="glyphicon glyphicon-log-out"></span> Выход</a>
	    </div>
	    <?php endif ?>
	    
	  </div>
	</nav>
	<!-- Конец хедера -->
	<!-- Админ панель -->
	<form method="POST" action="" name="adminform" class="adminform col-md-3">
	  <div class="form-group">
	    <label for="username">Имя пользователя</label>
	    <input type="text" class="form-control" id="username" name="username">
	  </div>
	  <div class="form-group">
	    <label for="password">Пароль</label>
	    <input type="password" class="form-control" id="password" name="password">
	  </div>
	  <button type="submit" class="btn btn-default">Войти</button>
	</form>

	<!-- Страницы -->

		<?php if ($page=='home') {include 'views/home.php';} ?>
		<?php if ($page=='newtask') {include 'views/newtask.php';} ?>



	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script type="text/javascript">

		(function($, undefined){
  		$(function(){

  			//делаем вход в админрегистрацию исчезающим
	  			$('#adminbutton').on('click', function () {
	  				if ($('.adminform').is(':hidden')){
	  					$('.adminform').slideDown( "slow" );
	  				}
	  				else{
	  				$('.adminform').slideUp( "slow" );
	  				}
	  			});

  			/*$(function () {
  				//Находим ширину окна браузера
	  			var myWidth = $(window).width();
	  			//Находим какое количество задач будет выведено в каждом ряду
	  			var tasksInRow;
	  			if (myWidth<768) {tasksInRow = 1} 
	  			else if (myWidth>=768&&myWidth<992) {tasksInRow = 2}
	  			else if (myWidth>=992&&myWidth<1200) {tasksInRow = 3}
	  			else {tasksInRow = 4};
	  			console.log(tasksInRow);
	  			var n = $('.isrow').length;
	  			console.log(n);
	  			var multi = Math.floor(n/tasksInRow);
	  			for (var i = 1; i <= multi; i++) 
	  			{
	  				$("div[data-id="+(i*tasksInRow)+"]").addClass('row');
	  				console.log($("div[data-id="+(i*tasksInRow)+"]"));
	  			}

  			});*/
  	  });
		})(jQuery);
	</script>
</body>
</html>