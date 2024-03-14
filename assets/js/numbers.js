document.addEventListener('DOMContentLoaded', () => {
  // Загрузка данных Номеров
  loadNumbers();

  // Обработчик клика на кнопке "Добавить клиента"
  document.getElementById('addNumberBtn').addEventListener('click', () => {
    // Отображение формы добавления клиента
    const addNumberModal = new bootstrap.Modal(document.getElementById('addNumberModal'));
    addNumberModal.show();
  });

  // Обработчик отправки формы добавления клиента
  document.getElementById('addNumberForm').addEventListener('submit', (event) => {
    event.preventDefault();
    addNumber();
  });

  // Обработчик клика на кнопке "Редактировать"
  document.getElementById('numbersTableBody').addEventListener('click', (event) => {
    if (event.target.classList.contains('editNumberBtn')) {
      const numberId = event.target.dataset.numberId;
      const numberData = JSON.parse(event.target.dataset.numberData);

      // Заполнение формы редактирования клиента
      document.getElementById('editNumberId').value = numberId;
      document.getElementById('editCategory_id').value = numberData.category_id;
      document.getElementById('editCapacity').value = numberData.capacity;
      document.getElementById('editPrice_per_day').value = numberData.price_per_day;
      document.getElementById('editFloor_id').value = numberData.floor_id;

      // Отображение формы редактирования клиента
      const editNumberModal = new bootstrap.Modal(document.getElementById('editNumberModal'));
      editNumberModal.show();
    }else if (event.target.classList.contains('deleteNumberBtn')){
      const numberId = event.target.dataset.numberId;
      // console.log(number.number_id);
      if (confirm('Вы действительно хотите удалить этого клиента?')) {
          console.log(numberId);
          deleteNumber(numberId);
      }
    }
  });

  // Обработчик отправки формы редактирования клиента
  document.getElementById('editNumberForm').addEventListener('submit', (event) => {
    event.preventDefault();
    updateNumber();
  });
});

function loadNumbers() {
  axios.get('/api/numbers')
    .then(response => {
      if (response.data.success) {
        // Отображение списка Номеров
        const numbersTableBody = document.getElementById('numbersTableBody');
        numbersTableBody.innerHTML = '';
        response.data.numbers.forEach(number => {
          const row = `
            <tr>
              <td>${number.number_id}</td>
              <td>${number.category_id}</td>
              <td>${number.capacity}</td>
              <td>${number.price_per_day}</td>
              <td>${number.floor_id}</td>
              <td>
                <button type="button" class="btn btn-primary editNumberBtn" data-number-id="${number.number_id}" data-number-data='${JSON.stringify(number)}'>Редактировать</button>
                <button type="button" class="btn btn-danger deleteNumberBtn" data-number-id="${number.number_id}">Удалить</button>
              </td>
            </tr>
          `;
          numbersTableBody.insertAdjacentHTML('beforeend', row);
        });
      } else {
        console.error('Ошибка при загрузке Номеров1:', response.data.message);
      }
    })
    .catch(error => {
      console.error('Ошибка при загрузке Номеров2:', error);
    });
}

function addNumber() {
  const numberData = {
    category_id: document.getElementById('category_id').value,
    capacity: document.getElementById('capacity').value,
    price_per_day: document.getElementById('price_per_day').value,
    floor_id: document.getElementById('floor_id').value,
  };

  axios.post('/api/numbers/add', numberData)
    .then(response => {
      if (response.data.success) {
        // Закрытие модального окна и обновление таблицы
        const addNumberModal = bootstrap.Modal.getInstance(document.getElementById('addNumberModal'));
        addNumberModal.hide();
        loadNumbers();
      } else {
        console.error('Ошибка при добавлении клиента:', response.data.message);
      }
    })
    .catch(error => {
      console.error('Ошибка при добавлении клиента:', error);
    });
}

function updateNumber() {
  const numberId = document.getElementById('editNumberId').value;
  const numberData = {
    category_id: document.getElementById('editCategory_id').value,
    capacity: document.getElementById('editCapacity').value,
    price_per_day: document.getElementById('editPrice_per_day').value,
    floor_id: document.getElementById('editFloor_id').value,
  };

  axios.put(`/api/numbers/${numberId}`, numberData)
    .then(response => {
      if (response.data.success) {
        // Закрытие модального окна и обновление таблицы
        const editNumberModal = bootstrap.Modal.getInstance(document.getElementById('editNumberModal'));
        editNumberModal.hide();
        loadNumbers();
      } else {
        console.error('Ошибка при редактировании клиента:', response.data.message);
      }
    })
    .catch(error => {
      console.error('Ошибка при редактировании клиента:', error);
    });
}

function deleteNumber(numberId) {
  console.log(numberId);
  axios.delete(`/api/numbers/${numberId}`)
    .then(response => {
      if (response.data.success) {
        // Обновление таблицы
        loadNumbers();
      } else {
        console.error('Ошибка при удалении номера:', response.data.message);
      }
    })
    .catch(error => {
      console.error('Ошибка при удалении номера:', error);
    });
}