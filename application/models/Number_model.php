<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Number_model extends CI_Model {

	public function get_numbers() {
        return $this->db->get('number')->result_array();
      }
      
      public function add_number($number_data) {
        return $this->db->insert('number', $number_data);
      }
      
      public function update_number($number_id, $number_data) {
        $this->db->where('number_id', $number_id);
        return $this->db->update('number', $number_data);
      }

      public function delete_number($number_id) {
        $this->db->where('number_id', $number_id);
        return $this->db->delete('number');
    }
}