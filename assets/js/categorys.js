document.addEventListener('DOMContentLoaded', () => {
    // Загрузка данных Номеров
    loadCategorys();
  
    // Обработчик клика на кнопке "Добавить клиента"
    document.getElementById('addCategoryBtn').addEventListener('click', () => {
      // Отображение формы добавления клиента
      const addCategoryModal = new bootstrap.Modal(document.getElementById('addCategoryModal'));
      addCategoryModal.show();
    });
  
    // Обработчик отправки формы добавления клиента
    document.getElementById('addCategoryForm').addEventListener('submit', (event) => {
      event.preventDefault();
      addCategory();
    });
  
    // Обработчик клика на кнопке "Редактировать"
    document.getElementById('categorysTableBody').addEventListener('click', (event) => {
      if (event.target.classList.contains('editCategoryBtn')) {
        const categoryId = event.target.dataset.categoryId;
        const categoryData = JSON.parse(event.target.dataset.categoryData);
  
        // Заполнение формы редактирования клиента
        document.getElementById('editCategoryId').value = categoryId;;
        document.getElementById('editName_of_category').value = categoryData.name_of_category;
        document.getElementById('editNumber_of_storeys').value = categoryData.number_of_storeys;
        document.getElementById('editSea_view').checked = categoryData.sea_view;
        document.getElementById('editClass').value = categoryData.class;

  
        // Отображение формы редактирования клиента
        const editCategoryModal = new bootstrap.Modal(document.getElementById('editCategoryModal'));
        editCategoryModal.show();
      }else if (event.target.classList.contains('deleteCategoryBtn')){
        const categoryId = event.target.dataset.categoryId;
        // console.log(category.category_id);
        if (confirm('Вы действительно хотите удалить этого клиента?')) {
            console.log(categoryId);
            deleteCategory(categoryId);
        }
      }
    });
  
    // Обработчик отправки формы редактирования клиента
    document.getElementById('editCategoryForm').addEventListener('submit', (event) => {
      event.preventDefault();
      updateCategory();
    });
  });
  
  function loadCategorys() {
    const category = 'froor';
    axios.get('/api/categorys', category)
      .then(response => {
        if (response.data.success) {
          // Отображение списка Номеров
          const categorysTableBody = document.getElementById('categorysTableBody');
          categorysTableBody.innerHTML = '';
          response.data.categorys.forEach(category => {
            const row = `
              <tr>
                <td>${category.category_id}</td>
                <td>${category.name_of_category}</td>
                <td>${category.number_of_storeys}</td>
                <td>${category.sea_view}</td>
                <td>${category.class}</td>
                <td>
                  <button type="button" class="btn btn-primary editCategoryBtn" data-category-id="${category.category_id}" data-category-data='${JSON.stringify(category)}'>Редактировать</button>
                  <button type="button" class="btn btn-danger deleteCategoryBtn" data-category-id="${category.category_id}">Удалить</button>
                </td>
              </tr>
            `;
            categorysTableBody.insertAdjacentHTML('beforeend', row);
          });
        } else {
          console.error('Ошибка при загрузке Номеров1:', response.data.message);
        }
      })
      .catch(error => {
        console.error('Ошибка при загрузке Номеров2:', error);
      });
  }
  
  function addCategory() {
    const categoryData = {
    //   category_id: document.getElementById('category_id').value,
      name_of_category: document.getElementById('name_of_category').value,
      number_of_storeys: document.getElementById('number_of_storeys').value,
      sea_view: document.getElementById('sea_view').checked ? true : false,
      class: document.getElementById('class').value
    };
  
    axios.post('/api/categorys/add', categoryData)
      .then(response => {
        if (response.data.success) {
          // Закрытие модального окна и обновление таблицы
          const addCategoryModal = bootstrap.Modal.getInstance(document.getElementById('addCategoryModal'));
          addCategoryModal.hide();
          loadCategorys();
        } else {
          console.error('Ошибка при добавлении клиента:', response.data.message);
        }
      })
      .catch(error => {
        console.error('Ошибка при добавлении клиента:', error);
      });
  }
  
  function updateCategory() {
    const categoryId = document.getElementById('editCategoryId').value;
    const categoryData = {
    //   category_id: document.getElementById('editСategory_id').value,
      name_of_category: document.getElementById('editName_of_category').value,
      number_of_storeys: document.getElementById('editNumber_of_storeys').value,
      sea_view: document.getElementById('editSea_view').checked ? true : false,
      class: document.getElementById('editClass').value
    };
  
    axios.put(`/api/categorys/${categoryId}`, categoryData)
      .then(response => {
        if (response.data.success) {
          // Закрытие модального окна и обновление таблицы
          const editCategoryModal = bootstrap.Modal.getInstance(document.getElementById('editCategoryModal'));
          editCategoryModal.hide();
          loadCategorys();
        } else {
          console.error('Ошибка при редактировании клиента:', response.data.message);
        }
      })
      .catch(error => {
        console.error('Ошибка при редактировании клиента:', error);
      });
  }
  
  function deleteCategory(categoryId) {
    console.log(categoryId);
    axios.delete(`/api/categorys/${categoryId}`)
      .then(response => {
        if (response.data.success) {
          // Обновление таблицы
          loadCategorys();
        } else {
          console.error('Ошибка при удалении номера:', response.data.message);
        }
      })
      .catch(error => {
        console.error('Ошибка при удалении номера:', error);
      });
  }