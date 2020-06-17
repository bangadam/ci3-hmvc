<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'users';
    }

    public function get($order_by = false)
    {
        if ($order_by) {
            $this->db->order_by($order_by);
            $result = $this->db->get($this->table);
        } else {
            $result = $this->db->get($this->table);
        }

        return $result->result();
    }
}
