<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Site_security extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->module('users');
    }

    public function _get_module_name($class)
    {
        $uri = $this->uri->segment(1);
        if (empty($uri)) {
            $module = "welcome";
        } else {
            $module = $uri;
        }

        return $module;
    }

    public function _get_logged_user()
    {
        $user_id = $this->session->user_id;
        if (isset($user_id)) {
            $user = $this->users->get_where_row('id', $user_id);
        } else {
            $user = FALSE;
        }

        return $user;
    }

    public function _check_login()
    {
        $user_id = $this->session->user_id;
        if ($user_id) {
            $return = TRUE;
        } else {
            $return = FALSE;
        }

        return $return;
    }

    public function _make_sure_is_admin()
    {
        $logged = $this->_check_login();
        if ($logged) {
            $user = $this->_get_logged_user();
            if ($user->role == 'admin') {
                $is_admin = TRUE;
            } else {
                redirect('site_security/not_allowed');
            }
        } else {
            redirect('admin/login');
        }

        return $is_admin;
    }

    public function _alert($type, $css_class, $message)
    {
        $this->session->set_userData('alert', '<div class="alert ' . $css_class . ' fade show">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>' . $type . '</strong> ' . $message . '
</div>');
        $this->session->mark_as_flash('alert');
    }
}
