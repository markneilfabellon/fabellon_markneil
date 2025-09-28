<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Students extends Controller {
    public function __construct() {
        parent::__construct();
        $this->call->database();
        $this->call->model('StudentModel');
    }

    public function index() {
        $per_page = 5;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $search = isset($_GET['search']) ? $_GET['search'] : null;

        $offset = ($page - 1) * $per_page;

        $students = $this->StudentModel->get_students($per_page, $offset, $search);
        $total_students = $this->StudentModel->count_students($search);
        $total_pages = ceil($total_students / $per_page);

        $this->call->view('students/index', [
            'students' => $students,
            'page' => $page,
            'total_pages' => $total_pages,
            'search' => $search
        ]);
    }

    public function create() {
        $this->call->view('students/create');
    }

    public function store() {
        $data = [
            'last_name' => $this->io->post('last_name'),
            'first_name' => $this->io->post('first_name'),
            'email' => $this->io->post('email')
        ];
        $this->StudentModel->insert_data($data);

        // Redirect para visible agad
        redirect('/students/index');
    }

    public function inline_update($id) {
        $data = [
            'last_name' => $_POST['last_name'],
            'first_name' => $_POST['first_name'],
            'email' => $_POST['email']
        ];
        $this->StudentModel->update_data($id, $data);
        redirect('/students/index');
    }

    public function inline_delete($id) {
        $this->StudentModel->delete_data($id);
        redirect('/students/index');
    }

    public function delete_all() {
        $this->StudentModel->truncate();
        redirect('/students/index');
    }
}
