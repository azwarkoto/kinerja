<?php

require APPPATH . '/libraries/REST_Controller.php';

class Tool_api extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    function index_get() {
     
        $data['tools'] = $this->db->get("tools")->result();
        $this->response($data, 200);
    }


    function index_post(){
        $id = $this->input->post('no');
        $data = array(
            'no' => $this->input->post('no'),
            'status' => $this->input->post('status'));
        
        $this->db->where('no', $id);
        $update = $this->db->update('tools', $data);
        if ($update) {
             $this->response(array("tools"=>array($data), "status"=>"success"));
        } else {
            $this->response(array("tools"=>array($data),'status' => 'failed'));
        }
        
    }

    
}
