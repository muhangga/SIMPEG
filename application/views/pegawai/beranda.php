<div class="container-fluid">
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="data-jabatan-tab" data-toggle="tab" href="#data-jabatan" role="tab" aria-controls="data-jabatan" aria-selected="false">Data Jabatan</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="data-arsip-pegawai-tab" data-toggle="tab" href="#data-arsip-pegawai" role="tab" aria-controls="data-arsip-pegawai" aria-selected="false">Data Arsip Pegawai</a>
    </li>
  </ul>
 
  <?php if($this->session->flashdata('sukses')) : ?>
    <div class="flash-data-success" data-sukses="<?= $this->session->flashdata('sukses');?>"></div>
  <?php elseif($this->session->flashdata('gagal')) : ?>
    <div class="flash-data-failed" data-gagal="<?= $this->session->flashdata('gagal');?>"></div>
  <?php endif ?>

  <div class="tab-content" id="myTabContent">

  <?php $this->load->view('pegawai/tabs/profile'); ?>
  <?php $this->load->view('pegawai/tabs/data_jabatan'); ?>
  <?php $this->load->view('pegawai/tabs/data_arsip_pegawai'); ?>

</div>
