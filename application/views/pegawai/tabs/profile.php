<div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">

<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message');?>"></div>
    
    <div class="card shadow mt-3 mb-5 border-0">
        <div class="card-body">

            <div class="row">
                <div class="col-lg-3 col-md-3 col-12 text-center">
                    <img src="<?= base_url('assets/images/user/') . $user['gambar'] ?> ?>" <?php echo ($user['gambar'] !== 'user.png') ?  "width='180px' height='280px' style='background-size: cover; object-fit: cover; border-radius: 10px;'"  : "width='160px'" ?> class="mb-5 mt-3" alt="Foto Pegawai">
                </div>
                <div class="col-12 col-md-8 col-lg-8 mt-4">
                    <table width="100%">
                        <tr>
                            <td width="30%" class="tag pb-4">
                                Nama
                            </td>
                            <td>
                                <input type="text" class="form-control border-success bg-white text-dark mb-4" value="<?= $user['nama_lengkap'] ?>" readonly>
                            </td>
                        </tr>

                        <tr>
                            <td class="tag pb-4">
                                NIK
                            </td>
                            <td>
                                <input type="text" class="form-control border-success bg-white text-dark mb-4" value="<?= $user['nik'] ?>" readonly>
                            </td>
                        </tr>

                        <tr>
                            <td class="tag pb-4">
                                Tempat/Tanggal Lahir
                            </td>
                            <td>
                                <input type="text" class="form-control border-success bg-white text-dark mb-4" value="<?=$user['tempat'] . ", " . $user['ttl'] ?>" readonly>
                            </td>
                        </tr>

                        <tr>
                            <td class="tag pb-4">
                                Alamat Rumah
                            </td>
                            <td>
                                <textarea class="form-control bg-white border-success text-dark" cols="10" rows="3" readonly><?= $user['alamat'] ?></textarea>
                            </td>
                        </tr>

                        <!-- <tr>
                            <td class="tag pb-4">
                                Alamat Rumah
                            </td>
                            <td>
                                <input type="text" class="form-control border-success bg-white text-dark mb-4" value="<?= $user['alamat'] ?>" readonly>
                            </td>
                        </tr> -->

                        <tr>
                            <td class="tag pb-4 pt-4">
                                No Telepon
                            </td>
                            <td>
                                <input type="text" class="form-control border-success bg-white text-dark mb-4 mt-4" value="<?= $user['no_telp'] ?>" readonly>
                            </td>
                        </tr>

                        <tr>
                            <td class="tag pb-4">
                                No BPJS
                            </td>
                            <td>
                                <input type="text" class="form-control border-success bg-white text-dark mb-4" value="<?= (!$user['bpjs']) ?  "-" :  $user['bpjs'] ?>" readonly>
                            </td>
                        </tr>

                        <tr>
                            <td class="tag pb-4">
                                NIP
                            </td>
                            <td>
                                <input type="text" class="form-control border-success bg-white text-dark mb-4" value="<?= (!$user['nip']) ?  "-" :  $user['nip'] ?>" readonly>
                            </td>
                        </tr>

                        <tr>
                            <td class="tag pb-4">
                                NPWP
                            </td>
                            <td>
                                <input type="text" class="form-control border-success bg-white text-dark mb-4" value="<?= (!$user['npwp']) ?  "-" :  $user['npwp'] ?>" readonly>
                            </td>
                        </tr>
                    </table>
                    <a href="<?= base_url('home/edit_profile/') . $user['id_user'] ?>" class="btn btn-success px-4 mt-4 float-right">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>