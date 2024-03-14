document.addEventListener('DOMContentLoaded', () => {
    // Загрузка данных клиентов
    loadClients();
  
    // Обработчик клика на кнопке "Добавить клиента"
    document.getElementById('addClientBtn').addEventListener('click', () => {
      // Отображение формы добавления клиента
      const addClientModal = new bootstrap.Modal(document.getElementById('addClientModal'));
      addClientModal.show();
    });
  
    // Обработчик отправки формы добавления клиента
    document.getElementById('addClientForm').addEventListener('submit', (event) => {
      event.preventDefault();
      addClient();
    });
  
    // Обработчик клика на кнопке "Редактировать"
    document.getElementById('clientsTableBody').addEventListener('click', (event) => {
      if (event.target.classList.contains('editClientBtn')) {
        const clientId = event.target.dataset.clientId;
        const clientData = JSON.parse(event.target.dataset.clientData);
  
        // Заполнение формы редактирования клиента
        document.getElementById('editClientId').value = clientId;
        document.getElementById('editSurname').value = clientData.surname;
        document.getElementById('editName').value = clientData.name;
        document.getElementById('editPatronymic').value = clientData.patronymic;
        document.getElementById('editAge').value = clientData.age;
        document.getElementById('editPhoneNumber').value = clientData.phone_number;
        document.getElementById('editEmail').value = clientData.email;
        document.getElementById('editPassword').value = clientData.password;
  
        // Отображение формы редактирования клиента
        const editClientModal = new bootstrap.Modal(document.getElementById('editClientModal'));
        editClientModal.show();
      }else if (event.target.classList.contains('deleteClientBtn')){
        const clientId = event.target.dataset.clientId;

        if (confirm('Вы действительно хотите удалить этого клиента?')) {
            deleteClient(clientId);
        }
      }
    });
  
    // Обработчик отправки формы редактирования клиента
    document.getElementById('editClientForm').addEventListener('submit', (event) => {
      event.preventDefault();
      updateClient();
    });
  });
  
  function loadClients() {
    axios.get('/api/clients')
      .then(response => {
        if (response.data.success) {
          // Отображение списка клиентов
          const clientsTableBody = document.getElementById('clientsTableBody');
          clientsTableBody.innerHTML = '';
          response.data.clients.forEach(client => {
            const row = `
              <tr>
                <td>${client.client_id}</td>
                <td>${client.surname}</td>
                <td>${client.name}</td>
                <td>${client.patronymic}</td>
                <td>${client.age}</td>
                <td>${client.phone_number}</td>
                <td>${client.email}</td>
                <td>${client.password}</td>
                <td>
                  <button type="button" class="btn btn-primary editClientBtn" data-client-id="${client.client_id}" data-client-data='${JSON.stringify(client)}'>Редактировать</button>
                  <button type="button" class="btn btn-danger deleteClientBtn" data-client-id="${client.client_id}">Удалить</button>
                </td>
              </tr>
            `;
            clientsTableBody.insertAdjacentHTML('beforeend', row);
          });
        } else {
          console.error('Ошибка при загрузке клиентов:', response.data.message);
        }
      })
      .catch(error => {
        console.error('Ошибка при загрузке клиентов:', error);
      });
  }
  
  function addClient() {
    // const clientData = {
    //   surname: document.getElementById('surname').value,
    //   name: document.getElementById('name').value,
    //   patronymic: document.getElementById('patronymic').value,
    //   age: document.getElementById('age').value,
    //   phone_number: document.getElementById('phone_number').value,
    //   email: document.getElementById('email').value
    // };
    const clientData = [
      document.getElementById('phone_number').value,
      document.getElementById('name').value,
      document.getElementById('surname').value,
      document.getElementById('patronymic').value,
      document.getElementById('email').value,
      document.getElementById('age').value,
      document.getElementById('password').value
    ];
    // const clientData2 = {
    //   password: document.getElementById('password').value,
    //   email: document.getElementById('email').value,
    // };
    // axios.post('/api/clients/log_info/add', clientData2);
    axios.post('/api/clients/add', clientData)
      .then(response => {
        if (response.data.success) {
          // Закрытие модального окна и обновление таблицы
          const addClientModal = bootstrap.Modal.getInstance(document.getElementById('addClientModal'));
          addClientModal.hide();
          loadClients();
        } else {
          console.error('Ошибка при добавлении клиента:', response.data.message);
        }
      })
      .catch(error => {
        console.error('Ошибка при добавлении клиента:', error);
      });
  }
  
  function updateClient() {
    const clientId = document.getElementById('editClientId').value;
    const clientData = {
      surname: document.getElementById('editSurname').value,
      name: document.getElementById('editName').value,
      patronymic: document.getElementById('editPatronymic').value,
      age: document.getElementById('editAge').value,
      phone_number: document.getElementById('editPhoneNumber').value,
      email: document.getElementById('editEmail').value,
      password: document.getElementById('editPassword').value
    };
  
    axios.put(`/api/clients/${clientId}`, clientData)
      .then(response => {
        if (response.data.success) {
          // Закрытие модального окна и обновление таблицы
          const editClientModal = bootstrap.Modal.getInstance(document.getElementById('editClientModal'));
          editClientModal.hide();
          loadClients();
        } else {
          console.error('Ошибка при редактировании клиента:', response.data.message);
        }
      })
      .catch(error => {
        console.error('Ошибка при редактировании клиента:', error);
      });
  }

  function deleteClient(clientId) {
    // console.log("clientId: ");
    // console.log(clientId);
    axios.delete(`/api/clients/${clientId}`)
      .then(response => {
        if (response.data.success) {
          // Обновление таблицы
          loadClients();
        } else {
          console.error('Ошибка при удалении клиента1:', response.data.message);
        }
      })
      .catch(error => {
        console.error('Ошибка при удалении клиента2:', error);
      });
  }