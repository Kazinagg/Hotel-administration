// document.addEventListener('DOMContentLoaded', () => {
// 	// Загрузка данных бронирований
// 	loadBookings();
  
// 	// Обработчик клика на кнопке "Добавить бронирование"
// 	document.getElementById('addBookingBtn').addEventListener('click', () => {
// 	  // Отображение формы добавления бронирования
// 	  const addBookingModal = new bootstrap.Modal(document.getElementById('addBookingModal'));
// 	  addBookingModal.show();
// 	});
  
// 	// Обработчик отправки формы добавления бронирования
// 	document.getElementById('addBookingForm').addEventListener('submit', (event) => {
// 	  event.preventDefault();
// 	  addBooking();
// 	});

// 	document.getElementById('updateBookingBtn').addEventListener('click', () => {
// 		// Отправка формы редактирования бронирования
// 		updateBooking();
// 	  });
//   });
  

// function loadBookings() {
// 	// console.log("sdfghjk")
// 	axios.get('/api/bookings')
// 		.then(response => {
// 			const bookings = response.data;
// 			const tableBody = document.querySelector('#bookingsTable tbody');
// 			tableBody.innerHTML = '';

// 			bookings.forEach(booking => {
// 				const row = document.createElement('tr');

// 				Object.keys(booking).forEach(key => {
// 					const cell = document.createElement('td');
// 					cell.textContent = booking[key];
// 					row.appendChild(cell);
// 				});

// 				const actionsCell = document.createElement('td');
// 				const editBtn = document.createElement('button');
// 				const deleteBtn = document.createElement('button');
// 				editBtn.textContent = 'Изменить';
// 				editBtn.classList.add('btn', 'btn-sm', 'btn-warning', 'me-2');
// 				editBtn.addEventListener('click', () => {
// 					// Здесь добавьте код для отображения формы редактирования бронирования
// 					showEditBookingForm(booking);
// 				});

// 				deleteBtn.textContent = 'удалить';
// 				deleteBtn.classList.add('btn', 'btn-sm', 'btn-danger', 'me-2');
// 				deleteBtn.addEventListener('click', () => {
// 					// Здесь добавьте код для отображения формы удаления бронирования
// 					deleteClient(booking);
// 				});

// 				actionsCell.appendChild(editBtn);
// 				actionsCell.appendChild(deleteBtn);
// 				row.appendChild(actionsCell);

// 				tableBody.appendChild(row);
// 			});
// 		})
// 		.catch(error => {
// 			console.error('Ошибка при загрузке данных бронирований:', error.response.data);
// 		});
// }
// function addBooking() {
// 	console.log(document.getElementById('number_id').value)
// 	const bookingData = {
// 	  number_id: document.getElementById('number_id').value,
// 	  client_id: document.getElementById('client_id').value,
// 	  number_of_guests: document.getElementById('number_of_guests').value,
// 	  data_in: document.getElementById('data_in').value,
// 	  data_out: document.getElementById('data_out').value,
// 	  price: document.getElementById('price').value,
// 	  data_booking: document.getElementById('data_booking').value,
// 	  breakfast: document.getElementById('breakfast').checked ? 1 : 0
// 	};
  
// 	axios.post('/api/add_booking', bookingData)
// 	  .then(response => {
// 		if (response.data.success) {
// 		  // Закрытие модального окна и обновление таблицы
// 		  const addBookingModal = bootstrap.Modal.getInstance(document.getElementById('addBookingModal'));
// 		  addBookingModal.hide();
// 		  loadBookings();
// 		} else {
// 		  console.error('Ошибка при добавлении бронирования:', response.data.message);
// 		}
// 	  })
// 	  .catch(error => {
// 		console.error('Ошибка при добавлении бронирования:', error);
// 	  });
//   }

//   function showEditBookingForm(booking) {
// 	console.log("Заполнение формы редактирования данными бронирования");
// 	document.getElementById('editBookingId').value = booking.booking_id;
// 	document.getElementById('editNumberId').value = booking.number_id;
// 	document.getElementById('editClientId').value = booking.client_id;
// 	document.getElementById('editNumberOfGuests').value = booking.number_of_guests;
// 	document.getElementById('editDataIn').value = booking.data_in;
// 	document.getElementById('editDataOut').value = booking.data_out;
// 	document.getElementById('editPrice').value = booking.price;
// 	document.getElementById('editDataBooking').value = booking.data_booking;
// 	document.getElementById('editBreakfast').checked = booking.breakfast;
  
// 	// Отображение модального окна
// 	const editBookingModal = new bootstrap.Modal(document.getElementById('editBookingModal'));
// 	editBookingModal.show();
//   }
  
