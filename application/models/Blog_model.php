<?php
class Blog_model extends CI_Model {

  public function __construct() {
    $this->load->database();
  }

  // SELECT * FROM blogs;
  // Returns each row as an array of hashes.
  public function all_posts() {
    $query = $this->db->get('blogs');
    return $query->result_array();
  }

  public function by_id($id) {
    $query = $this->db->get_where('blogs', array('id' => $id));
    return $query->row_array();
  }

  public function by_permalink($permalink) {
    $query = $this->db->get_where('blogs', array('permalink' => $permalink));
    return $query->row_array();
  }
}
?>
