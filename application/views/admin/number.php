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
  <h1>Номера</h1>
  <button type="button" class="btn btn-primary mb-3" id="addNumberBtn">Добавить номер</button>
  <table class="table">
    <thead>
      <tr>
        <td scope="col">ID номера</td>
        <td scope="col">ID категории</td>
        <td scope="col">Вместимость</td>
        <td scope="col">Цена за день</td>
        <td scope="col">ID этажа</td>
        <th scope="col">Действия</th>
      </tr>
    </thead>
    <tbody id="numbersTableBody">
    </tbody>
  </table>
</div>

<div class="container mt-3">
  <h1>Этажи</h1>
  <button type="button" class="btn btn-primary mb-3" id="addFloorBtn">Добавить этаж</button>
  <table class="table" id="floor">
    <thead>
      <tr>
        <td scope="col">ID этажа</td>
        <td scope="col">Количество комнат</td>
        <td scope="col">Буфет</td>
        <th scope="col">Действия</th>
      </tr>
    </thead>
    <tbody id="floorsTableBody">
    </tbody>
  </table>
</div>

<div class="container mt-3">
  <h1>Категории</h1>
  <button type="button" class="btn btn-primary mb-3" id="addCategoryBtn">Добавить категорию</button>
  <table class="table">
    <thead>
      <tr>
        <td scope="col">ID категории</td>
        <td scope="col">Название категории</td>
        <td scope="col">Количество этажей</td>
        <td scope="col">Вид на море</td>
        <td scope="col">Класс</td>
        <th scope="col">Действия</th>
      </tr>
    </thead>
    <tbody id="categorysTableBody">
    </tbody>
  </table>
</div>

<!-- Модальное окно для формы добавления клиента -->
<div class="modal fade" id="addNumberModal" tabindex="-1" aria-labelledby="addNumberModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addNumberModalLabel">Добавить номер</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
      </div>
      <div class="modal-body">
        <form id="addNumberForm">
          <div class="mb-3">
            <label for="category_id" class="form-label">id категории</label>
            <input type="number" class="form-control" id="category_id" required>
          </div>
          <div class="mb-3">
            <label for="capacity" class="form-label">вместительность</label>
            <input type="number" class="form-control" id="capacity" required>
          </div>
          <div class="mb-3">
            <label for="price_per_day" class="form-label">цена за день</label>
            <input type="number" class="form-control" id="price_per_day" required>
          </div>
          <div class="mb-3">
            <label for="floor_id" class="form-label">id этажа</label>
            <input type="number" class="form-control" id="floor_id" required>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button type="submit" class="btn btn-primary" id="saveNumberBtn">Сохранить</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Модальное окно для формы редактирования клиента -->
<div class="modal fade" id="editNumberModal" tabindex="-1" aria-labelledby="editNumberModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editNumberModalLabel">Редактировать номер</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
      </div>
      <div class="modal-body">
        <form id="editNumberForm">
          <input type="hidden" id="editNumberId">
          <div class="mb-3">
            <label for="editCategory_id" class="form-label">id категории</label>
            <input type="number" class="form-control" id="editCategory_id" required>
          </div>
          <div class="mb-3">
            <label for="editCapacity" class="form-label">вместительность</label>
            <input type="number" class="form-control" id="editCapacity" required>
          </div>
          <div class="mb-3">
            <label for="editPrice_per_day" class="form-label">цена за день</label>
            <input type="number" class="form-control" id="editPrice_per_day" required>
          </div>
          <div class="mb-3">
            <label for="editFloor_id" class="form-label">id этажа</label>
            <input type="number" class="form-control" id="editFloor_id" required>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="deleteNumberBtn">удаление</button> -->
        <button type="submit" class="btn btn-primary" id="updateNumberBtn">Сохранить</button>
      </div>
      </form>
    </div>
  </div>
</div>










<div class="modal fade" id="addFloorModal" tabindex="-1" aria-labelledby="addFloorModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addFloorModalLabel">Добавить этаж</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
      </div>
      <div class="modal-body">
        <form id="addFloorForm">
          <div class="mb-3">
            <label for="number_of_rooms" class="form-label">количество номеров</label>
            <input type="number" class="form-control" id="number_of_rooms" required>
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="buffet">
            <label class="form-check-label" for="buffet">буфет</label>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button type="submit" class="btn btn-primary" id="saveFloorBtn">Сохранить</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Модальное окно для формы редактирования клиента -->
<div class="modal fade" id="editFloorModal" tabindex="-1" aria-labelledby="editFloorModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editFloorModalLabel">Редактировать этаж</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
      </div>
      <div class="modal-body">
        <form id="editFloorForm">
          <input type="hidden" id="editFloorId">
          <div class="mb-3">
            <label for="editNumber_of_rooms" class="form-label">количество номеров</label>
            <input type="number" class="form-control" id="editNumber_of_rooms" required>
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="editBuffet">
            <label class="form-check-label" for="buffet">Буфет</label>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="deleteFloorBtn">удаление</button> -->
        <button type="submit" class="btn btn-primary" id="updateFloorBtn">Сохранить</button>
      </div>
      </form>
    </div>
  </div>
</div>














<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addCategoryModalLabel">Добавить категорию</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
      </div>
      <div class="modal-body">
        <form id="addCategoryForm">
          <div class="mb-3">
            <label for="name_of_category" class="form-label">Имя категории</label>
            <input type="text" class="form-control" id="name_of_category" required>
          </div>
          <div class="mb-3">
            <label for="number_of_storeys" class="form-label">количество этажей</label>
            <input type="number" class="form-control" id="number_of_storeys" required>
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="sea_view">
            <label class="form-check-label" for="sea_view">Вид на море</label>
          </div>
          <div class="mb-3">
            <label for="class" class="form-label">Класс</label>
            <input type="number" class="form-control" id="class" required>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button type="submit" class="btn btn-primary" id="saveCategoryBtn">Сохранить</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Модальное окно для формы редактирования клиента -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editCategoryModalLabel">Редактировать категорию</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
      </div>
      <div class="modal-body">
        <form id="editCategoryForm">
          <input type="hidden" id="editCategoryId">
          <div class="mb-3">
            <label for="editName_of_category" class="form-label">Имя категории</label>
            <input type="text" class="form-control" id="editName_of_category" required>
          </div>
          <div class="mb-3">
            <label for="editNumber_of_storeys" class="form-label">количество этажей</label>
            <input type="number" class="form-control" id="editNumber_of_storeys" required>
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="editSea_view">
            <label class="form-check-label" for="sea_view">Вид на море</label>
          </div>
          <div class="mb-3">
            <label for="editClass" class="form-label">Класс</label>
            <input type="number" class="form-control" id="editClass" required>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="deleteCategoryBtn">удаление</button> -->
        <button type="submit" class="btn btn-primary" id="updateCategoryBtn">Сохранить</button>
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
	<script src="/assets/js/numbers.js"></script>
  <script src="/assets/js/floors.js"></script>
  <script src="/assets/js/categorys.js"></script>
</body>