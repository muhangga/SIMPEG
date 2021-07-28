
<div class="container">

    <h5 class="alert alert-info" style="font-size: 16px;">Hanya bisa mengedit salah satu saja!</h5>
    
    <div class="row">
        <div class="col-lg-6 col-md-6 col-12">
            <div class="card shadow mt-3 border-0">
                <div class="card-body">

                <h4 class="mb-5 alert alert-warning" style="font-size: 17px;">Edit Profile</h4>
                
                <div class="row justify-content-center align-items-center text-center">
                    
                <form action="<?= base_url('Home/edit_profile/') . $user['id_user'] ?>" method="POST" enctype="multipart/form-data">

                    <div class="col-12">
                        
                        <img src="<?= base_url('assets/images/user/') . $user['gambar'] ?> ?>" <?php echo ($user['gambar'] !== 'user.png') ?  "width='180px' height='280px' style='background-size: cover; object-fit: cover; border-radius: 10px;'"  : "class='rounded-circle' width='200px'" ?> class="mt-3" alt="Foto Pegawai">

                        <input type="file" name="gambar" id="gambar" class="mb-5 mt-5">

                            <div class="row text-left">
                                <div class="col-lg-12 col-12">

                                        <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">
                                    
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control border-success" id="email" name="email" value="<?= $user['email'] ?>">
                                            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="nama_lengkap">Nama Lengkap</label>
                                            <input type="text" class="form-control border-success" id="nama_lengkap" name="nama_lengkap" value="<?= $user['nama_lengkap'] ?>">
                                            <?= form_error('nama_lengkap', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="nik">NIK</label>
                                            <input type="text" class="form-control border-success" id="nik" name="nik" value="<?= $user['nik'] ?>" readonly>
                                            <?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="nik">Tempat, Tanggal Lahir</label>
                                            
                                            <div class="row">
                                                <div class="col-7">
                                                    <input type="text" class="form-control border-success" id="tempat" name="tempat" value="<?= $user['tempat'] ?>">
                                                    <?= form_error('tempat', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                                <div class="col-5">
                                                    <input type="date" class="form-control border-success fas fa-fw fa-date" id="ttl" name="ttl" value="<?= $user['ttl'] ?>">
                                                    <?= form_error('ttl', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <textarea class="form-control border-success" name="alamat" id="alamat" name="alamat"><?= $user['alamat'] ?></textarea>
                                            <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="no_telp">No Telepon</label>
                                            <input type="text" class="form-control border-success" id="no_telp" name="no_telp" value="<?= $user['no_telp'] ?>">
                                            <?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-success btn-block py-2">Edit Profile</button>

                                        <hr>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-12">

            <div class="card shadow mt-3 border-0">
                <div class="card-body">
                    
                    <div class="row justify-content-center align-items-center">
                        <div class="col-12">

                        <?php 

                            if ($jabatan['id_user'] != null) : ?>
                                <h4 class="mb-5 alert alert-warning" style="font-size: 17px;">Edit Jabatan</h4>

                                <form action="<?= base_url('home/update_jabatan/') . $user['id_user'] ?>" method="POST">

                                <input type="hidden" name="id_jabatan" value="<?= $jabatan['id_jabatan'] ?>">
                                <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">

                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <input type="text" class="form-control border-success" id="jabatan" name="jabatan" value="<?= $jabatan['jabatan'] ?>" required>
                                        <?= form_error('jabatan', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="tahun">Tahun</label>
                                        <select class="custom-select border-success bg-white text-dark mb-3" id="tahun" name="tahun" required>
                                            <option selected disabled><?= $jabatan['tahun'] ?></option>

                                            <?php 
                                                for ($i = date('Y'); $i >= date('Y') - 20; $i-=1) : ?>
                                                    <option value="<?= $i ?>"><?= $i; ?></option>
                                                <?php endfor; ?>
                                            ?>
                                        </select>
                                            
                                        <?= form_error('tahun', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <button type="submit" class="btn btn-success btn-block py-2">Edit Jabatan</button>
                                </form>

                            <?php else : ?>

                                <h4 class="mb-5 alert alert-warning" style="font-size: 17px;">Tambah Jabatan</h4>

                                <form action="<?= base_url('insert_jabatan')?>" method="POST">

                                    <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">

                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <input type="text" class="form-control border-success" id="jabatan" name="jabatan" value="<?= set_value('jabatan'); ?>" required>
                                        <?= form_error('jabatan', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="tahun">Tahun</label>
                                        <select class="custom-select border-success bg-white text-dark mb-3" id="tahun" name="tahun" required>
                                            <option selected disabled required>Pilih Tahun</option>

                                            <?php 
                                                for ($i = date('Y'); $i >= date('Y') - 20; $i-=1) : ?>
                                                    <option value="<?= $i ?>" name="tahun"><?= $i; ?></option>
                                                <?php endfor; ?>
                                            ?>
                                        </select>
                                        <?= form_error('tahun', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <button type="submit" class="btn btn-success btn-block py-2">Tambah Jabatan</button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>