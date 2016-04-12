<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Task extends CI_Controller {
        
        public function listall(){
            
        }
    
        public function add(){
            $viewdata['feedback'] = "";
            
            // validate
            $this->load->library('form_validation');
            $this->form_validation->set_rules('todo_name', 'TASK name', 'required');
            if ($this->form_validation->run() === FALSE)
            {
                //
                
            }
            else
            {
                //
                $this->load->model('task_model');
                $data['name'] = $this->input->post('todo_name');
                $this->task_model->Save($data);
                $viewdata['feedback'] = "Your todo has been added.";
            }
                    
            // view model
            
            $this->load->view('task/add', $viewdata);
        }
        
        public function list(){
            $this->load->view('task/list');
        }
    }
