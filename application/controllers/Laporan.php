<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login();
        blocked();
    }

    public function index(){
    	$data['user'] = $this->db->get_where('tb_user',['nik'=>$this->session->userdata('nik')])->row_array();
                                 $this->db->order_by('nama_surat','ASC');
        $data['kateg_laporan'] = $this->db->get('tb_surat')->result_array();

        $data['nav'] = "Laporan";
        $data['navitems'] = "";
    	$data['title'] = 'Laporan Surat';
        $this->load->view('templates/header',$data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('laporan/index');
        $this->load->view('templates/footer');
    }

    public function change(){
       $id_surat = $this->input->post('data');

                    $this->db->join('tb_user','tb_user.id_user = tb_laporan_surat.id_pembuat');
                    $this->db->join('tb_warga','tb_warga.id_warga = tb_laporan_surat.id_pemohon');
        $laporan = $this->db->get_where('tb_laporan_surat',['id_surat'=>$id_surat])->result_array();

        if (!$laporan) {
            $tbody = '
                    <tr>
                      <td class="text-center text-warning" colspan="5"> Data Masih Kosong</td>
                    </tr>
            ';
                echo $tbody;

        } else {

            foreach ($laporan as $key) {
                $message = 'Apakah Anda Yakin';
                $kirim = '<a href="#" style="margin:0 5px;" title="Kirim SMS Ke '.$key["nama_lengkap"].'"><i class="fas fa-paper-plane"></i></a>';
                $hapus = '<a href="'.base_url().'Laporan/hapus/'.$key["id_laporan_surat"].'" style="margin:0 5px;" onClick="return confirm('.$message.');" title="Hapus Data '.$key["nama_lengkap"].'"><i class="fas fa-trash"></i></a>';
                            


                // $tanggal = date('d-m-Y', strtotime($key["tgl_surat_rtrw"]));
                $tbody = '
                        <tr>
                          <td style="padding:10px;border-bottom:1px solid #999;">'.$key["tgl_surat"].'</td>
                          <td style="padding:10px;border-bottom:1px solid #999;">'.$key["nama_lengkap"].'</td>
                          <td style="padding:10px;border-bottom:1px solid #999;">'.$key["nik"].'</td>
                          <td style="padding:10px;border-bottom:1px solid #999;">'.$key["nama_user"].'</td>
                          <td style="padding:10px;border-bottom:1px solid #999;">'.$key["no_urut_surat"].'</td>
                          <td style="padding:10px;border-bottom:1px solid #999;">
                            '.$kirim.'
                            '.$hapus.'
                          </td>
                        </tr>';
                echo $tbody;
            }   
        }
    }

    public function hapus($id){
        $this->db->delete('tb_laporan_surat',['id_laporan_surat'=>$id]);
        $this->session->set_flashdata('message',"<div class='alert alert-danger'>Laporan Surat Berhasil Dihapus.</div>");
        redirect('Laporan');
    }

    public function dompdf($id){
        $this->load->library('Dompdf_gen');
        $data['user'] = $this->db->get_where('tb_user',['nik'=>$this->session->userdata('nik')])->row_array();
                                 $this->db->order_by('no_urut_surat','ASC');
                                 $this->db->join('tb_user','tb_user.id_user = tb_laporan_surat.id_pembuat');
                                 $this->db->join('tb_warga','tb_warga.id_warga = tb_laporan_surat.id_pemohon');
        $data['laporan_surat'] = $this->db->get_where('tb_laporan_surat',['id_surat'=>$id])->result_array();
        $data['kelurahan'] = $this->db->get('tb_profil_desa')->row_array();
        $data['title'] = "Print Laporan";
        $this->load->view('laporan/dompdf',$data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan_Surat.pdf",['Attachment' => 0]);
    }

    public function print($id){
        $data['user'] = $this->db->get_where('tb_user',['nik'=>$this->session->userdata('nik')])->row_array();
                                $this->db->order_by('no_urut_surat','ASC');
                                 $this->db->join('tb_user','tb_user.id_user = tb_laporan_surat.id_pembuat');
                                 $this->db->join('tb_warga','tb_warga.id_warga = tb_laporan_surat.id_pemohon');
        $data['laporan_surat'] = $this->db->get_where('tb_laporan_surat',['id_surat'=>$id])->result_array();
        $data['kelurahan'] = $this->db->get('tb_profil_desa')->row_array();
        $data['title'] = "Print Laporan";
        $this->load->view('templates/header',$data);
        $this->load->view('laporan/print',$data);
    }
}
