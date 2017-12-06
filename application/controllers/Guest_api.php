<?php

require APPPATH . '/libraries/REST_Controller.php';

class Guest_api extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    function index_get() {
     
        $data['guest'] = $this->db->get("guest")->result();
        $this->response($data, 200);
    }


    function index_post(){
        $id = $this->input->post('id');
        $data = array(
            'id' => $this->input->post('id'),
            'location' => "guest.jpg",
            'status' => $this->input->post('status'));
        if(!empty($_FILES)){
                $path = $_FILES['location']['tmp_name'];
                move_uploaded_file($path,"upload/"."guest.jpg");
            }
        $this->db->where('id', $id);
        $update = $this->db->update('guest', $data);
        if ($update) {
             $this->response(array("guest"=>array($data), "status"=>"success"));
        } else {
            $this->response(array("guest"=>array($data),'status' => 'failed'));
        }
        
    }

    
}
