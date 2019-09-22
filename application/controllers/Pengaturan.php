<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends CI_Controller
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
        $this->form_validation->set_rules('desa','Desa','required',['required'=>'Desa Masih Kosong']);
        $this->form_validation->set_rules('telpon','telpon','required',['required'=>'Telpon Masih Kosong']);
        $this->form_validation->set_rules('kode_post','kode_post','required',['required'=>'Kode Post Masih Kosong']);
        $this->form_validation->set_rules('alamat','alamat','required',['required'=>'Alamat Masih Kosong']);
        $this->form_validation->set_rules('kecamatan','kecamatan','required',['required'=>'Kecamatan Masih Kosong']);
        $this->form_validation->set_rules('kabupaten','kabupaten','required',['required'=>'Kabupaten Masih Kosong']);
        $this->form_validation->set_rules('klasifikasi','klasifikasi','required',['required'=>'Klasifikasi Masih Kosong']);

        if ($this->form_validation->run() == false) {
            $data['nav'] = "Pengaturan";
            $data['navitems'] = "";
            $data['title'] = 'Pengaturan';
            $this->load->view('templates/header',$data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pengaturan/index');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_desa'=>$this->input->post('desa'),
                'nama_kecamatan'=>$this->input->post('kecamatan'),
                'nama_kabupaten'=>$this->input->post('kabupaten'),
                'alamat'=>$this->input->post('alamat'),
                'telpon'=>$this->input->post('telpon'),
                'kode_pos'=>$this->input->post('kode_post'),
                'klasifikasi'=>$this->input->post('klasifikasi')
            ];
            $this->db->update('tb_profil_desa',$data);
            $this->session->set_flashdata('message',"<div class='alert alert-success'>Profil Desa Diperbarui.</div>");
            redirect('Pengaturan');
        }
        


       
    }
}
