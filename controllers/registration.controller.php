<?php

class RegistrationController extends Controller{

    public function __construct($data = array()){
        parent::__construct($data);
        $this->model = new Registration1();
    }

    public function index(){
/*        $this->data['pages'] = $this->model->getNearestDateInformation();*/
    }
}