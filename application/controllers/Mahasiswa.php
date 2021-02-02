<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('MahasiswaModel');
  }

  public function index()
  {
    $data = [
      'title' => 'Home',
      'items' => $this->MahasiswaModel->getData()
    ];

    $this->load->view('mahasiswa/index', $data);
  }

  public function create()
  {
    $data = [
      'title' => 'Create Data'
    ];

    $this->load->view('mahasiswa/tambah', $data);
  }

  public function addingRecord()
  {
    $this->form_validation->set_rules('nim', 'NIM', 'required|numeric|is_unique[mahasiswa.nim]|trim');
    $this->form_validation->set_rules('nama', 'Nama', 'required|min_length[5]|trim');
    $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|min_length[5]|trim');

    if ($this->form_validation->run() == false) {
      $data = [
        'title' => 'Create Data'
      ];
      $this->load->view('mahasiswa/tambah', $data);
    } else {
      $input = [
        'nim' => $this->input->post('nim'),
        'nama' => $this->input->post('nama'),
        'jurusan' => $this->input->post('jurusan'),
      ];

      $this->MahasiswaModel->insertData('mahasiswa', $input);

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan</div>');
      return redirect(base_url('mahasiswa/create'));
    }
  }

  public function edit($nim)
  {
    $data = [
      'title' => 'Create Data',
      'mahasiswa' => $this->db->get_where('mahasiswa', ['nim' => $nim])->row()
    ];

    $this->load->view('mahasiswa/edit', $data);
  }

  public function updaterecord()
  {
    $this->form_validation->set_rules('nim', 'NIM', 'required');
    $this->form_validation->set_rules('nama', 'Nama', 'required|min_length[5]|trim');
    $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|min_length[5]|trim');

    if ($this->form_validation->run() == false) {
      $data = [
        'title' => 'Create Data'
      ];
      $this->load->view('mahasiswa/tambah', $data);
    } else {
      $this->db->set('nama', $this->input->post('nama'));
      $this->db->set('jurusan', $this->input->post('jurusan'));
      $this->db->where('nim', $this->input->post('nim'));
      $this->db->update('mahasiswa');

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate</div>');
      return redirect(base_url('mahasiswa'));
    }
  }

  public function delete($nim)
  {
    $this->db->where('nim', $nim);
    $this->db->delete('mahasiswa');

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
    return redirect(base_url('mahasiswa'));
  }
}
