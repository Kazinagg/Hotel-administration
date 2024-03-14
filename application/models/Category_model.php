<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

	public function get_categorys() {
        return $this->db->get('category')->result_array();
      }
      
      public function add_category($category_data) {
        return $this->db->insert('category', $category_data);
      }
      
      public function update_category($category_id, $category_data) {
        $this->db->where('category_id', $category_id);
        return $this->db->update('category', $category_data);
      }

      public function delete_category($category_id) {
        $this->db->where('category_id', $category_id);
        return $this->db->delete('category');
    }
}