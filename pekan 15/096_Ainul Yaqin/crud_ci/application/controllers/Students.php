<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Student_model');
        $this->load->helper(['url', 'form']);
        $this->load->library('form_validation');
    }

    // READ – tampilkan semua data
    public function index() {
        $data['students'] = $this->Student_model->get_all();
        $this->load->view('students/index', $data);
    }

    // CREATE – form + simpan data
    public function create() {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('students/create');
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'major' => $this->input->post('major')
            ];

            $this->Student_model->insert($data);
            redirect('index.php/students');

        }
    }

    // UPDATE – form edit
    public function edit($id) {
        $data['student'] = $this->Student_model->get($id);

        if (!$data['student']) show_404();

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('students/edit', $data);
        } else {
            $updateData = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'major' => $this->input->post('major')
            ];

            $this->Student_model->update($id, $updateData);
            redirect('index.php/students');

        }
    }

    // DELETE
    public function delete($id) {
        $this->Student_model->delete($id);
        redirect('index.php/students');

    }
}
