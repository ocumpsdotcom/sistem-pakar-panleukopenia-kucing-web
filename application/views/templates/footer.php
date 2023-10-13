<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; SP-Panleukopenia Kucing <?= date('Y') ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?> ">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- datatabless jquery-->
<script src="<?= base_url('assets/') ?>datatables/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>datatables/js/dataTables.bootstrap4.min.js"></script>

</body>

</html>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
    $(document).ready(function() {
        $('#tableMakanan').DataTable();
    });
    $(document).ready(function() {
        $('#tableSubMenu').DataTable();
    });
    $(document).ready(function() {
        $('#tableMenu').DataTable();
    });

    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
            }
        });
    });

    $('.form-send-order').on('click', function() {
        const id = $(this).data('id');

        $.ajax({
            url: "<?= base_url('koki/sendorder'); ?>",
            type: 'post',
            data: {
                id: id,
            },
            success: function() {
                document.location.href = "<?= base_url('koki'); ?>";
            }
        });
    });

    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/updatesubmenu'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
            }
        });
    });

    //modal Tambah Transaksi
    $("#FormTambah").keyup(function Hitung() {
        var harga = document.getElementById('harga_satuan').value;
        var jumlah = document.getElementById('jumlah').value;
        var TotalHarga = ((parseInt(harga) * parseInt(jumlah)));
        document.getElementById("total_bayar").value = TotalHarga;
    });

    //modal edit Transaksi
    function HitungAkhir() {
        var total = document.getElementById('total').value;
        var uangBayar = document.getElementById('uang_bayar').value;
        var id = document.getElementById('id').value;
        var kembalian = 0;
        if (uangBayar < total) {
            alert("uang anda kurang");
        } else {
            kembalian = parseInt(uangBayar) - parseInt(total);
            document.getElementById("kembalian").value = kembalian;
        }
    };

    // Modal makanan
    $(document).on('click', '.PilihMakanan', function(e) {
        document.getElementById("nama_makanan").value = $(this).attr('data-makanan');
        document.getElementById("harga_satuan").value = $(this).attr('data-harga')
        $('#ModalMakanan').modal('hide');
    });
</script>