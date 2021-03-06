<?php

namespace App\Controllers;

use App\Models\PemeriksaanModel;
use App\Models\PemeriksaanObatModel;
use CodeIgniter\API\ResponseTrait;

class Pemeriksaan extends BaseController
{
  use ResponseTrait;

  protected $pemeriksaanModel;
  protected $pemeriksaanObatModel;

  public function __construct()
  {
    $this->pemeriksaanModel = new PemeriksaanModel();
    $this->pemeriksaanObatModel = new PemeriksaanObatModel();
  }

  public function getAllPemeriksaan()
  {
    $data = $this->pemeriksaanModel->findAll();
    return $this->respond($data, 200);
  }

  public function createPemeriksaan()
  {
    $data = [
      'tanggalPemeriksaan' => $this->request->getPost('tanggalPemeriksaan'),
      'suhu' => $this->request->getPost('suhu'),
      'beratBadan' => $this->request->getPost('beratBadan'),
      'tinggiBadan' => $this->request->getPost('tinggiBadan'),
      'kunjungan' => $this->request->getPost('kunjungan'),
      'keluhan' => $this->request->getPost('keluhan'),
      'idPasien' => $this->request->getPost('idPasien'),
      'idPerawat' => $this->request->getPost('idPerawat'),
      'idPuskesmas' => $this->request->getPost('idPuskesmas'),
    ];
    $this->pemeriksaanModel->insert($data);
    return $this->respond("Successfully Insert Pemeriksaan", 201);
  }
}
