</div>
<footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="http://gtproj">gtproj</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- jQuery -->
<script src="/gtproj/assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/gtproj/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 4 -->
<script src="/gtproj/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/gtproj/assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/gtproj/assets/plugins/sparklines/sparkline.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.11.5/dist/sweetalert2.all.min.js"></script>
<!-- Select2 -->
<script src="/gtproj/assets/plugins/select2/js/select2.full.min.js"></script>
<!-- AdminLTE App -->
<script src="/gtproj/assets/js/adminlte.js"></script>

<!-- AdminLTE for demo purposes -->
<?php
  foreach ($js as $value) {
    echo '<script src="/gtproj/assets/js/'.$value.'"></script>';
  }
?>

</body>
</html>