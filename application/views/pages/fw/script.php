<!-- jQuery -->
<script src="resource/jsframework/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="resource/jsframework/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="resource/jsframework/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="resource/jsframework/vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="resource/jsframework/vendors/Chart.js/dist/Chart.min.js"></script>
<!-- jQuery Sparklines -->
<script src="resource/jsframework/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- Flot -->
<script src="resource/jsframework/vendors/Flot/jquery.flot.js"></script>
<script src="resource/jsframework/vendors/Flot/jquery.flot.pie.js"></script>
<script src="resource/jsframework/vendors/Flot/jquery.flot.time.js"></script>
<script src="resource/jsframework/vendors/Flot/jquery.flot.stack.js"></script>
<script src="resource/jsframework/vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="resource/jsframework/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="resource/jsframework/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="resource/jsframework/vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="resource/jsframework/vendors/DateJS/build/date.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="resource/jsframework/vendors/moment/min/moment.min.js"></script>
<script src="resource/jsframework/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Custom Domain Scripts -->
<?php //未知原因，此处domainscript需要在customscript之前，估计是custom脚本里有一些会影响全局js的操作。
foreach ($domainscripts as $item):?><script src="<?php echo $item; ?>"></script>
<?php endforeach; ?>
<!-- Custom Theme Scripts -->
<script src="resource/jsframework/build/js/custom.js"></script>

</body>
</html>