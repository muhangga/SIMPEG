<div class="tab-pane fade" id="data-arsip-pegawai" role="tabpanel" aria-labelledby="data-arsip-pegawai-tab">
    <div class="card shadow mt-3 border-0">
        <div class="card-body">

            <form action="#" method="POST">
                <table>
                    <tr>
                        <td width="40%" class="tag pb-2">Jenis File</td>
                        <td>
                            <div class="input-group mb-3">
                                <select class="custom-select border-success" id="inputGroupSelect01">
                                    <option selected>Jenis File</option>
                                    <option value="KTP">KTP</option>
                                    <option value="Kartu Keluarga">Kartu Keluarga</option>
                                    <option value="Dokumen Kontrak">Dokumen Kontrak</option>
                                    <option value="Ijazah">Ijazah</option>
                                </select>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="tag pb-2">Keterangan</td>
                        <td>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control border-success">
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="tag pb-2">Deksripsi<br><span style="font-size: 10px; color: red; font-style: italic;">(Upload File PDF - Max 5MB)</span></td>
                        <td>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file"  id="customFile">
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
                <button class="btn btn-success px-4 mt-4">Upload File</button>
            </form>
        </div>
    </div>


    <h4 class="mt-5 mb-3">Daftar File</h4>

    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                  <table class="table table-striped table-md table-bordered table-striped text-center">
                    <tr>
                        <th>No</th>
                        <th>Tanggal Upload</th>
                        <th>Jenis File</th>
                        <th>Keterangan</th>
                        <th>File</th>
                        </tr>
                    <tr>
                        <td>1</td>
                        <td>21 Juli 2021</td>
                        <td>KTP</td>
                        <td>KTP Muhamad Angga</td>
                        <td>
                            <a href="" class="btn btn-primary btn-xs"><i class="fa fa-search" id="detail" title="edit"></i></a>
                            
                            <a href="" class="btn btn-danger btn-xs"><i class="fa fa-trash" id="hapus" title="hapus"></i></a>
                        </td>
                    </tr>
                  </table>
            </div>
        </div>
    </div>
</div>