<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_model extends CI_Model {

	public function get_bookings() {
		// $query = $this->db->get('booking');
		$this->db->from('booking');
		$this->db->order_by("data_booking", "asc");
		$query = $this->db->get(); 
		return $query->result_array();
	}
    public function add_booking($booking_data) {
		return $this->db->insert('booking', $booking_data);
	}
	public function update_booking($booking_id, $booking_data) {
		$this->db->where('booking_id', $booking_id);
		return $this->db->update('booking', $booking_data);
	}

	public function delete_booking($booking_id) {
        $this->db->where('booking_id', $booking_id);
        return $this->db->delete('booking');
    }
}
