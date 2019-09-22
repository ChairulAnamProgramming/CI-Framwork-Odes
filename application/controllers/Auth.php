<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function index()
	{
		if ($this->session->userdata('nik')) {
			redirect('User');
		}
		$this->form_validation->set_rules('nik_pddk', 'NIK Penduduk', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');


		if ($this->form_validation->run() == false) {
			$data['title'] = "Login";
			$this->load->view('auth/header', $data);
			$this->load->view('auth/login');
			$this->load->view('auth/footer');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$nik_pddk = $this->input->post('nik_pddk', true);
		$password = $this->input->post('password', true);

		$user = $this->db->get_where('tb_user', ['nik' => $nik_pddk])->row_array();
		if ($user != null) {
			if (password_verify($password, $user['password'])) {
				$data = [
					'role' => $user['role'],
					'nik' => $user['nik'],
				];
				$this->session->set_userdata($data);
				switch ($user['role']) {
					case 'Super Admin':
						redirect('User');
						break;
					case 'Admin':
						echo "Admin";
						break;

					default:
						redirect('User');
						break;
				}
			} else {
				$this->session->set_flashdata('message', "<div class='alert alert-danger'>Password Anda Salah.</div>");
				redirect('Auth');
			}
		} else {
			$this->session->set_flashdata('message', "<div class='alert alert-danger'>NIK Anda Belum Pernah Terdaftar.</div>");
			redirect('Auth');
		}
	}

	public function registrasi()
	{
		if ($this->session->userdata('nik')) {
			redirect('User');
		}
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
			'required' => 'Nama Masih Kosong'
		]);
		$this->form_validation->set_rules('nik_pddk', 'NIK Penduduk', 'required|trim|is_unique[tb_user.nik]', [
			'required' => 'NIK Masih Kosong',
			'is_unique' => 'NIK Sudah Terdaftar',
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]', [
			'required' => 'Password Masih Kosong',
			'min_length' => 'Password terlalu pendek'
		]);


		if ($this->form_validation->run() == false) {
			$data['title'] = "Registrasi";
			$this->load->view('auth/header', $data);
			$this->load->view('auth/registrasi');
			$this->load->view('auth/footer');
		} else {
			$data = [
				'id_user' => rand(),
				'nik' => $this->input->post('nik_pddk', true),
				'nama_user' => $this->input->post('nama', true),
				'jk' => $this->input->post('jk', true),
				'tmpt_lhr' => '-',
				'tgl_lhr' => date('Y-m-d'),
				'id_jabatan' => '2',
				'foto' => 'default.jpg',
				'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
				'role' => 'User'
			];

			$this->db->insert('tb_user', $data);
			$this->session->set_flashdata('message', "<div class='alert alert-success'>Akun Anda Berhasil Dibuat.</div>");
			redirect('Auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('nik');
		$this->session->unset_userdata('role');
		$this->session->set_flashdata('message', "<div class='alert alert-success'>Anda Berhasil Logout.</div>");
		redirect('Auth');
	}

	public function blocked()
	{
		$this->load->view('blok');
	}
}
