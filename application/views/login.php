
<body color="#DEDEDE">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login" style="background-color: #1F9C5A;">
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
                                   <h1 class="h4 mb-5 text-success font-weight-bold">Login</h1>

                                   <?= $this->session->flashdata('gagal'); ?>

                                    <form action="<?= base_url('auth') ?>" method="POST">
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

                                        <button type="submit" class="btn btn-success btn-block py-2">
                                            Login
                                        </button>

                                        <hr>
                                    <div class="text-right">
                                        <span>Belum punya akun? </span>
                                        <a href="<?= base_url('register') ?>" class="text-success">Daftar akun disini!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
