<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Админ-панель - Добро пожаловать</title>
	<!-- Подключение Bootstrap 5 CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl7/1L_dstPt3HV5HzF6Gvk/e3s4WzCI6w7cmDA6j6" crossorigin="anonymous"> -->
	<!-- Подключение иконок Bootstrap Icons -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
	<div class="container mt-5">
		<h1 class="mb-4">Добро пожаловать в админ-панель сайта бронирования номеров гостиницы</h1>
		<p class="lead">Здесь вы можете управлять бронированиями, номерами и клиентами.</p>
		<div class="list-group mt-4">
			<a href="/admin/bookings" class="list-group-item list-group-item-action">
				<i class="bi bi-calendar-check"></i> Бронирования
			</a>
			<a href="/admin/number" class="list-group-item list-group-item-action">
				<i class="bi bi-door-open"></i> Номера
			</a>
			<a href="/admin/clients" class="list-group-item list-group-item-action">
				<i class="bi bi-people"></i> Клиенты
			</a>
		</div>
	</div>

	<!-- Подключение Bootstrap 5 JavaScript и зависимостей -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"  crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"  crossorigin="anonymous"></script>
</body>
</html>