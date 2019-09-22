<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login();
    }

    public function index()
    {
    	$data['user'] = $this->db->get_where('tb_user',['nik'=>$this->session->userdata('nik')])->row_array();
                            $this->db->join('tb_jabatan','tb_jabatan.id_jabatan = tb_user.id_jabatan');
                            $this->db->where('tb_user.id_jabatan !=',2);
        $data['pegawai'] = $this->db->get('tb_user')->result_array();

        $data['nav'] = "Pegawai";
        $data['navitems'] = "";
    	$data['title'] = 'Pegawai';
        $this->load->view('templates/header',$data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('pegawai/index');
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
         blocked();
        $data['user'] = $this->db->get_where('tb_user',['nik'=>$this->session->userdata('nik')])->row_array();

        $this->form_validation->set_rules('nama_user','Nama User','required',['required'=>'Nama User Masih Kosong']);
        $this->form_validation->set_rules('nik','NIK','required|is_unique[tb_user.nik]',['required'=>'NIK Masih Kosong','is_unique'=>'NIK Sudah Terdaftar']);
        $this->form_validation->set_rules('password','Password','required|min_length[6]',['required'=>'password Masih Kosong','min_length'=> 'Password terlalu pendek']);

        if ($this->form_validation->run() == false) {
            $data['jabatan'] = $this->db->get('tb_jabatan')->result_array();

            $data['nav'] = "Pegawai";
            $data['navitems'] = "";
            $data['title'] = 'Tambah Pegawai';
            $this->load->view('templates/header',$data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pegawai/tambah');
            $this->load->view('templates/footer');
        } else {
            $foto = $_FILES['foto']['name'];

            if ($foto) {
                $config['upload_path'] = './assets/img/user/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '3000';
                $this->load->library('upload', $config);

                if($this->upload->do_upload('foto'))
                {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto',$new_image);
                }else{
                    echo $this->upload->display_errors();
                }
            }else{
                    $this->db->set('foto','default.jpg');
            }
            


            $data = [
                'id_user' => rand(),
                'nik' => $this->input->post('nik'),
                'nama_user' => $this->input->post('nama_user'),
                'jk' => $this->input->post('jk'),
                'tmpt_lhr' => $this->input->post('tmpt_lhr'),
                'tgl_lhr' => $this->input->post('tgl_lhr'),
                'id_jabatan' => $this->input->post('id_jabatan'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => $this->input->post('role')
            ];

            $this->db->insert('tb_user',$data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Pegawai baru berhasil di buat</div>');
            redirect('Pegawai');
        }
        
    }

    public function hapus($id){
          $this->db->delete('tb_user',['id_user'=>$id]);
          $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data Pegawai Berhasil Dihapus</div>');
          redirect('Pegawai');
    }   
}
