document.addEventListener('DOMContentLoaded', () => {
    // Загрузка данных Номеров
    loadFloors();
  
    // Обработчик клика на кнопке "Добавить клиента"
    document.getElementById('addFloorBtn').addEventListener('click', () => {
      // Отображение формы добавления клиента
      const addFloorModal = new bootstrap.Modal(document.getElementById('addFloorModal'));
      addFloorModal.show();
    });
  
    // Обработчик отправки формы добавления клиента
    document.getElementById('addFloorForm').addEventListener('submit', (event) => {
      event.preventDefault();
      addFloor();
    });
  
    // Обработчик клика на кнопке "Редактировать"
    document.getElementById('floorsTableBody').addEventListener('click', (event) => {
      if (event.target.classList.contains('editFloorBtn')) {
        const floorId = event.target.dataset.floorId;
        const floorData = JSON.parse(event.target.dataset.floorData);
  
        // Заполнение формы редактирования клиента
        document.getElementById('editFloorId').value = floorId;
        document.getElementById('editNumber_of_rooms').value = floorData.number_of_rooms;
        document.getElementById('editBuffet').checked = floorData.buffet;
  
        // Отображение формы редактирования клиента
        const editFloorModal = new bootstrap.Modal(document.getElementById('editFloorModal'));
        editFloorModal.show();
      }else if (event.target.classList.contains('deleteFloorBtn')){
        const floorId = event.target.dataset.floorId;
        // console.log(floor.floor_id);
        if (confirm('Вы действительно хотите удалить этого клиента?')) {
            console.log(floorId);
            deleteFloor(floorId);
        }
      }
    });
  
    // Обработчик отправки формы редактирования клиента
    document.getElementById('editFloorForm').addEventListener('submit', (event) => {
      event.preventDefault();
      updateFloor();
    });
  });
  
  function loadFloors() {
    const floor = 'froor';
    axios.get('/api/floors', floor)
      .then(response => {
        if (response.data.success) {
          // Отображение списка Номеров
          const floorsTableBody = document.getElementById('floorsTableBody');
          floorsTableBody.innerHTML = '';
          response.data.floors.forEach(floor => {
            const row = `
              <tr>
                <td>${floor.floor_id}</td>
                <td>${floor.number_of_rooms}</td>
                <td>${floor.buffet ? 'Да' : 'Нет'}</td>
                <td>
                  <button type="button" class="btn btn-primary editFloorBtn" data-floor-id="${floor.floor_id}" data-floor-data='${JSON.stringify(floor)}'>Редактировать</button>
                  <button type="button" class="btn btn-danger deleteFloorBtn" data-floor-id="${floor.floor_id}">Удалить</button>
                </td>
              </tr>
            `;
            floorsTableBody.insertAdjacentHTML('beforeend', row);
          });
        } else {
          console.error('Ошибка при загрузке Номеров1:', response.data.message);
        }
      })
      .catch(error => {
        console.error('Ошибка при загрузке Номеров2:', error);
      });
  }
  
  function addFloor() {
    const floorData = {
        number_of_rooms: document.getElementById('number_of_rooms').value,
        buffet: document.getElementById('buffet').checked ? true : false
    };
  
    axios.post('/api/floors/add', floorData)
      .then(response => {
        if (response.data.success) {
          // Закрытие модального окна и обновление таблицы
          const addFloorModal = bootstrap.Modal.getInstance(document.getElementById('addFloorModal'));
          addFloorModal.hide();
          loadFloors();
        } else {
          console.error('Ошибка при добавлении клиента:', response.data.message);
        }
      })
      .catch(error => {
        console.error('Ошибка при добавлении клиента:', error);
      });
  }
  
  function updateFloor() {
    const floorId = document.getElementById('editFloorId').value;
    const floorData = {
      number_of_rooms: document.getElementById('editNumber_of_rooms').value,
      buffet: document.getElementById('editBuffet').checked ? true : false
    };
  
    axios.put(`/api/floors/${floorId}`, floorData)
      .then(response => {
        if (response.data.success) {
          // Закрытие модального окна и обновление таблицы
          const editFloorModal = bootstrap.Modal.getInstance(document.getElementById('editFloorModal'));
          editFloorModal.hide();
          loadFloors();
        } else {
          console.error('Ошибка при редактировании клиента:', response.data.message);
        }
      })
      .catch(error => {
        console.error('Ошибка при редактировании клиента:', error);
      });
  }
  
  function deleteFloor(floorId) {
    console.log(floorId);
    axios.delete(`/api/floors/${floorId}`)
      .then(response => {
        if (response.data.success) {
          // Обновление таблицы
          loadFloors();
        } else {
          console.error('Ошибка при удалении номера:', response.data.message);
        }
      })
      .catch(error => {
        console.error('Ошибка при удалении номера:', error);
      });
  }