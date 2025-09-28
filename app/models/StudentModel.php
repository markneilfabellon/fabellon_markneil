<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentModel extends Model {
    protected $table = 'students';
    protected $primary_key = 'id';

    public function __construct() {
        parent::__construct();
    }
    
    // Get students with pagination + search
    public function get_students($limit, $offset, $search = null) {
        $builder = $this->db->table($this->table);

        if ($search) {
            $builder->group_start()
                    ->like('first_name', $search)
                    ->or_like('last_name', $search)
                    ->group_end();
        }

        return $builder->limit($limit, $offset)->get_all();
    }

    // Count for pagination
    public function count_students($search = null) {
        $builder = $this->db->table($this->table);

        if ($search) {
            $builder->group_start()
                    ->like('first_name', $search)
                    ->or_like('last_name', $search)
                    ->group_end();
        }

        return $builder->count();
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
}
