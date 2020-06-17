<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->module('users');
    }

    public function index()
    {
        $data['page_title'] = "Admin > index";
        $data['view_file'] = 'index';
        $data['module'] = "admin";

        echo Modules::run('templates/admin', $data);
    }
}
