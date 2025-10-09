<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: UserModel
 */
class UserModel extends Model {
    protected $table = 'students';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    public function page($q, $records_per_page = null, $page = null) {
        if (is_null($page)) {
            return $this->db->table($this->table)->get_all();
        } else {
            $query = $this->db->table($this->table);

            // Build LIKE conditions for search
            $query->like('id', '%'.$q.'%')
                  ->or_like('first_name', '%'.$q.'%')
                  ->or_like('last_name', '%'.$q.'%')
                  ->or_like('email', '%'.$q.'%');

            // Clone before pagination for counting
            $countQuery = clone $query;

            $data['total_rows'] = $countQuery->select_count('*', 'count')
                                             ->get()['count'];

            $data['records'] = $query->pagination($records_per_page, $page)
                                     ->get_all();

            return $data;
        }
    }

    public function register($data) {
        // Hash the password before saving
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        return $this->db->table('users')->insert($data);
    }

    public function login($name, $password) {
        $user = $this->db->table('users')
                         ->where('name', $name)
                         ->or_where('email', $name)
                         ->get();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
