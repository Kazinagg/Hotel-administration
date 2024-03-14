<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Floor_model extends CI_Model {

	public function get_floors() {
        return $this->db->get('floor')->result_array();
      }
      
      public function add_floor($floor_data) {
        return $this->db->insert('floor', $floor_data);
      }
      
      public function update_floor($floor_id, $floor_data) {
        $this->db->where('floor_id', $floor_id);
        return $this->db->update('floor', $floor_data);
      }

      public function delete_floor($floor_id) {
        $this->db->where('floor_id', $floor_id);
        return $this->db->delete('floor');
    }
}