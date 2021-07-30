
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/index.js') ?>"></script>
    <script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/dataTables.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>

    <script src="<?= base_url('assets/sweetalert/sweetalert2.all.min.js') ?>"></script>

    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });

        $(document).ready( function () {
            $('#example').DataTable();
        } );


        const flashData = $('.flash-data').data('flashdata');
        if(flashData){
            Swal.fire({
                title : 'Pemberitahuan',
                text : flashData,
                icon : 'success'
            });
        }

        const suksesData = $('.flash-data-success').data('sukses');
        console.log(suksesData);
        if(suksesData){
            Swal.fire({
                title : 'Pemberitahuan',
                text : SUKSES,
                icon : 'success'
            });
        }

        const gagalData = $('.flash-data-failed').data('gagal');
        console.log(gagalData);
        if(gagalData){
            Swal.fire({
                title : 'Pemberitahuan',
                text : GAGAL,
                icon : 'error'
            });
        }


    </script>
    
</body>

</html>