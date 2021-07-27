
<body color="#DEDEDE">

<div class="container">

    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login" style="background-color: #1F9C5A; ">
                            <div class="text-center mt-5 p-3">
                                <h2 class="mb-5 text-white">
                                    Sistem Informasi Manajemen Kepegawaian <br> (SIMPEG)
                                </h2>
                                <img src="<?= base_url('assets/images/logo.png') ?>" width="150" alt="Logo BPATP">
                                <h4 class="mt-5 mb-5 text-white">
                                    Badan Pengelola Alih Teknologi <br> Pertanian <br> (BPATP)
                                </h4>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                               <h1 class="h4 mb-5 text-success font-weight-bold">Daftar Akun</h1>
                               
                               <div class="flash-data" data-flashdata="<?= $this->session->flashdata('sukses'); ?>"></div>

                                <form action="<?= base_url('Auth/register') ?>" method="POST">

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control border-success" id="email" name="email" value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control border-success" id="password" name="password">
                                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_lengkap">Nama Lengkap</label>
                                        <input type="text" class="form-control border-success" id="nama_lengkap" name="nama_lengkap" value="<?= set_value('nama_lengkap'); ?>">
                                        <?= form_error('nama_lengkap', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                        <input type="text" class="form-control border-success" id="nik" name="nik" value="<?= set_value('nik'); ?>">
                                        <?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="nik">Tempat, Tanggal Lahir</label>
                                        
                                        <div class="row">
                                            <div class="col-7">
                                                <input type="text" class="form-control border-success" id="ttl" name="ttl">
                                                <?= form_error('ttl', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <div class="col-5">
                                                <input type="date" class="form-control border-success fas fa-fw fa-date" id="ttl" name="ttl">
                                                <?= form_error('ttl', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control border-success" name="alamat" id="alamat" name="alamat"></textarea>
                                        <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="no_telp">No Telepon</label>
                                        <input type="number" class="form-control border-success" id="no_telp" name="no_telp">
                                        <?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-success btn-block py-2">Daftar</button>

                                    <hr>
                                </form>
                                <div class="text-right">
                                    <span>Sudah punya akun? </span>
                                    <a href="<?= base_url('login') ?>" class="text-success">Login disini</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>