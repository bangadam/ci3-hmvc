<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->module('site_security');
        $this->load->model('users_model');
        $this->model = $this->users_model;
    }

    public function index()
    {
        $users = $this->model->get();
        print_r($users);
    }

    public function create()
    {
        $data['page_title'] = "Administration > Create new user";
        $data['view_file'] = "create";
        $data['module'] = 'users';
        $data['alert'] = $this->session->alert;

        echo Modules::run('templates/admin', $data);
    }

    public function edit($id)
    {
        $id = trim($id);

        $user = $this->model->get_where_row('id', $id);

        if ($user) {
            $data['page_title'] = "Administration > Edit user : " . $user->username;
            $data['view_file'] = "edit";
            $data['module'] = 'users';
            $data['alert'] = $this->session->alert;
            $data['user'] = $user;

            echo Modules::run('templates/admin', $data);
        } else {
            show_404();
        }
    }

    public function manage()
    {
        $data['page_title'] = "Administration > Manage Users";
        $data['view_file'] = "manage";
        $data['module'] = 'users';
        $data['alert'] = $this->session->alert;
        $data['users'] = $this->model->get('created_at DESC');
        $data['total_users'] = $this->model->count_all();

        echo Modules::run('templates/admin', $data);
    }

    public function delete($id)
    {

        if (isset($id)) {
            $user = $this->model->get_where_row('id', $id);
            if ($user->role == 'admin') {
                $message = "You can't delete the administrator";
                $this->site_security->_alert('Warning!', 'alert-danger', $message);
                redirect('users/manage');
            } else {
                $delete = $this->model->_delete($id);
                if ($delete) {
                    $message = "The user " . $user->username . " was deleted";
                    $css_class = "alert-success";
                } else {
                    $message = "The user " . $user->username . " is fail deleted";
                    $css_class = "alert-danger";
                }

                $this->site_security->_alert('Warning!', $css_class, $message);
                redirect('users/manage');
            }
        } else {
            show_404();
        }
    }

    public function insert()
    {
        $data = $this->input->post();

        $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|is_unique[users.username]',
            array('required' => 'You have not provided %s',
                'is_unique' => 'This %s already exists'));
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passconf', 'Confirm Password', 'required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'required|min_length[4]|is_unique[users.email]|valid_email');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->create();
        } else {
            unset($data['passconf']);
            $data['password'] = password_hash($data['password'], 'PASSWORD_DEFAULT');
            $this->model->_insert($data);
            $this->site_security->_alert('Info!', 'alert-success', 'Insert Succesfully');
            redirect('users/manage');
        }
    }

    public function update($id)
    {
        $id = trim($id);

        $data = $this->input->post();
        $password = $data['password'];

        $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]');

        if (!empty($password)) {
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('passconf', 'Confirm Password', 'required|matches[password]');
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        }

        $this->form_validation->set_rules('email', 'Email', 'required|min_length[4]|valid_email');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->edit($id);
        } else {
            unset($data['passconf']);
            $this->model->_update($id, $data);
            $this->site_security->_alert('Info!', 'alert-success', 'Update Succesfully');
            redirect('users/manage');
        }
    }
}
