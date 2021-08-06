<div class="container">

<div class="alert alert-info" style="font-size: 18px;">Data Arsip Pegawai</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="example" width="100%" cellspacing="0">
                <thead class="bg-success text-white" style="font-size: 15px;">
                    <tr>
                        <th>No</th>
                        <th>Email</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis File</th>
                        <th>Keterangan</th>
                        <th>Tanggal Upload</th>
                        <th>File</th>
                    </tr>
                </thead>
                <tbody class="text-center" style="font-size: 14px;">
                        <?php 
                            $no = 1;
                            foreach ($get_arsip_pegawai as $all_user) : ?>  
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $all_user['email'] ?></td>
                            <td><?= $all_user['nama_lengkap'] ?></td>
                            <td><?= $all_user['jenis_file'] ?></td>
                            <td><?= $all_user['keterangan'] ?></td>
                            <td><?= $all_user['tgl_upload'] ?></td>
                    
                            <td>
                                <a href="<?= base_url('assets/file/') . $all_user['deksripsi'] ?>" target="_blank" class="btn btn-primary btn-xs btn-sm"><i class="fa fa-search p-1" id="detail" title="Detail File"></i></a>
                                
                                <a href="<?= base_url('Home/hapus_file/') . $all_user['id_arsip'] ?>" class="btn btn-danger btn-xs btn-sm tombol-hapus"><i class="fa fa-trash p-1" id="hapus" title="Hapus File"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
            </table>
        </div>
    </div>
</div> 