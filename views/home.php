	<!-- Менеджер задач -->
	<main>
		<div class="container">

			<!-- Запрос к БД и выборка всех строк в таблице задач -->
			<?php
				require_once 'functions/model.php';

				$res 	= $pdo->query("SELECT * FROM taskmanager");

				$i=0;
				//пока существуют задачи в БД будем прокручивать их по одной
				while ($task = $res->fetch()) 
				{
					?>
				  <div class="col-sm-6 col-md-4 col-lg-3">
				    <div class="thumbnail">
				      <img src="<?php echo $task['image'] ?>" alt="Task1">
				      <div class="caption">
				        <h3><?php echo $task['name'] ?></h3>
				        <p><?php echo $task['email'] ?></p>
				        <p><?php echo $task['text'] ?></p>
				        <!-- Прячем кнопки Изменить/Удалить если не под админом -->
				        <?php if ($user=='admin'): ?>
				        	<p><a href="#" class="btn btn-primary" role="button">Изменить</a> <a href="#" class="btn btn-danger" role="button">Удалить</a></p>
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
