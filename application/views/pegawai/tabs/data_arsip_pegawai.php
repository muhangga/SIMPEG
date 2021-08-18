<div class="tab-pane fade" id="data-arsip-pegawai" role="tabpanel" aria-labelledby="data-arsip-pegawai-tab">

<?php if ($user['role'] == 'admin') : ?>
    <div class="row justify-content-end">
        <button type="button" class="btn btn-primary  mt-4 mb-2 mr-3" data-toggle="modal" data-target="#jenisFile">+Tambah Jenis File</button>
        <button type="button" class="btn btn-danger mt-4 mb-2 mr-3" data-toggle="modal" data-target="#deleteFile"><i class="fa fa-trash p-1 mr-1"></i>Hapus Jenis File</button>
    </div>
<?php endif; ?>
    
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message');?>"></div>


    <div class="card shadow mt-3 border-0">
        <div class="card-body">

            <form action="<?= base_url('Home') ?>" method="POST" enctype="multipart/form-data">
                <table>
                    
                    <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">

                    <tr>
                        <td width="40%" class="tag pb-2">Jenis File</td>
                        <td>
                            <div class="input-group mb-3">
                                <select class="custom-select border-success bg-white text-dark mb-3" id="jenis_file" name="jenis_file" value="<?= set_value('jenis_file'); ?>" required>
                                    <option selected>Jenis File</option>
                                    <?php foreach($jenis_file as $jf) : ?>
                                        <option value="<?= $jf['jenis_file'] ?>"><?= $jf['jenis_file'] ?></option>
                                    <?php endforeach; ?>
                                    <?= form_error('jenis_file', '<small class="text-danger">', '</small>'); ?>
                                </select>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="tag pb-2">Keterangan</td>
                        <td>
                            <div class="input-group">
                                <input type="text" class="form-control border-success bg-white text-dark mb-3" name="keterangan" required value="<?= set_value('keterangan'); ?>">
                            </div>
                            <?= form_error('keterangan', '<small class="text-danger">', '</small>'); ?>
                        </td>
                    </tr>

                    <tr>
                        <td class="tag pb-2">Deksripsi<br><span style="font-size: 10px; color: red; font-style: italic;">(Upload File PDF - Max 5MB)</span></td>
                        <td>
                            <div class="custom-file mt-4">
                                <input type="file" class="custom-file-input border-success" id="deksripsi" name="deksripsi" required value="<?= set_value('deksripsi'); ?>">
                                <label class="custom-file-label" for="deksripsi">Pilih file</label>
                                <?= form_error('deksripsi', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </td>
                    </tr>
                </table>
                <button class="btn btn-success px-4 mt-4">Upload File</button>
            </form>
        </div>
    </div>


    <h4 class="mt-5 mb-3">Daftar File</h4>

    <div class="card shadow mb-5">
        <div class="card-body">
            <div class="table-responsive">
                  <table id="example" class="table table-bordered table-md">
                    <thead class="bg-success text-white" style="font-size: 15px;">
                        <tr>
                            <th>No</th>
                            <th>Tanggal Upload</th>
                            <th>Jenis File</th>
                            <th>Keterangan</th>
                            <th>File</th>
                        </tr>
                    </thead>
                        
                    <tbody style="font-size: 14px;" class="text-dark">
                        <?php 
                        $no = 1;
                        foreach($data_arsip as $data) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['tgl_upload'] ?></td>
                            <td><?= $data['jenis_file']?></td>
                            <td><?= $data['keterangan']?></td>
                            <td>
                                <a href="<?= base_url('assets/file/') . $data['deksripsi'] ?>" target="_blank" class="btn btn-primary btn-xs btn-sm"><i class="fa fa-search p-1" id="detail" title="Detail File"></i></a>
                                
                                <a href="<?= base_url('Home/hapus_file/') . $data['id_arsip'] ?>" class="btn btn-danger btn-xs btn-sm tombol-hapus"><i class="fa fa-trash p-1" id="hapus" title="Hapus File"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="jenisFile" tabindex="-1" aria-labelledby="jenisFileLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="jenisFileLabel">Tambah Jenis File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form action="<?= base_url('Home/insert_jenis_file') ?>" method="POST">
        <div class="form-group">
            <label for="jenis_file">Jenis File</label>
            <input type="text" class="form-control border-success" id="jenis_file" name="jenis_file" value="<?= set_value('jenis_file'); ?>">
            <?= form_error('jenis_file', '<small class="text-danger">', '</small>'); ?>
        </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
      </form>

    </div>
  </div>
</div>

<div class="modal fade" id="deleteFile" tabindex="-1" aria-labelledby="deleteFileLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteFileLabel">Hapus Jenis File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form action="<?= base_url('Home/delete_jenis_file') ?>" method="POST">

            <?php if (!empty($jenis_file)) : ?>
            
                <?php foreach($jenis_file as $jf) : ?>
                    <div class="form-group">
                        <input type="checkbox" name="jenis_file[]" id="jenis_file[]" value="<?= $jf['jenis_file'] ?>">
                        <span class="ml-1"><?= $jf['jenis_file'] ?></span>
                    </div>
                <?php endforeach; ?>

            <?php else : ?>
                <div class="form-group">
                    <p>Tidak ada Jenis File, silahkan tambahkan terlebih dahulu!</p>
                </div>
            <?php endif; ?>

        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-danger">Hapus</button>
        </div>
      </form>

    </div>
  </div>
</div>