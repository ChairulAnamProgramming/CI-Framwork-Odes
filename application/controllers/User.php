<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login();
    }

    public function index()
    {
    	$data['user'] = $this->db->get_where('tb_user',['nik'=>$this->session->userdata('nik')])->row_array();
        $data['warga'] = $this->db->get('tb_warga')->result_array();
        $data['male'] = $this->db->get_where('tb_warga',['jk'=>'LAKI-LAKI'])->result_array();
        $data['female'] = $this->db->get_where('tb_warga',['jk'=>'PEREMPUAN'])->result_array();

        $data['nav'] = "User";
        $data['navitems'] = "";
    	$data['title'] = 'Selamat Datang '.$data['user']['nama_user'];
        $this->load->view('templates/header',$data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('user/index');
        $this->load->view('templates/footer');
    }

    public function Ubah_password(){
        $data['user'] = $this->db->get_where('tb_user',['nik'=>$this->session->userdata('nik')])->row_array();
        
        $this->form_validation->set_rules('password_lama','Password Lama','required|trim',['required'=>'Password Lama Masih Kosong']);
        $this->form_validation->set_rules('password_baru','Password Lama','required|trim|min_length[6]',['required'=>'Password Lama Masih Kosong','min_length'=>'Password Anda Terlalu Pendek']);

        if ($this->form_validation->run() == false) {

            $data['nav'] = "Ubah Password";
            $data['navitems'] = "Ubah Password";
            $data['title'] = 'Ubah Password';
            $this->load->view('templates/header',$data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/sidebar');
            $this->load->view('user/ubah-password');
            $this->load->view('templates/footer');

        } else {
            $password_lama = $this->input->post('password_lama',true);
            $password_baru = $this->input->post('password_baru',true);

            if (!password_verify($password_lama, $data['user']['password'])) {
                 $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Password Lama Anda Salah</div>');
                 redirect('User/Ubah_password');
            } else {
                $password_acak = password_hash($password_baru, PASSWORD_DEFAULT);
                $this->db->set('password',$password_acak);
                $this->db->where('nik',$this->session->userdata('nik'));
                $this->db->update('tb_user');
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Password Berhasil Diubah</div>');
                redirect('User/Ubah_password');
            }
            
        }
        
    }
}
