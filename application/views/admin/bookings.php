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
  <h1>Бронирования</h1>
  <button type="button" class="btn btn-primary mb-3" id="addBookingBtn">Добавить Бронирование</button>
  <div class="input-group mb-3">
    <input type="text" class="form-control" id="filterInput" placeholder="Фильтровать бронирования...">
    <select class="form-select" id="sortSelect">
      <option value="1">Сортировать по ID бронирования</option>
      <option value="2">Сортировать по ID номера</option>
      <option value="3">Сортировать по ID клиента</option>
      ...
    </select>
  </div>
  <table class="table">
    <thead>
    <tr> <th>номер_брони</th> <td scope="col">номер_id</td> <th scope="col">id_клиента</th> <th scope="col">количество_гостей</th> <th scope="col">дата_заезда</th> <th scope="col">дата_выезда</th> <th scope="col">цена</th> <th scope="col">дата_бронирования</th> <th scope="col">завтрак</th> <th scope="col">Действия</th> </tr>
    </thead>
    <tbody id="bookingsTableBody">
    </tbody>
  </table>
</div>

<!-- Модальное окно для формы добавления клиента -->
<div class="modal fade" id="addBookingModal" tabindex="-1" aria-labelledby="addBookingModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addBookingModalLabel">Добавить Бронирование</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
      </div>
      <div class="modal-body">
        <form id="addBookingForm">
          <div class="mb-3">
            <label for="number_id" class="form-label">Номер</label>
            <input type="number" class="form-control" id="number_id" required>
          </div>
          <div class="mb-3">
            <label for="client_id" class="form-label">Клиент</label>
            <input type="number" class="form-control" id="client_id" required>
          </div>
          <div class="mb-3">
            <label for="number_of_guests" class="form-label">Количество гостей</label>
            <input type="number" class="form-control" id="number_of_guests" required>
          </div>
          <div class="mb-3">
            <label for="data_in" class="form-label">Дата заезда</label>
            <input type="date" class="form-control" id="data_in" required>
          </div>
          <div class="mb-3">
            <label for="data_out" class="form-label">Дата выезда</label>
            <input type="date" class="form-control" id="data_out" required>
          </div>
          <div class="mb-3">
            <label for="price" class="form-label">Цена</label>
            <input type="number" class="form-control" id="price" required>
          </div>
          <div class="mb-3">
            <label for="data_booking" class="form-label">Дата бронирования</label>
            <input type="date" class="form-control" id="data_booking" required>
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="breakfast">
            <label class="form-check-label" for="breakfast">Завтрак</label>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button type="submit" class="btn btn-primary" id="saveBookingBtn">Сохранить</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Модальное окно для формы редактирования клиента -->
<div class="modal fade" id="editBookingModal" tabindex="-1" aria-labelledby="editBookingModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editBookingModalLabel">Редактировать Бронирование</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
      </div>
      <div class="modal-body">
        <form id="editBookingForm">
          <input type="hidden" id="editBooking_id">
          <div class="mb-3">
            <label for="editNumber_id" class="form-label">Номер</label>
            <input type="number" class="form-control" id="editNumber_id" required>
          </div>
          <div class="mb-3">
            <label for="editClient_id" class="form-label">Клиент</label>
            <input type="number" class="form-control" id="editClient_id" required>
          </div>
          <div class="mb-3">
            <label for="editNumber_of_guests" class="form-label">Количество гостей</label>
            <input type="number" class="form-control" id="editNumber_of_guests" required>
          </div>
          <div class="mb-3">
            <label for="editData_in" class="form-label">Дата заезда</label>
            <input type="date" class="form-control" id="editData_in" required>
          </div>
          <div class="mb-3">
            <label for="editData_out" class="form-label">Дата выезда</label>
            <input type="date" class="form-control" id="editData_out" required>
          </div>
          <div class="mb-3">
            <label for="editPrice" class="form-label">Цена</label>
            <input type="number" class="form-control" id="editPrice" required>
          </div>
          <div class="mb-3">
            <label for="editData_booking" class="form-label">Дата бронирования</label>
            <input type="date" class="form-control" id="editData_booking" required>
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="editBreakfast">
            <label class="form-check-label" for="breakfast">Завтрак</label>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="deleteBookingBtn">удаление</button> -->
        <button type="submit" class="btn btn-primary" id="updateBookingBtn">Сохранить</button>
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
	<script src="/assets/js/bookings.js"></script>
</body>