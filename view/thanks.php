<!DOCTYPE html>
<html>
	<head>
		<?php include 'blocks/head.php'; ?>
	</head>
	<body>
		<div class="wrapper">
			<nav class="navbar navbar-light bg-light">
				<a class="navbar-brand" href="<?php echo $baseurl; ?>">CL9 System</a>
			</nav>

			<header class="header py-4">
				<div class="container">
					Шапка
				</div>
			</header>
			
			<section class="section-0 py-3">
				<div class="container">
					<div class="card mb-4">
						<div class="card-body">
							<p>Для валидации используется плагин <a target="_blank" href="https://jqueryvalidation.org/">jqueryvalidation.org</a>. В двух словах: что бы
							валидация работала, нужно добавить соответствующим полям атрибут required и добавить кнопке класс:</p>
							<p>1) "send" (тут атрибут кнопки type="submit") - для отправки форм обычным путём с 
							перезагрузкой страницы и переходом на обработчик. Подходит для стандартных форм 
							с разных сервисов рассылки.</p>
							<p>2) "send-ajax" (тут атрибут кнопки type="button") - отправляет формус помощью 
							ajax без перезагрузки страницы. Отправка происходит на обработчик, указанный 
							в action формы.</p>
						</div>
					</div>
					
					<div class="card mb-4">
						<div class="card-body">
						
							<h4 class="mb-3">Пример вертикальной формы:</h4>
							
							<form method="post" enctype="multipart/form-data" action="./mailer/sender.php">
								<div class="row">
									<div class="col-md-12 mb-2">
										<input class="form-control" type="text" name="name" placeholder="Имя *" required data-msg-required="Введите Имя" />
									</div>
									<div class="col-md-12 mb-2">
										<input class="form-control" type="email" name="email" placeholder="Email *" required data-msg-required="Введите Email" />
									</div>
									<div class="col-md-12 mb-2">
										<textarea class="form-control" name="comm" placeholder="Вопрос *" required data-msg-required="Введите Вопрос" ></textarea>
									</div>
									<div class="col-md-12">
										<button type="button" class="btn btn-success send-ajax">Отправить</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					
					<div class="card">
						<div class="card-body">
							<h4 class="mb-3">Пример горизонтальной формы:</h4>
							
							<form method="post" enctype="multipart/form-data" action="./mailer/sender.php">
								<div class="row">
									<div class="col-md-4">
										<input class="form-control" type="text" name="name" placeholder="Имя *" required data-msg-required="Введите Имя" />
									</div>
									<div class="col-md-4">
										<input class="form-control" type="email" name="email" placeholder="Email *" required data-msg-required="Введите Email" />
									</div>
									<div class="col-md-4">
										<button type="button" class="btn btn-success send-ajax">Отправить</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>

			<footer class="footer bg-dark mt-5 py-4">
				<div class="container text-light">
					CL9 System. <?php echo date('Y'); ?> © Copyright
				</div>
			</footer>
		</div>
		
		<?php include 'blocks/scripts.php'; ?>
		
	</body>
</html>