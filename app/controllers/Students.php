<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Students extends Controller {
    public function __construct() {
        parent::__construct();
        $this->call->database();
        $this->call->model('StudentModel');
    }

    public function index() {
        $students = $this->StudentModel->get_all();
        $this->call->view('students/index', ['students' => $students]);
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
        echo "<script>alert('Added successfully!'); window.location='/students/index';</script>";
    }

    public function inline_update($id) {
        $data = [
            'last_name' => $_POST['last_name'],
            'first_name' => $_POST['first_name'],
            'email' => $_POST['email']
        ];
        $this->StudentModel->update_data($id, $data);
        echo "<script>alert('Updated successfully!'); window.location='/students/index';</script>";
    }

    public function inline_delete($id) {
        $this->StudentModel->delete_data($id);
        echo "<script>alert('Deleted successfully!'); window.location='/students/index';</script>";
    }

    public function delete_all() {
        $this->StudentModel->truncate();
        echo "<script>alert('All records deleted!'); window.location='/students/index';</script>";
    }
}
