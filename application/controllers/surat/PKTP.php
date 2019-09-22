<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PKTP extends CI_Controller
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

        $this->form_validation->set_rules('nik_pemohon','NIK Pemohon','required',['required'=>'NIK Pemohon Masih Kosong']);

        if ($this->form_validation->run() == false) {
            $data['nav'] = "Surat";
            $data['navitems'] = "PKTP";
            $data['title'] = 'Surat Pengantar KTP';
            $this->load->view('templates/header',$data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/sidebar');
            $this->load->view('surat/pktp/index');
            $this->load->view('templates/footer');
        } else {
            $data['pemohon'] = $this->db->get_where('tb_warga',['nik'=>$this->input->post('nik_pemohon')])->row_array();
            $data['profil_desa'] = $this->db->get('tb_profil_desa')->row_array();
                                $this->db->join('tb_jabatan','tb_jabatan.id_jabatan = tb_user.id_jabatan');
            $data['pegawai'] = $this->db->get_where('tb_user',['id_user'=>$this->input->post('mengesahkan')])->row_array();
            
            $data['surat'] = [
                'keperluan'=>$this->input->post('keperluan'),
                'nomor_surat'=>$this->input->post('nomor_surat'),
                'tgl_surat'=>$this->input->post('tgl_surat'),
                'ttd_tempat'=>$this->input->post('ttd_tempat'),
                'ttd_tgl'=>$this->input->post('ttd_tgl'),
            ];

            $this->load->view('surat/pktp/doc',$data);

                 $data = [
                    'id_surat'=> 3,
                    'tgl_surat'=> $this->input->post('tgl_surat'),
                    'kop_kecamatan'=> $data['profil_desa']['nama_kecamatan'],
                    'kop_kelurahan'=> $data['profil_desa']['nama_desa'],
                    'kop_alamat'=> $data['profil_desa']['alamat'],
                    'no_urut_surat'=> $this->input->post('nomor_surat',true),
                    'bulan_surat'=> date('m'),
                    'tahun_surat'=> date('Y'),
                    'id_pemohon'=> $data['pemohon']['id_warga'],
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
