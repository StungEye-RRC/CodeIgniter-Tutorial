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

  public function create_new_post()
  {
      $this->load->helper('url');

      $permalink = url_title($this->input->post('title'), 'dash', TRUE);

      $data = array(
          'title'     => $this->input->post('title'),
          'permalink' => $permalink,
          'content'   => $this->input->post('content')
      );

      return $this->db->insert('blogs', $data);
  }
}
?>
