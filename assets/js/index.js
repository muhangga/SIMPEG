

$('.tombol-hapus').on('click', function(e) {
    
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text:  'Data file akan dihapus',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor : '#3085d6',
        cancelButtonColor : '#d33',
        confirmButtonText: 'Hapus Data!',
    }).then((result) => {
        if (result.value) {
            Swal.fire(
                'Pemberitahuan',
                'Data Berhasil DiHapus !!! Terimakasih ..',
                'success'
                )
            document.location.href = href;
        }
    })

});

$('.logout').on('click', function(e){
    e.preventDefault();
    
    Swal.fire({
        title: 'Apakah anda yakin ingin keluar ?',
        text: 'Keluar Dari Beranda',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Keluar',
        cancelButtonText: 'Tidak'
    }).then((result) => {
        if (result.value) {
            Swal.fire(
                'Keluar',
                'Selamat Tinggal',
                'success'
            )
            document.location.href = 'login';
        }
    });
});