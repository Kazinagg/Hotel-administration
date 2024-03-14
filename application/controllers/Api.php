<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function get_bookings() {
		$this->load->model('Booking_model');
		$bookings = $this->Booking_model->get_bookings();
	  
		$this->output
		  ->set_content_type('application/json')
		  ->set_output(json_encode(['success' => true, 'bookings' => $bookings]));
	  }
	  
	  public function add_booking() {
		$booking_data = json_decode(file_get_contents('php://input'), true);
		$this->load->model('Booking_model');
		$result = $this->Booking_model->add_booking($booking_data);
	  
		if ($result) {
		  $this->output
			->set_content_type('application/json')
			->set_output(json_encode(['success' => true]));
		} else {
		  $this->output
			->set_content_type('application/json')
			->set_output(json_encode(['success' => false, 'message' => 'Ошибка при добавлении клиента']));
		}
	  }
	  
	  public function update_booking($booking_id) {
		$booking_data = json_decode(file_get_contents('php://input'), true);
		$this->load->model('Booking_model');
		$result = $this->Booking_model->update_booking($booking_id, $booking_data);
	  
		if ($result) {
		  $this->output
			->set_content_type('application/json')
			->set_output(json_encode(['success' => true]));
		} else {
		  $this->output
			->set_content_type('application/json')
			->set_output(json_encode(['success' => false, 'message' => 'Ошибка при редактировании клиента']));
		}
	  }

	  public function delete_booking($booking_id) {
		$this->load->model('Booking_model');
		$result = $this->Booking_model->delete_booking($booking_id);
	  
		if ($result) {
		  $this->output
			->set_content_type('application/json')
			->set_output(json_encode(['success' => true]));
		} else {
		  $this->output
			->set_content_type('application/json')
			->set_output(json_encode(['success' => false, 'message' => 'Ошибка при удалении клиента']));
		}
	  }








	  public function get_clients() {
		$this->load->model('Client_model');
		$clients = $this->Client_model->get_clients();
	  
		$this->output
		  ->set_content_type('application/json')
		  ->set_output(json_encode(['success' => true, 'clients' => $clients]));
	  }

	  public function get_clients_log_info() {
		$this->load->model('Client_model');
		$clients = $this->Client_model->get_clients_log_info();
	  
		$this->output
		  ->set_content_type('application/json')
		  ->set_output(json_encode(['success' => true, 'clients' => $clients]));
	  }
	  
	  public function add_client() {
		$client_data = json_decode(file_get_contents('php://input'), true);
		$this->load->model('Client_model');
		$result = $this->Client_model->add_client($client_data);
	  
		if ($result) {
		  $this->output
			->set_content_type('application/json')
			->set_output(json_encode(['success' => true]));
		} else {
		  $this->output
			->set_content_type('application/json')
			->set_output(json_encode(['success' => false, 'message' => 'Ошибка при добавлении клиента']));
		}
	  }
	  
	  public function update_client($client_id) {
		$client_data = json_decode(file_get_contents('php://input'), true);
		$this->load->model('Client_model');
		$result = $this->Client_model->update_client($client_id, $client_data);
	  
		if ($result) {
		  $this->output
			->set_content_type('application/json')
			->set_output(json_encode(['success' => true]));
		} else {
		  $this->output
			->set_content_type('application/json')
			->set_output(json_encode(['success' => false, 'message' => 'Ошибка при редактировании клиента']));
		}
	  }

	  public function delete_client($client_id) {
		$this->load->model('Client_model');
		$result = $this->Client_model->delete_client($client_id);
	  
		if ($result) {
		  $this->output
			->set_content_type('application/json')
			->set_output(json_encode(['success' => true]));
		} else {
		  $this->output
			->set_content_type('application/json')
			->set_output(json_encode(['success' => false, 'message' => 'Ошибка при удалении клиента']));
		}
	  }








	  public function get_numbers() {
		$this->load->model('Number_model');
		$numbers = $this->Number_model->get_numbers();
	  
		$this->output
		  ->set_content_type('application/json')
		  ->set_output(json_encode(['success' => true, 'numbers' => $numbers]));
	  }
	  
	  public function add_number() {
		$number_data = json_decode(file_get_contents('php://input'), true);
		$this->load->model('Number_model');
		$result = $this->Number_model->add_number($number_data);
	  
		if ($result) {
		  $this->output
			->set_content_type('application/json')
			->set_output(json_encode(['success' => true]));
		} else {
		  $this->output
			->set_content_type('application/json')
			->set_output(json_encode(['success' => false, 'message' => 'Ошибка при добавлении Number']));
		}
	  }
	  
	  public function update_number($number_id) {
		$number_data = json_decode(file_get_contents('php://input'), true);
		$this->load->model('Number_model');
		$result = $this->Number_model->update_number($number_id, $number_data);
	  
		if ($result) {
		  $this->output
			->set_content_type('application/json')
			->set_output(json_encode(['success' => true]));
		} else {
		  $this->output
			->set_content_type('application/json')
			->set_output(json_encode(['success' => false, 'message' => 'Ошибка при редактировании Number']));
		}
	  }

	  public function delete_number($number_id) {
		$this->load->model('Number_model');
		$result = $this->Number_model->delete_number($number_id);
	  
		if ($result) {
		  $this->output
			->set_content_type('application/json')
			->set_output(json_encode(['success' => true]));
		} else {
		  $this->output
			->set_content_type('application/json')
			->set_output(json_encode(['success' => false, 'message' => 'Ошибка при удалении Number']));
		}
	  }








	  public function get_floors() {
		$this->load->model('Floor_model');
		$floors = $this->Floor_model->get_floors();
	  
		$this->output
		  ->set_content_type('application/json')
		  ->set_output(json_encode(['success' => true, 'floors' => $floors]));
	  }
	  
	  public function add_floor() {
		$floor_data = json_decode(file_get_contents('php://input'), true);
		$this->load->model('Floor_model');
		$result = $this->Floor_model->add_floor($floor_data);
	  
		if ($result) {
		  $this->output
			->set_content_type('application/json')
			->set_output(json_encode(['success' => true]));
		} else {
		  $this->output
			->set_content_type('application/json')
			->set_output(json_encode(['success' => false, 'message' => 'Ошибка при добавлении Floor']));
		}
	  }
	  
	  public function update_floor($floor_id) {
		$floor_data = json_decode(file_get_contents('php://input'), true);
		$this->load->model('Floor_model');
		$result = $this->Floor_model->update_floor($floor_id, $floor_data);
	  
		if ($result) {
		  $this->output
			->set_content_type('application/json')
			->set_output(json_encode(['success' => true]));
		} else {
		  $this->output
			->set_content_type('application/json')
			->set_output(json_encode(['success' => false, 'message' => 'Ошибка при редактировании Floor']));
		}
	  }

	  public function delete_floor($floor_id) {
		$this->load->model('Floor_model');
		$result = $this->Floor_model->delete_floor($floor_id);
	  
		if ($result) {
		  $this->output
			->set_content_type('application/json')
			->set_output(json_encode(['success' => true]));
		} else {
		  $this->output
			->set_content_type('application/json')
			->set_output(json_encode(['success' => false, 'message' => 'Ошибка при удалении Floor']));
		}
	  }










	  public function get_categorys() {
		$this->load->model('Category_model');
		$categorys = $this->Category_model->get_categorys();
	  
		$this->output
		  ->set_content_type('application/json')
		  ->set_output(json_encode(['success' => true, 'categorys' => $categorys]));
	  }
	  
	  public function add_category() {
		$category_data = json_decode(file_get_contents('php://input'), true);
		$this->load->model('Category_model');
		$result = $this->Category_model->add_category($category_data);
	  
		if ($result) {
		  $this->output
			->set_content_type('application/json')
			->set_output(json_encode(['success' => true]));
		} else {
		  $this->output
			->set_content_type('application/json')
			->set_output(json_encode(['success' => false, 'message' => 'Ошибка при добавлении Category']));
		}
	  }
	  
	  public function update_category($category_id) {
		$category_data = json_decode(file_get_contents('php://input'), true);
		$this->load->model('Category_model');
		$result = $this->Category_model->update_category($category_id, $category_data);
	  
		if ($result) {
		  $this->output
			->set_content_type('application/json')
			->set_output(json_encode(['success' => true]));
		} else {
		  $this->output
			->set_content_type('application/json')
			->set_output(json_encode(['success' => false, 'message' => 'Ошибка при редактировании Category']));
		}
	  }

	  public function delete_category($category_id) {
		$this->load->model('Category_model');
		$result = $this->Category_model->delete_category($category_id);
	  
		if ($result) {
		  $this->output
			->set_content_type('application/json')
			->set_output(json_encode(['success' => true]));
		} else {
		  $this->output
			->set_content_type('application/json')
			->set_output(json_encode(['success' => false, 'message' => 'Ошибка при удалении Category']));
		}
	  }
}