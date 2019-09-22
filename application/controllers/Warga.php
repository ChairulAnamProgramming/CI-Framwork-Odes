<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Warga extends CI_Controller
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
         $data['nav'] = "Warga";
         $data['navitems'] = "";
            $data['title'] = 'Data Warga';
            $this->load->view('templates/header',$data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/sidebar');
            $this->load->view('warga/index');
            $this->load->view('templates/footer');
        
    }

    public function tambah(){
        blocked();
        $data['user'] = $this->db->get_where('tb_user',['nik'=>$this->session->userdata('nik')])->row_array();

         $data['warga_desa'] = $this->db->get('tb_warga')->result_array();
         $data['nav'] = "Warga";
            $data['title'] = 'Data Warga';
            $this->load->view('templates/header',$data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/sidebar');
            $this->load->view('warga/tambah');
            $this->load->view('templates/footer');
    }




    public function import(){
        blocked();

        $this->load->library('excel');

        $file = $_FILES['file']['name'];

        if (!$file) {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>Data Inputan Belum Diisi.</div>");
        redirect('Warga');
        }else{

        $ekstensi =  explode(".", $file);

        $file_name = "file-" . round(microtime(true)) . "." . end($ekstensi);
        $sumber = $_FILES['file']['tmp_name'];
        $target_dir = 'assets/xlsx/';
        $target_file = $target_dir . $file_name;
        move_uploaded_file($sumber, $target_file);

        $obj = PHPExcel_IOFactory::load($target_file);

        $all_data = $obj->getActiveSheet()->toArray(null, true, true, true);
        if ($all_data[1]['A'] != "NAMADESA_KEL" || $all_data[1]['B'] != "NO_KK" || $all_data[1]['C'] != "NIK") {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Format XLSX Salah Tidak Sesui Dengan Template XLSX</div>');
                redirect('Warga');
        }else{
                
        $sql = "INSERT INTO tb_warga (namadesa_kel,no_kk,nik,nama_lengkap,jk,tmpt_lhr,tgl_lhr,nama_ibu,nama_ayah,gol_darah,agama,pendidikan_akhir,pekerjaan,stts_hub_kel,status_kawin,no_rt,no_rw,status_pendudu) VALUES";
        
        for ($i = 2; $i <= count($all_data); $i++) {

            $namadesa_kel = $all_data[$i]['A'];
            $no_kk = $all_data[$i]['B'];
            $nik = $all_data[$i]['C'];
            $nama_lengkap = $all_data[$i]['D'];
            $jk = $all_data[$i]['E'];
            $tmpt_lhr = $all_data[$i]['F'];
            $tgl_lhr = $all_data[$i]['G'];
            $nama_ibu = $all_data[$i]['H'];
            $nama_ayah = $all_data[$i]['I'];
            $gol_darah = $all_data[$i]['J'];
            $agama = $all_data[$i]['J'];
            $pendidikan_akhir = $all_data[$i]['L'];
            $pekerjaan = $all_data[$i]['M'];
            $stts_hub_kel = $all_data[$i]['N'];
            $status_kawin = $all_data[$i]['O'];
            $no_rt = $all_data[$i]['P'];
            $no_rw = $all_data[$i]['Q'];
            $status_pendudu = $all_data[$i]['R'];
            $sql .= "('$namadesa_kel','$no_kk','$nik','$nama_lengkap','$jk','$tmpt_lhr','$tgl_lhr','$nama_ibu','$nama_ayah','$gol_darah','$agama','$pendidikan_akhir','$pekerjaan','$stts_hub_kel','$status_kawin','$no_rt','$no_rw','$status_pendudu'),";
        }
        $sql = substr($sql, 0, -1);
        unlink($target_file);
        $this->db->query($sql);
        $this->session->set_flashdata('message', "<div class='alert alert-success'>Data Warga Berhasil Diimport.</div>");
        redirect('Warga');
        }

    }

    }


    public function hapus($id){
        blocked();
        $this->db->delete('tb_warga',['id_warga'=>$id]);
        $this->session->set_flashdata('message','Data');
        $this->session->set_flashdata('message', "<div class='alert alert-danger'>Data Warga Berhasil Dihapus.</div>");
        redirect('Warga');
    }


}
