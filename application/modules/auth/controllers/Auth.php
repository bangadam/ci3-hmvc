<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
        $this->model = $this->users_model;
    }

    public function login()
    {
        $data['page_title'] = "Login";
        $data['view_file'] = 'index';
        $data['module'] = "welcome";

        echo Modules::run('templates/public_bootstrap', $data);
    }

    public function authenticate() {
        $data = $this->input->post();
    }
}
