<div class="tab-pane fade" id="data-jabatan" role="tabpanel" aria-labelledby="data-jabatan-tab">

<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message');?>"></div>
    
    <div class="card shadow mt-3 mb-5 border-0">
        <div class="card-body">

            <div class="row">
                <div class="col-lg-3 col-md-3 col-12 text-center">
                    <img src="<?= base_url('assets/images/user/') . $user['gambar'] ?> ?>" <?php echo ($user['gambar'] !== 'user.png') ?  "width='180px' height='280px' style='background-size: cover; object-fit: cover; border-radius: 10px;'"  : "width='200px'" ?> class="mb-5 mt-3" alt="Foto Pegawai">
                </div>
                <div class="col-12 col-md-8 col-lg-8 mt-4">
                    <table width="100%">
                        <tr>
                            <td width="30%" class="tag pb-3">
                               1. Jabatan
                            </td>
                            <td>
                                <input type="text" class="form-control border-success bg-white text-dark mb-3" value="<?php echo (!$jabatan['jabatan']) ?  "-" :  $jabatan['jabatan'] ?>" readonly>
                            </td>
                        </tr>

                        <tr>
                            <td class="tag pb-2">
                               &nbsp&nbsp&nbsp Tahun
                            </td>
                            <td>
                                <input type="text" class="form-control border-success bg-white text-dark mb-2" value="<?php echo (!$jabatan['tahun']) ?  "-" :  $jabatan['tahun'] ?>" readonly>
                            </td>
                        </tr>

                        <tr>
                            <td><hr></td>
                            <td><hr></td>
                        </tr>
                        
                        <tr>
                            <td width="30%" class="tag pb-2 pt-2">
                                2. Jabatan
                            </td>
                            <td>
                                <input type="text" class="form-control border-success bg-white text-dark mb-2 mt-2" value="<?php echo (!$jabatan['jabatan']) ?  "-" :  $jabatan['jabatan'] ?>" readonly>
                            </td>
                        </tr>

                        <tr>
                            <td width="30%" class="tag pb-2">
                                &nbsp&nbsp&nbsp  Tahun
                            </td>
                            <td>
                                <input type="text" class="form-control border-success bg-white text-dark mb-2" value="<?php echo (!$jabatan['tahun']) ?  "-" :  $jabatan['tahun'] ?>" readonly>
                            </td>
                        </tr>

                        <tr>
                            <td><hr></td>
                            <td><hr></td>
                        </tr>
                        
                        <tr>
                            <td width="30%" class="tag pb-2 pt-3">
                                3. Jabatan
                            </td>
                            <td>
                                <input type="text" class="form-control border-success bg-white text-dark mb-2 mt-3" value="<?php echo (!$jabatan['jabatan']) ?  "-" :  $jabatan['jabatan'] ?>" readonly>
                            </td>
                        </tr>

                        <tr>
                            <td width="30%" class="tag pb-2">
                                &nbsp&nbsp&nbsp  Tahun
                            </td>
                            <td>
                                <input type="text" class="form-control border-success bg-white text-dark mb-2" value="<?php echo (!$jabatan['tahun']) ?  "-" :  $jabatan['tahun'] ?>" readonly>
                            </td>
                        </tr>
                        
                    </table>
                    <a href="<?= base_url('home/edit_jabatan/') . $user['id_user'] ?>" class="btn btn-success px-4 mt-4 float-right">Edit Jabatan</a>
                </div>
            </div>
        </div>
    </div>
</div>