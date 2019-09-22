<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login();
        
    }

    public function index()
    {
    	$data['user'] = $this->db->get_where('tb_user',['nik'=>$this->session->userdata('nik')])->row_array();

         $data['warga_desa'] = $this->db->get('tb_warga')->result_array();
         $data['gallery_foto'] = $this->db->get('tb_gallery')->result_array();
         $data['nav'] = "Gallery";
         $data['navitems'] = "";
        $data['title'] = 'Gallery';
        $this->load->view('templates/header',$data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('gallery/index');
        $this->load->view('templates/footer');
        
    }

    public function jenis($jenis)
    {
        $data['user'] = $this->db->get_where('tb_user',['nik'=>$this->session->userdata('nik')])->row_array();

        if ($jenis == 1) {
            $jenis = "Pengelolaan Dana";
        } elseif ($jenis == 2) {
            $jenis = "Album Foto";
        } elseif ($jenis == 3) {
            $jenis = "Laporan";
        }

         $data['gallery_foto'] = $this->db->get_where('tb_gallery',['jenis'=>$jenis])->result_array();

         $data['warga_desa'] = $this->db->get('tb_warga')->result_array();
         $data['nav'] = "Gallery";
         $data['navitems'] = "";
        $data['title'] = 'Jenis Gallery';
        $this->load->view('templates/header',$data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('gallery/jenis');
        $this->load->view('templates/footer');
        
    }

    public function tambah()
    {
        $data['user'] = $this->db->get_where('tb_user',['nik'=>$this->session->userdata('nik')])->row_array();

        $this->form_validation->set_rules('title', 'Title','required',['required'=> 'Title Masih Kosong']);
        $this->form_validation->set_rules('jenis', 'Jenis','required',['required'=> 'Jenis Masih Kosong']);
        if ($this->form_validation->run() == false) {
            $data['warga_desa'] = $this->db->get('tb_warga')->result_array();
             $data['nav'] = "Gallery";
             $data['navitems'] = "";
             $data['title'] = 'Tambah Foto';
             $this->load->view('templates/header',$data);
             $this->load->view('templates/topbar');
             $this->load->view('templates/sidebar');
             $this->load->view('gallery/tambah');
             $this->load->view('templates/footer');
        } else {
            $image = $_FILES['foto']['name'];

            if ($image) {
                $config['upload_path'] = './assets/img/gallery/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '3000';
                $this->load->library('upload', $config);

                if($this->upload->do_upload('foto'))
                {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gallery',$new_image);
                }else{
                    echo $this->upload->display_errors();
                }
            }else{
                    $this->db->set('gallery','default.jpg');
            }

            $data = [
                'judul'=>$this->input->post('title',true),
                'jenis'=>$this->input->post('jenis',true),
            ];

            $this->db->insert('tb_gallery',$data);
            $this->session->set_flashdata('message', "<div class='alert alert-success'>Gallery Berhasil Ditambahkan</div>");
            redirect('Gallery');
            
        }
        
        
    }

    public function hapus($id){
        $galler = $this->db->get_where('tb_gallery',['id_gallery'=>$id])->row_array();
        $this->db->delete('tb_gallery',['id_gallery'=>$id]);

        unlink(FCPATH . 'assets/img/gallery/'. $galler['gallery']);
        $this->session->set_flashdata('message', "<div class='alert alert-danger'>Foto Gallery Berhasil Di Hapus.</div>");
        redirect('Gallery');
    }


}
