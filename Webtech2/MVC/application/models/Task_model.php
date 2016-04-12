<?php
    class Task_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
    
        public function Save ( $data ){
            
            $this->db->insert('todos', $data);
        }
    
        public function getAll(){
            
            if ($slug === FALSE)
            {
                $query = $this->db->get('todos');
                return $query->result_array();
            }

            $query = $this->db->get_where('todos', array('slug' => $slug));
            return $query->row_array();
            
        }
}