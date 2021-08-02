<div class="container">

<div class="alert alert-info" style="font-size: 22px;">Data Pegawai</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="example" width="100%" cellspacing="0">
                <thead class="bg-success text-white" style="font-size: 15px;">
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>NIK</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th>Gambar</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-center" style="font-size: 14px;">
                        <?php 
                            $no = 1;
                            foreach ($get_user as $all_user) : ?>  
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $all_user['nama_lengkap'] ?></td>
                            <td><?= $all_user['email'] ?></td>
                            <td><?= $all_user['nik'] ?></td>
                            <td><?= $all_user['tempat'] . "," . $all_user['ttl'] ?></td>
                            <td><?= $all_user['alamat'] ?></td>
                            <td><?= $all_user['no_telp'] ?></td>
                            <td class="text-center">
                                <img src="<?= base_url('assets/images/user/') . $all_user['gambar'] ?>" width="60px">
                            </td>
                            <td><?= $all_user['role'] ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('Home/edit_profile/') . $all_user['id_user'] ?>" class="btn btn-primary btn-xs btn-sm mb-2"><i class="fa fa-edit p-1" id="Edit" title="Edit Profile"></i></a>
                                
                                <a href="<?= base_url('Home/delete_user/') . $all_user['id_user'] ?>" class="btn btn-danger btn-xs btn-sm tombol-hapus"><i class="fa fa-trash p-1" id="hapus" title="Hapus Data Pegawao"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
            </table>
        </div>
    </div>
</div> 