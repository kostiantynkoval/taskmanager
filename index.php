<?php
require_once 'functions/functions.php';
// сессия админа
session_start();
if (isset($_POST['username'])) {login();}
if (isset($_GET['action'])) 
	{
		unset($_SESSION['user']);
		header('Location: index.php');
	}
$user = (isset($_SESSION['user']))?$_SESSION['user']:'';
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
	      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Сортировать <span class="caret"></span></a>
          <ul class="dropdown-menu">
          		<!-- Кнопки сортировки элементов задачника -->
            <li><a href="index.php?page=home&set=1">по имени</a></li>
            <li><a href="index.php?page=home&set=2">по эл.почте</a></li>
            <li><a href="index.php?page=home&set=3">по статусу</a></li>
	    		</ul>
	    	</li>
	   	</ul>
	    <?php if ($user==''): ?>
	    	<!-- Админ или выход если админ залогинен -->
	    	<button id="adminbutton" class="btn btn-danger navbar-btn navbar-right"><span class="glyphicon glyphicon-log-in"></span> Админ</button>
	  	<?php else: ?>
	    	<a href="index.php?action=logout" class="btn btn-danger navbar-btn navbar-right"><span class="glyphicon glyphicon-log-out"></span> Выход</a>
	    
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
		<?php if ($page=='edittask') {include 'views/edittask.php';} ?>



	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="js/common.js"></script>
</body>
</html>