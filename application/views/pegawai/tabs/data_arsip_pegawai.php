<div class="tab-pane fade" id="data-arsip-pegawai" role="tabpanel" aria-labelledby="data-arsip-pegawai-tab">

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
                                    <option value="KTP">KTP</option>
                                    <option value="Kartu Keluarga">Kartu Keluarga</option>
                                    <option value="Dokumen Kontrak">Dokumen Kontrak</option>
                                    <option value="Ijazah">Ijazah</option>
                                    <?= form_error('jenis_file', '<small class="text-danger">', '</small>'); ?>
                                </select>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="tag pb-2">Keterangan</td>
                        <td>
                            <div class="input-group">
                                <input type="text" class="form-control border-success bg-white text-dark" name="keterangan" required value="<?= set_value('keterangan'); ?>">
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
                  <table id="example" class="table table-striped table-bordered table-md">
                    <thead>
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