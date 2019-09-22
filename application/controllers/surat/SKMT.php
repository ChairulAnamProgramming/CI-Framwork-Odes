<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SKMT extends CI_Controller
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

        $data['asn'] = $this->db->get('tb_profil_desa')->row_array();
        $data['warga'] = $this->db->get('tb_warga')->result_array();

        $this->form_validation->set_rules('nik_meninggal','NIK Orang meninggal','required',['required'=>'NIK Yangg meninggal Masih Kosong']);

        if ($this->form_validation->run() == false) {
            $data['nav'] = "Surat";
            $data['navitems'] = "SKMT";
            $data['title'] = 'Surat Keterangan Kematian'; 
            $this->load->view('templates/header',$data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/sidebar');
            $this->load->view('surat/skmt/index');
            $this->load->view('templates/footer');
        } else {
                                $this->db->join('tb_jabatan','tb_jabatan.id_jabatan = tb_user.id_jabatan');
            $data['pegawai'] = $this->db->get_where('tb_user',['id_user'=>$this->input->post('mengesahkan')])->row_array();
            $data['almarhum'] = $this->db->get_where('tb_warga',['nik'=>$this->input->post('nik_meninggal')])->row_array();
            $data['profil_desa'] = $this->db->get('tb_profil_desa')->row_array();
            $data['meninggal'] = [
                'hari'=>$this->input->post('hari_meninggal'),
                'tanggal'=>$this->input->post('tanggal_meninggal'),
                'penyebab'=>$this->input->post('penyebab'),
                'tempat_meninggal'=>$this->input->post('tempat_meninggal'),
                'nomor_surat'=>$this->input->post('nomor_surat'),
                'tgl_surat'=>$this->input->post('tgl_surat'),
                'keperluan'=>$this->input->post('keperluan'),
                'ttd_tempat'=>$this->input->post('ttd_tempat'),
                'ttd_tgl'=>$this->input->post('ttd_tgl'),
            ];
            $doc = $this->load->view('surat/skmt/doc',$data);
// nik_meninggal
             $data = [
            'id_surat'=> 1,
            'tgl_surat'=> $this->input->post('tgl_surat'),
            'kop_kecamatan'=> $data['profil_desa']['nama_kecamatan'],
            'kop_kelurahan'=> $data['profil_desa']['nama_desa'],
            'kop_alamat'=> $data['profil_desa']['alamat'],
            'no_urut_surat'=> $this->input->post('nomor_surat',true),
            'bulan_surat'=> date('m'),
            'tahun_surat'=> date('Y'),
            'id_pemohon'=> $data['almarhum']['id_warga'],
            'id_pembuat'=> $this->input->post('mengesahkan',true),
            ];

            $this->db->insert('tb_laporan_surat',$data);




        }
        
    	
    }

    public function cari(){
        $data = $this->input->post('data',true);

        $data = $this->db->get_where('tb_warga',['nik'=>$data])->row_array();
        echo json_encode($data);
    }
}
