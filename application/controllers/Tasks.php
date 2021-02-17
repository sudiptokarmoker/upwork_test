<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Tasks extends CI_Controller
{
    public function __construct()
    {
        /*call CodeIgniter's default Constructor*/
        parent::__construct();
        /*load database libray manually*/
        $this->load->database();
        /*load Model*/
        $this->load->model('Tasks_model');
        $this->load->helper('date');
    }

    public function index()
    {
        // echo time();
        // die();
        //die("d");
        /*load registration view form*/

        /*Check submit button */
        $response = [];
        if ($this->input->post('save')) {
            // print_r($this->input->post('txtTaskDate'));
            // die();
            $data['task_name'] = $this->input->post('txtTaskName');
            $data['task_date'] = $this->input->post('txtTaskDate');
            $data['task_description'] = trim($this->input->post('txtTaskDescription'));
            $data['created_date_time'] = date('Y-m-d H:i:s');
            $user = $this->Tasks_model->insert($data);

            if ($user > 0) {
                $response['status'] = true;
                echo json_encode($response);
                die();
            } else {
                echo json_encode([
                    'status' => false
                ]);
            }
        } else {
            $result['data'] = $this->Tasks_model->get();

            $this->load->helper('url');
            $this->load->view('welcome_message', $result);
        }
    }
}