//   function updateBooking() {
// 	const bookingData = {
// 	  booking_id: document.getElementById('editBookingId').value,
// 	  number_id: document.getElementById('editNumberId').value,
// 	  client_id: document.getElementById('editClientId').value,
// 	  number_of_guests: document.getElementById('editNumberOfGuests').value,
// 	  data_in: document.getElementById('editDataIn').value,
// 	  data_out: document.getElementById('editDataOut').value,
// 	  price: document.getElementById('editPrice').value,
// 	  data_booking: document.getElementById('editDataBooking').value,
// 	  breakfast: document.getElementById('editBreakfast').checked ? 1 : 0
// 	};
  
// 	axios.put('/api/bookings/' + bookingData.booking_id, bookingData)
// 	  .then(response => {
// 		if (response.data.success) {
// 		  // Закрытие модального окна и обновление таблицы
// 		  const editBookingModal = bootstrap.Modal.getInstance(document.getElementById('editBookingModal'));
// 		  editBookingModal.hide();
// 		  loadBookings();
// 		} else {
// 		  console.error('Ошибка при изменении бронирования:', response.data.message);
// 		}
// 	  })
// 	  .catch(error => {
// 		console.error('Ошибка при изменении бронирования:', error);
// 	  });
//   }
  
  

//   function deleteClient(bookingId) {
//     axios.delete(`/api/booking/delete_booking/${bookingId}`)
//       .then(response => {
//         if (response.data.success) {
//           // Обновление таблицы
//           loadBookings();
//         } else {
//           console.error('Ошибка при удалении брони:', response.data.message);
//         }
//       })
//       .catch(error => {
//         console.error('Ошибка при удалении брони:', error);
//       });
//   }



