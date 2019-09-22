<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mutasi_keluar extends CI_Controller
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

                                  $this->db->order_by('no_surat','ASC');
        $data['mutasi_keluar'] = $this->db->get_where('tb_mutasi',['jenis_mutasi'=>'Keluar'])->result_array();

        $data['nav'] = "Mutasi Keluar";
        $data['navitems'] = "";
    	$data['title'] = 'Mutasi Keluar';
        $this->load->view('templates/header',$data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('mutasi/keluar/keluar');
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['user'] = $this->db->get_where('tb_user',['nik'=>$this->session->userdata('nik')])->row_array();

       $this->form_validation->set_rules('no_surat','Nomor Surat','required',['required'=>'Nomor Surat Masih Kosong']);

       if ($this->form_validation->run() == false) {
            $data['nav'] = "Mutasi Keluar";
            $data['navitems'] = "";
            $data['title'] = 'Tambah Mutasi Keluar';
            $this->load->view('templates/header',$data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/sidebar');
            $this->load->view('mutasi/keluar/tambah');
            $this->load->view('templates/footer');
       } else {
          $data = [
            'no_surat' =>$this->input->post('no_surat',true),
            'nama' =>$this->input->post('nama',true),
            'tanggal_masuk' =>$this->input->post('tanggal_masuk',true),
            'perihal' =>$this->input->post('perihal',true),
            'jenis_mutasi' => 'Keluar',
          ];

          $this->db->insert('tb_mutasi',$data);
          $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Mutasi Berhasil Ditambahkan</div>');
          redirect('Mutasi_keluar');
       }
   } 



   public function ubah($id)
    {
        $data['user'] = $this->db->get_where('tb_user',['nik'=>$this->session->userdata('nik')])->row_array();

       $this->form_validation->set_rules('no_surat','Nomor Surat','required',['required'=>'Nomor Surat Masih Kosong']);

       if ($this->form_validation->run() == false) {
            $data['mutasi'] = $this->db->get_where('tb_mutasi',['id_mutasi'=>$id])->row_array();
            $data['nav'] = "Mutasi Keluar";
            $data['navitems'] = "";
            $data['title'] = 'Tambah Mutasi Keluar';
            $this->load->view('templates/header',$data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/sidebar');
            $this->load->view('mutasi/keluar/ubah');
            $this->load->view('templates/footer');
       } else {
          $data = [
            'no_surat' =>$this->input->post('no_surat',true),
            'nama' =>$this->input->post('nama',true),
            'tanggal_masuk' =>$this->input->post('tanggal_masuk',true),
            'perihal' =>$this->input->post('perihal',true),
            'jenis_mutasi' => 'Keluar',
          ];
          $this->db->where('id_mutasi',$id);
          $this->db->update('tb_mutasi',$data);
          $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Mutasi Berhasil Diubah</div>');
          redirect('Mutasi_keluar');
       }
   }

   public function hapus($id)
   {
      $this->db->delete('tb_mutasi',['id_mutasi'=>$id]);
      $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data Mutasi Berhasil Dihapus</div>');
      redirect('Mutasi_keluar');
   }
       
}
