<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentModel extends Model {
    protected $table = 'students';
    protected $primary_key = 'id';

    public function __construct() {
        parent::__construct();
    }

    public function get_all() {
        return $this->db->table($this->table)->get_all();
    }

    public function insert_data($data) {
        return $this->db->table($this->table)->insert($data);
    }

    public function update_data($id, $data) {
        return $this->db->table($this->table)->where($this->primary_key, $id)->update($data);
    }

    public function delete_data($id) {
        return $this->db->table($this->table)->where($this->primary_key, $id)->delete();
    }

    public function truncate() {
        return $this->db->raw("TRUNCATE TABLE {$this->table}");
    }

    public function count_all($search = null) {
        $builder = $this->db->table($this->table);
        if (!empty($search)) {
            $builder->like('last_name', $search)
                    ->or_like('first_name', $search)
                    ->or_like('email', $search);
        }
        return $builder->count();
    }

    public function get_paginated($limit, $offset, $search = null) {
        $builder = $this->db->table($this->table);
        if (!empty($search)) {
            $builder->like('last_name', $search)
                    ->or_like('first_name', $search)
                    ->or_like('email', $search);
        }
        return $builder->limit($limit, $offset)->get_all();
    }

}
