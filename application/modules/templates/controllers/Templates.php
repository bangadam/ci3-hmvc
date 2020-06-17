<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Templates extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function public_bootstrap($data)
    {
        $data['theme_url'] = base_url('themes/public_bootstrap/');
        $this->load->view('public_bootstrap', $data);
    }

    public function admin($data) {
        $data['theme_url'] = base_url('themes/admin/');
        $this->load->view('admin', $data);
    }
}
