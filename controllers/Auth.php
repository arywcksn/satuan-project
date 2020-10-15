<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        } else {
            // validasinya success
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $admin = $this->db->get_where('admin', ['username' => $username])->row_array();

        //jika usernya ada
        if ($admin) {
            // jika usernya aktif
            if ($admin['is_active'] == 1) {
                // cek password
                if($admin['password']) {
                    $data = [
                        'username' => $admin['username'],
                        'role_id' => $admin['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if($admin['role_id'] == 1) {
                        redirect('Admin');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role=alert">Password salah</div>');
                redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role=alert">Username tidak aktif</div>');
                redirect('auth');
            }

            /*if($furni_users['is_active'] == 1){

            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role=alert">Username tidak aktif</div>');
            redirect('auth');
            }*/
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role=alert">Username tidak terdaftar</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role=alert">You have been Logout</div>');
        redirect('auth');
    }

}
