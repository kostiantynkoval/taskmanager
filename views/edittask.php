<?php
$id   = (isset($_GET['id']))?$_GET['id']:"";

require_once 'functions/model.php';
$res  = $pdo->query("SELECT `text`, `done` FROM `taskmanager` WHERE `id`= ".$id." LIMIT 1");
$task = $res->fetch();
?>
<div class="container">
	<form method="POST" action="../functions/save_changes_to_db.php">
	  <div class="form-group">
	    <label for="text">Содержание задачи</label>
	    <textarea class="form-control" name="text" id="text" rows="3"><?php echo $task['text']; ?></textarea>
	  </div>
	  <div class="checkbox">
	    <label><input type="checkbox" name=done <?php echo(($task['done']=="1")?"checked":""); ?>>Выполнено</label>
	  </div>
	  <input type="hidden" name="id" value="<?php echo $id; ?>">
	  <button type="submit" class="btn btn-primary">Изменить</button>
	   <a href="../index.php" class="btn btn-warning" role="button">Назад</a>
	</form>
</div>