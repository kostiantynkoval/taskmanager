	<!-- Менеджер задач -->
	<main>
		<div class="container">

			<!-- Запрос к БД и выборка всех строк в таблице задач -->
			<?php
				$set  		= (isset($_GET['set']))?$_GET['set']:"";
				require_once 'functions/model.php';
				switch ($set) {
					case '1':
						$res 	= $pdo->query("SELECT * FROM `taskmanager` ORDER BY `name`");
						break;
					case '2':
						$res 	= $pdo->query("SELECT * FROM `taskmanager` ORDER BY `email`");
						break;
					case '3':
						$res 	= $pdo->query("SELECT * FROM `taskmanager` ORDER BY `done`");
						break;
					default:
						$res 	= $pdo->query("SELECT * FROM `taskmanager`");
						break;
				}
				

				$i=0;
				//пока существуют задачи в БД будем прокручивать их по одной
				while ($task = $res->fetch()) 
				{
					?>
				  <div class="col-sm-6 col-md-4 col-lg-3">
				    <div class="thumbnail">
				      <img class="taskimage" src="<?php echo $task['image'] ?>" alt="Task1">
				      <div class="caption">
				        <h3><?php echo $task['name'] ?></h3>
				        <p><?php echo $task['email'] ?></p>
				        <p><?php echo $task['text'] ?></p>
				        <!-- Прячем кнопки Изменить/Удалить если не под админом -->
				        <?php if ($user=='admin'): ?>
				        	<p><a href="../index.php?page=edittask&id=<?php echo $task['id'] ?>" class="btn btn-primary" role="button">Изменить</a> <a href="../functions/deletetask.php?id=<?php echo $task['id'] ?>" class="btn btn-danger" role="button">Удалить</a></p>
				        <?php endif ?>
				      </div>
				    </div>
				    <!-- Определяем выполнена ли задача -->
							<?php if ($task['done']==1): ?>
				    <h4><span class="label label-success">Выполнено!</span></h4>
							<?php endif ?>
				  </div>
				  <div class="isrow" data-id="<?php echo $i; ?>"></div>
					<?php
					$i++;
				}
					?>

		</div>
	</main>
