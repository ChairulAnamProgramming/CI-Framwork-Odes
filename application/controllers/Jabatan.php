<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login();
        blocked();
    }

    public function index()
    {
    	$data['user'] = $this->db->get_where('tb_user',['nik'=>$this->session->userdata('nik')])->row_array();
        $data['profil_desa'] = $this->db->get('tb_profil_desa')->row_array();
        $this->form_validation->set_rules('jabatan','Jabatan','required',['required'=>'Jabatan Masih Kosong']);

        if ($this->form_validation->run() == false) {
            $data['nav'] = "Jabatan";
            $data['navitems'] = "";
            $data['title'] = 'Buat Jabatan';
            $this->load->view('templates/header',$data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/sidebar');
            $this->load->view('jabatan/index');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_jabatan'=>$this->input->post('jabatan'),
                'status'=>$this->input->post('status')
            ];
            $this->db->insert('tb_jabatan',$data);
            $this->session->set_flashdata('message',"<div class='alert alert-success'>Jabatan Baru Berhasil Dibuat.</div>");
            redirect('Jabatan');
        }
        


       
    }
}
