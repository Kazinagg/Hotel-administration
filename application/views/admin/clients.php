<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Админ-панель - Бронирования</title>
	<!-- Подключение Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">

	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl7/1L_dstPt3HV5HzF6Gvk/e3s4WzCI6w7cmDA6j6" crossorigin="anonymous"> -->
	<!-- Подключение иконок Bootstrap Icons -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<div class="container mt-3">
  <h1>Клиенты</h1>
  <button type="button" class="btn btn-primary mb-3" id="addClientBtn">Добавить клиента</button>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Фамилия</th>
        <th scope="col">Имя</th>
        <th scope="col">Отчество</th>
        <th scope="col">Возраст</th>
        <th scope="col">Телефон</th>
        <th scope="col">Email</th>
        <th scope="col">Пароль</th>
        <th scope="col">Действия</th>
      </tr>
    </thead>
    <tbody id="clientsTableBody">
    </tbody>
  </table>
</div>

<!-- Модальное окно для формы добавления клиента -->
<div class="modal fade" id="addClientModal" tabindex="-1" aria-labelledby="addClientModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addClientModalLabel">Добавить клиента</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
      </div>
      <div class="modal-body">
        <form id="addClientForm">
          <div class="mb-3">
            <label for="surname" class="form-label">Фамилия</label>
            <input type="text" class="form-control" id="surname" required>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input type="text" class="form-control" id="name" required>
          </div>
          <div class="mb-3">
            <label for="patronymic" class="form-label">Отчество</label>
            <input type="text" class="form-control" id="patronymic">
          </div>
          <div class="mb-3">
            <label for="age" class="form-label">Возраст</label>
            <input type="number" class="form-control" id="age" required>
          </div>
          <div class="mb-3">
            <label for="phone_number" class="form-label">Телефон</label>
            <input type="number" class="form-control" id="phone_number" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input type="text" class="form-control" id="password" required>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button type="submit" class="btn btn-primary" id="saveClientBtn">Сохранить</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Модальное окно для формы редактирования клиента -->
<div class="modal fade" id="editClientModal" tabindex="-1" aria-labelledby="editClientModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editClientModalLabel">Редактировать клиента</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
      </div>
      <div class="modal-body">
        <form id="editClientForm">
          <input type="hidden" id="editClientId">
          <div class="mb-3">
            <label for="editSurname" class="form-label">Фамилия</label>
            <input type="text" class="form-control" id="editSurname" required>
          </div>
          <div class="mb-3">
            <label for="editName" class="form-label">Имя</label>
            <input type="text" class="form-control" id="editName" required>
          </div>
          <div class="mb-3">
            <label for="editPatronymic" class="form-label">Отчество</label>
            <input type="text" class="form-control" id="editPatronymic">
          </div>
          <div class="mb-3">
            <label for="editAge" class="form-label">Возраст</label>
            <input type="number" class="form-control" id="editAge" required>
          </div>
          <div class="mb-3">
            <label for="editPhoneNumber" class="form-label">Телефон</label>
            <input type="number" class="form-control" id="editPhoneNumber" required>
          </div>
          <div class="mb-3">
            <label for="editEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="editEmail" required>
          </div>
          <div class="mb-3">
            <label for="editPassword" class="form-label">Password</label>
            <input type="text" class="form-control" id="editPassword" required>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="deleteClientBtn">удаление</button>
        <button type="submit" class="btn btn-primary" id="updateClientBtn">Сохранить</button>
      </div>
      </form>
    </div>
  </div>
</div>
	<!-- Подключение Bootstrap 5 JavaScript и зависимостей -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"  crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"  crossorigin="anonymous"></script>
	<!-- Подключение Axios -->
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
	<!-- Подключение основного скрипта -->
	<script src="/assets/js/clients.js"></script>
</body>