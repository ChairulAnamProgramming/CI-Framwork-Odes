<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login();
    }

    public function index()
    {
                        $this->db->join('tb_jabatan','tb_jabatan.id_jabatan = tb_user.id_jabatan');
    	$data['user'] = $this->db->get_where('tb_user',['nik'=>$this->session->userdata('nik')])->row_array();


        if ($data['user']['role'] != "User") {
            $data['jabatan'] = $this->db->get('tb_jabatan')->result_array();
        } else {
            $data['jabatan'] = $this->db->get_where('tb_jabatan',['id_jabatan'=> 2])->result_array();
        }
        

        $this->form_validation->set_rules('nik','NIK','required',['required'=> 'NIK Anda Kosong']);
        if ($this->form_validation->run() == false) {
            $data['nav'] = "Profil";
            $data['navitems'] = "";
            $data['title'] = $data['user']['nama_user'];
            $this->load->view('templates/header',$data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/sidebar');
            $this->load->view('profil/index');
            $this->load->view('templates/footer');
        } else {

            $id_user = $data['user']['id_user'];

                // cek jika ada gambar yang di upload
            $upload_image = $_FILES['foto']['name'];
            if ($upload_image) {
                $config['upload_path'] = './assets/img/user/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '3000';
                $this->load->library('upload', $config);

                if($this->upload->do_upload('foto'))
                {
                    $old_image =$data['user']['foto'];
                    if($old_image != 'default.jpg')
                    {
                        unlink(FCPATH . 'assets/img/user/'. $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto',$new_image);
                }else{
                    echo $this->upload->display_errors();
                }
            }


            $data = [
                'nik'=> $this->input->post('nik'),
                'nama_user'=> $this->input->post('nama_user'),
                'jk'=> $this->input->post('jk'),
                'tmpt_lhr'=> $this->input->post('tmpt_lhr'),
                'tgl_lhr'=> $this->input->post('tgl_lhr'),
                'id_jabatan'=> $this->input->post('id_jabatan'),
            ];

            $this->db->where('id_user',$id_user);
            $this->db->update('tb_user',$data);

            $this->session->set_flashdata('message', "<div class='alert alert-success'>Data User telah di perbarui.</div>");
            redirect('Profil');
        }
        
    }
}
