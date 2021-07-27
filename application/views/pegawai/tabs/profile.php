<div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    
    <div class="card shadow mt-3 border-0">
        <div class="card-body">

            <div class="row justify-content-center">
                <div class="col-3">
                    <img src="<?= base_url('assets/images/user/') . $user['gambar'] ?>" width="150px" class="img-thumnail img-responsive" alt="Foto Pegawai">
                </div>
                <div class="col-md-9 col-sm-3 col-xs-12 col-lg-9 mt-3">
                    <table width="100%">
                        <tr>
                            <td width="30%" class="tag pb-3">
                                Nama
                            </td>
                            <td>
                                <input type="text" class="form-control border-success bg-white text-dark mb-3" value="<?= $user['nama_lengkap'] ?>" readonly>
                            </td>
                        </tr>

                        <tr>
                            <td class="tag pb-3">
                                NIK
                            </td>
                            <td>
                                <input type="text" class="form-control border-success bg-white text-dark mb-3" value="<?= $user['nik'] ?>" readonly>
                            </td>
                        </tr>

                        <tr>
                            <td class="tag mt-3">
                                Tempat/Tanggal Lahir
                            </td>
                            <td>
                                <input type="text" class="form-control border-success bg-white text-dark mb-3" value="<?= $user['ttl'] ?>" readonly>
                            </td>
                        </tr>

                        <tr>
                            <td class="tag pb-3">
                                Alamat Rumah
                            </td>
                            <td>
                                <input type="text" class="form-control border-success bg-white text-dark mb-3" value="<?= $user['alamat'] ?>" readonly>
                            </td>
                        </tr>

                        <tr>
                            <td class="tag pb-3">
                                No Telepon
                            </td>
                            <td>
                                <input type="text" class="form-control border-success bg-white text-dark mb-3" value="<?= $user['no_telp'] ?>" readonly>
                            </td>
                        </tr>
                    </table>
                    <a href="<?= base_url('home/edit_profile/') . $user['id_user'] ?>" class="btn btn-success px-4 mt-4 float-right">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>