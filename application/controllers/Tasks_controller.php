<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Tasks_controller extends CI_Controller
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

        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        $result['data'] = $this->Tasks_model->get();
        $this->load->helper('url');
        $this->load->view('task/index', $result);
    }

    public function insert()
    {
        $response = [];

        $this->form_validation->set_rules('task_name', 'Task Name', 'required');
        $this->form_validation->set_rules('task_date', 'Task Date', 'required');
        //$this->form_validation->set_rules('task_description', 'Task Description', 'required');


        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
            echo json_encode([
                'status' => false,
                'error' => $errors
            ]);
        } else {
            $data['task_name'] = $this->input->post('task_name');
            $data['task_date'] = $this->input->post('task_date');
            $data['task_description'] = trim($this->input->post('task_description'));
            $data['created_date_time'] = date('Y-m-d H:i:s');
            $user = $this->Tasks_model->insert($data);
            if ($user > 0) {
                $html = '';
                $task_data = $this->Tasks_model->get();
                if (count($task_data) > 0) {
                    foreach ($task_data as $row) {
                        $html .= '<div class="column">
                    <h4>Task Name: ' . $row->task_name . '</h4>
                    <p>Task Date : ' . $row->task_date . '</p>
                    <p>' . $row->task_description . '</p>
                    <span><button class="delete-task" data-delete-id="' . $row->id . '" onclick="delete_task(' . $row->id . ')">X</button><span>
                </div>';
                    }
                    $response['content'] = $html;
                }
                $response['status'] = true;
            } else {
                $response['status'] = false;
            }
            //}
            echo json_encode($response);
        }
    }
    /**
     * Delete method
     */
    public function delete()
    {
        try {
            $response = [];
            //$user = $this->Tasks_model->delete($data);
            $this->db->delete('tasks', array('id' => $this->input->post('id')));  // Produces: // DELETE FROM mytable  // WHERE id = $id
            $html = '';
            $task_data = $this->Tasks_model->get();
            if (count($task_data) > 0) {
                foreach ($task_data as $row) {
                    $html .= '<div class="column">
                        <h4>Task Name: ' . $row->task_name . '</h4>
                        <p>Task Date : ' . $row->task_date . '</p>
                        <p>' . $row->task_description . '</p>
                        <span><button class="delete-task" data-delete-id="' . $row->id . '" onclick="delete_task(' . $row->id . ')">X</button><span>
                    </div>';
                }
                $response['content'] = $html;
            } else {
                $response['content'] = '';
            }
            $response['status'] = true;
            echo json_encode($response);
        } catch (\Exception $e) {
            echo json_encode($response);
        }
    }
}
