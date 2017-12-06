<?php

require APPPATH . '/libraries/REST_Controller.php';

class Helper_api extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    function index_get() {
     
        $data['helper'] = $this->db->get("helper")->result();
        $this->response($data, 200);
    }


    function index_post(){
        $id = $this->input->post('id');
        $data = array(
            'id' => $this->input->post('id'),
            'status' => $this->input->post('status'));
       
        $this->db->where('id', $id);
        $update = $this->db->update('helper', $data);
        if ($update) {
             $this->response(array("helper"=>array($data), "status"=>"success"));
        } else {
            $this->response(array("helper"=>array($data),'status' => 'failed'));
        }
        
    }

    
}
