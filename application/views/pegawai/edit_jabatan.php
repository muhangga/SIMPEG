
<div class="container">

<div class="row justify-content-center">
    <div class="col-10">
        <h5 class="alert alert-info" style="font-size: 16px;">Update Data Jabatan Anda!</h5>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-10">
        <div class="card shadow mt-3 mb-5 border-0">
            <div class="card-body">
            
            <div class="row">

                <div class="col-12">
        
                    <?php 
                
                    if ($jabatan['id_user'] != null) : ?>
                        <h4 class="mb-5 alert alert-warning" style="font-size: 17px;">Edit Jabatan</h4>

                        <form action="<?= base_url('Home/update_jabatan') ?>" method="POST">

                        <input type="hidden" name="id_jabatan" value="<?= $jabatan['id_jabatan'] ?>">
                        <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">

                        <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" class="form-control border-success" id="jabatan1" name="jabatan1" value="<?= $jabatan['jabatan1'] ?>">
                                <?= form_error('jabatan', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <select class="custom-select border-success bg-white text-dark mb-3" id="tahun1" name="tahun1" required>
                                    <option selected disabled required>Pilih Tahun</option>

                                    <?php 
                                        for ($i = date('Y'); $i >= date('Y') - 20; $i-=1) : ?>
                                            <option value="<?= $i ?>" name="tahun"><?= $i; ?></option>
                                        <?php endfor; ?>
                                    ?>
                                </select>
                                <?= form_error('tahun', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" class="form-control border-success" id="jabatan2" name="jabatan2" value="<?= $jabatan['jabatan2'] ?>">
                                <?= form_error('jabatan', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <select class="custom-select border-success bg-white text-dark mb-3" id="tahun2" name="tahun2" required>
                                    <option selected disabled required>Pilih Tahun</option>

                                    <?php 
                                        for ($i = date('Y'); $i >= date('Y') - 20; $i-=1) : ?>
                                            <option value="<?= $i ?>" name="tahun"><?= $i; ?></option>
                                        <?php endfor; ?>
                                    ?>
                                </select>
                                <?= form_error('tahun', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" class="form-control border-success" id="jabatan3" name="jabatan3" value="<?= $jabatan['jabatan3'] ?>">
                                <?= form_error('jabatan', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <select class="custom-select border-success bg-white text-dark mb-3" id="tahun3" name="tahun3" required>
                                    <option selected disabled required>Pilih Tahun</option>

                                    <?php 
                                        for ($i = date('Y'); $i >= date('Y') - 20; $i-=1) : ?>
                                            <option value="<?= $i ?>" name="tahun"><?= $i; ?></option>
                                        <?php endfor; ?>
                                    ?>
                                </select>
                                <?= form_error('tahun', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <button type="submit" class="btn btn-success btn-block py-2" name="tambah_jabatan">Edit Jabatan</button>
                        </form>

                    <?php else : ?>

                        <!-- TAMBAH JABATAN -->

                        <h4 class="mb-5 alert alert-warning" style="font-size: 17px;">Tambah Jabatan</h4>
                        <div class="row justify-content-center">
                            <div class="col-8">

                                <form action="<?= base_url('Home/edit_jabatan/') . $user['id_user'] ?>" method="POST">

                                    <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">

                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <input type="text" class="form-control border-success" id="jabatan1" name="jabatan1" value="<?= set_value('jabatan1'); ?>">
                                        <?= form_error('jabatan1', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="tahun">Tahun</label>
                                        <select class="custom-select border-success bg-white text-dark mb-3" id="tahun1" name="tahun1" required>
                                            <option selected disabled required>Pilih Tahun</option>

                                            <?php 
                                                for ($i = date('Y'); $i >= date('Y') - 20; $i-=1) : ?>
                                                    <option value="<?= $i ?>" name="tahun"><?= $i; ?></option>
                                                <?php endfor; ?>
                                            ?>
                                        </select>
                                        <?= form_error('tahun1', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <input type="text" class="form-control border-success" id="jabatan2" name="jabatan2" value="<?= set_value('jabatan2'); ?>">
                                        <?= form_error('jabatan2', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="tahun">Tahun</label>
                                        <select class="custom-select border-success bg-white text-dark mb-3" id="tahun2" name="tahun2" required>
                                            <option selected disabled required>Pilih Tahun</option>

                                            <?php 
                                                for ($i = date('Y'); $i >= date('Y') - 20; $i-=1) : ?>
                                                    <option value="<?= $i ?>" name="tahun"><?= $i; ?></option>
                                                <?php endfor; ?>
                                            ?>
                                        </select>
                                        <?= form_error('tahun2', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <input type="text" class="form-control border-success" id="jabatan3" name="jabatan3" value="<?= set_value('jabatan3'); ?>">
                                        <?= form_error('jabatan3', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="tahun">Tahun</label>
                                        <select class="custom-select border-success bg-white text-dark mb-3" id="tahun3" name="tahun3" required>
                                            <option selected disabled required>Pilih Tahun</option>

                                            <?php 
                                                for ($i = date('Y'); $i >= date('Y') - 20; $i-=1) : ?>
                                                    <option value="<?= $i ?>" name="tahun"><?= $i; ?></option>
                                                <?php endfor; ?>
                                            ?>
                                        </select>
                                        <?= form_error('tahun3', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-block py-2" name="tambah_jabatan">Tambah Jabatan</button>
                                </div>
                            </div>
                        </form>
                    <?php endif; ?>    

                </div>
            </div>  
        </div>
    </div>
</div>