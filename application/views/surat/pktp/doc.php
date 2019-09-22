<?php

$document = file_get_contents("assets/format_surat/format_pengantar_ktp.rtf");

// pengondisian bulan 
if( date('m') == '01'){
$date= date('d') . ' Januari';
}elseif(date('m') == '02'){
  $mount= 'Februari';
}elseif(date('m') == '03'){
  $mount= 'Maret';
}elseif(date('m') == '04'){
  $mount= 'April';
}elseif(date('m') == '05'){
  $mount= 'Mei';
}elseif(date('m') == '06'){
  $mount= 'Juni';
}elseif(date('m') == '07'){
  $mount= 'Juli';
}elseif(date('m') == '08'){
  $mount= 'Agustus';
}elseif(date('m') == '09'){
  $mount= 'September';
}elseif(date('m') == '10'){
  $mount= 'Oktober';
}elseif(date('m') == '11'){
  $mount= 'November';
}elseif(date('m') == '12'){
  $mount= 'Desember';
}

if ($profil_desa['klasifikasi'] == "Desa") {
    $kepaladesaataulurah = "Kepala Desa";
}else if($profil_desa['klasifikasi'] =="Kelurahan"){
    $kepaladesaataulurah = "Lurah";
}else{
  $kepaladesaataulurah = "Kepala Desa";
}



$tgl_pengesahan = date('d-m-Y', strtotime($surat['ttd_tgl']));

 
// Bagian data surat

$document = str_replace("[kec]", $profil_desa['nama_kecamatan'], $document);
$document = str_replace("[klasifikasi]", $profil_desa['klasifikasi'], $document);
$document = str_replace("[kel]", $profil_desa['nama_desa'], $document);
$document = str_replace("[alamat_kop]", $profil_desa['alamat'], $document);
$document = str_replace("[no_urut]", $surat['nomor_surat'], $document);
$document = str_replace("[bln_surat]", $mount, $document);
$document = str_replace("[thn_surat]", date('Y') , $document);
$document = str_replace("[kepaladesaataulurah]",  $kepaladesaataulurah , $document);
$document = str_replace("[lurah]",  $profil_desa['nama_desa'] , $document);
$document = str_replace("[camat]",  $profil_desa['nama_kecamatan'] , $document);
$document = str_replace("[ttd_nama]", $pegawai['nama_user'], $document);
$document = str_replace("[ttd_jabatan]", $pegawai['nama_jabatan'], $document);

// Data Pemohon 
$document = str_replace("[pddk_nama]", $pemohon['nama_lengkap'], $document);
$document = str_replace("[pddk_nik]", $pemohon['nik'], $document);
$document = str_replace("[pddk_jk]", $pemohon['jk'], $document);
$document = str_replace("[pddk_tempat]", $pemohon['tmpt_lhr'], $document);
$document = str_replace("[pddk_tgl_lahir]", $pemohon['tgl_lhr'], $document);
$document = str_replace("[pddk_darah]", $pemohon['gol_darah'], $document);
$document = str_replace("[pddk_status]", $pemohon['status_kawin'], $document);
$document = str_replace("[pddk_kerja]", $pemohon['pekerjaan'], $document);
$document = str_replace("[pddk_agama]", $pemohon['agama'], $document);
$document = str_replace("[pddk_alamat]", $pemohon['alamat'], $document);

// Data surat
$document = str_replace("[keperluan]", $surat['keperluan'], $document);


$document = str_replace("[ttd_tempat]", $surat['ttd_tempat'], $document);
$document = str_replace("[ttd_tanggal]", $tgl_pengesahan, $document);
$document = str_replace("[ttd_nip]", $pegawai['nik'], $document);

// header untuk membuka file output RTF dengan MS. Word
header("Content-type: application/msword");
header("Content-disposition: inline; filename=PKTP.doc");
header("Content-length: ".strlen($document));
echo $document;
