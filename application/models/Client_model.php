<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_model extends CI_Model {

	  public function get_clients() {
        return $this->db->get('client_log_info')->result_array();
      }
      
      public function add_client($client_data) {
        $query = "
            SELECT add_client_func(?, ?, ?, ?, ?, ?, ?);
        ";
        return $this->db->query($query, $client_data);
    }
      // public function get_clients_log_info($client_data) {
      //   return $this->db->insert('log_info', $client_data);
      // }
      
      public function update_client($client_id, $oll_client_data) {
        $this->db->where('client_id', $client_id);

        $log_info_data = array();
        $client_data = array();

        // ключи объекта clientData для определения, какие данные нужно добавить в каждый из двух новых массивов.
        $log_info_data['email'] = $oll_client_data['email'];
        $log_info_data['password'] = $oll_client_data['password'];

        $client_data['surname'] = $oll_client_data['surname'];
        $client_data['name'] = $oll_client_data['name'];
        $client_data['patronymic'] = $oll_client_data['patronymic'];
        $client_data['age'] = $oll_client_data['age'];
        $client_data['phone_number'] = $oll_client_data['phone_number'];
        $client_data['email'] = $oll_client_data['email'];

        $this->db->update('log_info', $log_info_data);
        $this->db->where('client_id', $client_id);
        return $this->db->update('client', $client_data);
      }

      public function delete_client($client_id) {
        // $this->db->where('client_id', $client_id);
        return $this->db->query("SELECT delete_client_and_booking($client_id)");
      }
}