document.addEventListener('DOMContentLoaded', () => {
	const filterInput = document.getElementById('filterInput');
	const sortSelect = document.getElementById('sortSelect');

	filterInput.addEventListener('input', () => {
	filterBookings();
	});

	sortSelect.addEventListener('change', () => {
	sortBookings();
	});
	// Загрузка данных Номеров
	loadBookings();
  
	// Обработчик клика на кнопке "Добавить клиента"
	document.getElementById('addBookingBtn').addEventListener('click', () => {
	  // Отображение формы добавления клиента
	  const addBookingModal = new bootstrap.Modal(document.getElementById('addBookingModal'));
	  addBookingModal.show();
	});
  
	// Обработчик отправки формы добавления клиента
	document.getElementById('addBookingForm').addEventListener('submit', (event) => {
	  event.preventDefault();
	  addBooking();
	});
  
	// Обработчик клика на кнопке "Редактировать"
	document.getElementById('bookingsTableBody').addEventListener('click', (event) => {
	  if (event.target.classList.contains('editBookingBtn')) {
		const bookingId = event.target.dataset.bookingId;
		const bookingData = JSON.parse(event.target.dataset.bookingData);
  
		// Заполнение формы редактирования клиента
		document.getElementById('editBooking_id').value = bookingId;
		document.getElementById('editNumber_id').value = bookingData.number_id;
		document.getElementById('editClient_id').value = bookingData.client_id;
		document.getElementById('editNumber_of_guests').value = bookingData.number_of_guests;
		document.getElementById('editData_in').value = bookingData.data_in;
		document.getElementById('editData_out').value = bookingData.data_out;
		document.getElementById('editPrice').value = bookingData.price;
		document.getElementById('editData_booking').value = bookingData.data_booking;
		document.getElementById('editBreakfast').checked = bookingData.breakfast;
  
		// Отображение формы редактирования клиента
		const editBookingModal = new bootstrap.Modal(document.getElementById('editBookingModal'));
		editBookingModal.show();
	  }else if (event.target.classList.contains('deleteBookingBtn')){
		const bookingId = event.target.dataset.bookingId;
		// console.log(booking.booking_id);
		if (confirm('Вы действительно хотите удалить этого бронь, также удалятся связанные данные?')) {
			console.log(bookingId);
			deleteBooking(bookingId);
		}
	  }
	});
  
	// Обработчик отправки формы редактирования клиента
	document.getElementById('editBookingForm').addEventListener('submit', (event) => {
	  event.preventDefault();
	  updateBooking();
	});
  });
  
  function loadBookings() {
	axios.get('/api/bookings')
	  .then(response => {
		if (response.data.success) {
		  // Отображение списка Номеров
		  const bookingsTableBody = document.getElementById('bookingsTableBody');
		  bookingsTableBody.innerHTML = '';
		  response.data.bookings.forEach(booking => {
			const row = `
			  <tr>
				<td>${booking.booking_id}</td>
				<td>${booking.number_id}</td>
				<td>${booking.client_id}</td>
				<td>${booking.number_of_guests}</td>
				<td>${booking.data_in}</td>
				<td>${booking.data_out}</td>
				<td>${booking.price}</td>
				<td>${booking.data_booking}</td>
				<td>${booking.breakfast ? 'Да' : 'Нет'}</td>
				<td>
				  <button type="button" class="btn btn-primary editBookingBtn" data-booking-id="${booking.booking_id}" data-booking-data='${JSON.stringify(booking)}'>Редактировать</button>
				  <button type="button" class="btn btn-danger deleteBookingBtn" data-booking-id="${booking.booking_id}">Удалить</button>
				</td>
			  </tr>
			`;
			bookingsTableBody.insertAdjacentHTML('beforeend', row);
		  });
		} else {
		  console.error('Ошибка при загрузке Номеров1:', response.data.message);
		}
	  })
	  .catch(error => {
		console.error('Ошибка при загрузке Номеров2:', error);
	  });
  }
  
  function addBooking() {
	const bookingData = {
		number_id: document.getElementById('number_id').value,
		client_id: document.getElementById('client_id').value,
		number_of_guests: document.getElementById('number_of_guests').value,
		data_in: document.getElementById('data_in').value,
		data_out: document.getElementById('data_out').value,
		price: document.getElementById('price').value,
		data_booking: document.getElementById('data_booking').value,
		breakfast: document.getElementById('breakfast').checked ? true : false
	};
  
	axios.post('/api/bookings/add', bookingData)
	  .then(response => {
		if (response.data.success) {
		  // Закрытие модального окна и обновление таблицы
		  const addBookingModal = bootstrap.Modal.getInstance(document.getElementById('addBookingModal'));
		  addBookingModal.hide();
		  loadBookings();
		} else {
		  console.error('Ошибка при добавлении клиента:', response.data.message);
		}
	  })
	  .catch(error => {
		console.error('Ошибка при добавлении клиента:', error);
	  });
  }
  
  function updateBooking() {
	const bookingId = document.getElementById('editBooking_id').value;
	const bookingData = {
		// booking_id: document.getElementById('editBookingId').value,
		number_id: document.getElementById('editNumber_id').value,
		client_id: document.getElementById('editClient_id').value,
		number_of_guests: document.getElementById('editNumber_of_guests').value,
		data_in: document.getElementById('editData_in').value,
		data_out: document.getElementById('editData_out').value,
		price: document.getElementById('editPrice').value,
		data_booking: document.getElementById('editData_booking').value,
		breakfast: document.getElementById('editBreakfast').checked ? true : false
	};
  
	axios.put(`/api/bookings/${bookingId}`, bookingData)
	  .then(response => {
		if (response.data.success) {
		  // Закрытие модального окна и обновление таблицы
		  const editBookingModal = bootstrap.Modal.getInstance(document.getElementById('editBookingModal'));
		  editBookingModal.hide();
		  loadBookings();
		} else {
		  console.error('Ошибка при редактировании клиента:', response.data.message);
		}
	  })
	  .catch(error => {
		console.error('Ошибка при редактировании клиента:', error);
	  });
  }
  
  function deleteBooking(bookingId) {
	console.log(bookingId);
	axios.delete(`/api/bookings/${bookingId}`)
	  .then(response => {
		if (response.data.success) {
		  // Обновление таблицы
		  loadBookings();
		} else {
		  console.error('Ошибка при удалении номера:', response.data.message);
		}
	  })
	  .catch(error => {
		console.error('Ошибка при удалении номера:', error);
	  });
  }

  function filterBookings() {
	const filterValue = filterInput.value.toLowerCase();
	const tableRows = document.querySelectorAll('#bookingsTableBody tr');
  
	tableRows.forEach(row => {
	  const bookingData = row.textContent.toLowerCase();
	  if (bookingData.includes(filterValue)) {
		row.style.display = '';
	  } else {
		row.style.display = 'none';
	  }
	});
  }
  
  function sortBookings() {
	const sortValue = parseInt(sortSelect.value);
	const tableRows = Array.from(document.querySelectorAll('#bookingsTableBody tr'));
  
	tableRows.sort((a, b) => {
	  const aValue = a.querySelector(`td:nth-child(${sortValue})`).textContent;
	  const bValue = b.querySelector(`td:nth-child(${sortValue})`).textContent;
  
	  // Если сортируемые значения являются числами
	  if (!isNaN(parseFloat(aValue)) && !isNaN(parseFloat(bValue))) {
		return parseFloat(aValue) - parseFloat(bValue);
	  }
  
	  // Если сортируемые значения являются датами
	  const aDate = Date.parse(aValue);
	  const bDate = Date.parse(bValue);
	  if (!isNaN(aDate) && !isNaN(bDate)) {
		return aDate - bDate;
	  }
  
	  // Если сортируемые значения являются строками
	  if (aValue < bValue) {
		return -1;
	  } else if (aValue > bValue) {
		return 1;
	  } else {
		return 0;
	  }
	});
  
	const bookingsTableBody = document.getElementById('bookingsTableBody');
	bookingsTableBody.innerHTML = '';
	tableRows.forEach(row => {
	  bookingsTableBody.appendChild(row);
	});
  }