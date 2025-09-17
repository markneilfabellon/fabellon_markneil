<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Students extends Controller {
    public function __construct() {
        parent::__construct();
        $this->call->database();
        $this->call->model('StudentModel');
    }

    // =========================
    // INDEX with pagination + search
    // =========================
    public function index() {
        $perPage = 5; // how many students per page
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($page < 1) $page = 1;

        $search = isset($_GET['search']) ? trim($_GET['search']) : '';

        $offset = ($page - 1) * $perPage;

        // get total rows with optional search
        $total = $this->StudentModel->count_all($search);

        // get rows for this page
        $students = $this->StudentModel->get_paginated($perPage, $offset, $search);

        $totalPages = ($total > 0) ? ceil($total / $perPage) : 1;

        $this->call->view('students/index', [
            'students'     => $students,
            'page'         => $page,
            'total'        => $total,
            'total_pages'  => $totalPages,
            'per_page'     => $perPage,
            'search'       => $search,
            'offset'       => $offset
        ]);
    }

    // =========================
    // SHOW CREATE FORM
    // =========================
    public function create() {
        $this->call->view('students/create');
    }

    // =========================
    // STORE NEW STUDENT
    // =========================
    public function store() {
        $data = [
            'last_name'  => $this->io->post('last_name'),
            'first_name' => $this->io->post('first_name'),
            'email'      => $this->io->post('email')
        ];
        $this->StudentModel->insert_data($data);
        echo "<script>alert('Added successfully!'); window.location='/students/index';</script>";
    }

    // =========================
    // INLINE UPDATE
    // =========================
    public function inline_update($id) {
        $data = [
            'last_name'  => $_POST['last_name'],
            'first_name' => $_POST['first_name'],
            'email'      => $_POST['email']
        ];
        $this->StudentModel->update_data($id, $data);
        echo "<script>alert('Updated successfully!'); window.location='/students/index';</script>";
    }

    // =========================
    // INLINE DELETE
    // =========================
    public function inline_delete($id) {
        $this->StudentModel->delete_data($id);
        echo "<script>alert('Deleted successfully!'); window.location='/students/index';</script>";
    }

    // =========================
    // DELETE ALL
    // =========================
    public function delete_all() {
        $this->StudentModel->truncate();
        echo "<script>alert('All records deleted!'); window.location='/students/index';</script>";
    }
}
