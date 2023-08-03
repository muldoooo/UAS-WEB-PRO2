</div>
<!-- ./wrapper -->
<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Version</b> 1.0
  </div>
  <strong>Copyright &copy; 2023 </strong>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- sweetalert2 -->
<script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>

<script src="<?= base_url() ?>assets/plugins/toastr/toastr.min.js"></script>
<script>
  <?php
  /* simpan */
  if ($this->session->flashdata('flash') == "Tersimpan") {
    echo 'swal.fire("Tersimpan", "Data Berhasil Tersimpan", "success")';
  } elseif ($this->session->flashdata('flashGagal') == "Gagal Tersimpan") {
    echo 'swal.fire("Gagal", "Data Gagal Tersimpan", "error")';
  }
/* Edit */
  if ($this->session->flashdata('flashUpdate') == "Terupdate") {
    echo 'swal.fire("Tersimpan", "Data Berhasil Terupdate", "success")';
  } elseif ($this->session->flashdata('fUpdateGagal') == "Gagal Terupdate") {
    echo 'swal.fire("Gagal", "Data Gagal Tersimpan", "error")';
  }
  /* Hapus */
  if ($this->session->flashdata('flashHapus') == "Terhapus") {
    echo 'swal.fire("Terhapus", "Data Berhasil Terhapus", "success")';
  } elseif ($this->session->flashdata('fGagalTerhapus') == "Gagal Terhapus") {
    echo 'swal.fire("Gagal", "Data Gagal Terhapus", "error")';
  }
  ?>
  
</script>

</body>

</html>