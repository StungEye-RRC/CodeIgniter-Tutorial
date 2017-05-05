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
}
?>
