<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['page_title'] = "Welcome to Codeiginter HMVC by bangadam.dev";
        $data['view_file'] = 'welcome';
        $data['module'] = "welcome";

        echo Modules::run('templates/public_bootstrap', $data);
    }
}
