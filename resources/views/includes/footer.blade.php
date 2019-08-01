<!-- footer -->
<footer class="sticky-footer bg-white">
	<div class="container my-auto">
	  <div class="copyright text-center my-auto">
	    <span>Copyright &copy; Your Website 2019</span>
	  </div>
	</div>
</footer>
<!-- End of Footer -->


<script src="{{ asset('public/admin/js/jquery.js')}}"></script>

<script type="text/javascript">
	var APP_URL = {!! json_encode(url('/')) !!};
	$.ajaxSetup({
	    headers: {
	     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
</script>

<script src="{{ asset('public/js/popper.min.js')}}"></script>

<script src="{{ asset('public/js/bootstrap.js')}}"></script>

<script src="{{ asset('public/js/bootstrap-datepicker.js')}}"></script>

<script src="{{ asset('public/js/boostrap-form-validation.js')}}"></script>

<script src="{{ asset('public/js/dataTables.min.js')}}"></script>

<script src="{{ asset('public/js/dataTablesb4.js')}}"></script>

<script src="{{ asset('public/js/dropzone.js')}}"></script>

<script src="{{ asset('public/js/tinymce.min.js')}}"></script>

<script src="{{ asset('public/js/full-feature-tinymce.js')}}"></script>

<script src="{{ asset('public/js/custom.js')}}"></script>

<script src="{{ asset('public/js/sweet-alert.min.js')}}"></script>

<script src="{{ asset('public/js/custom-dropzone.js')}}"></script>

<!-- admin js -->
<script src="{{ asset('public/admin/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{ asset('public/admin/js/jquery.easing.min.js')}}"></script>

<script src="{{ asset('public/admin/js/admin.js')}}"></script>

<script src="{{ asset('public/admin/js/Chart.min.js')}}"></script>

<script src="{{ asset('public/admin/js/chart-area-demo.js')}}"></script>

<script src="{{ asset('public/admin/js/chart-pie-demo.js')}}"></script>