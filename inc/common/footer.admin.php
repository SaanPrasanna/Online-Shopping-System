	</div>
</body>
</html>

<!-- Bootstrap js -->
<script src="./../js/popper.min.js"></script>
<script src="./../js/bootstrap.min.js"></script>

<!-- Datatable js -->
<script src="./../js/datatables/jquery.dataTables.min.js"></script>
<script src="./../js/datatables/dataTables.bootstrap4.min.js"></script>
<script src="./../js/datatables/dataTables.buttons.min.js"></script>
<script src="./../js/datatables/buttons.bootstrap4.min.js"></script>
<script src="./../js/datatables/jszip.min.js"></script>
<script src="./../js/datatables/pdfmake.min.js"></script>
<script src="./../js/datatables/vfs_fonts.js"></script>
<script src="./../js/datatables/buttons.html5.min.js"></script>
<script src="./../js/datatables/buttons.print.min.js"></script>
<script src="./../js/datatables/buttons.colVis.min.js"></script>

<!-- Alert Message pluging -->
<script src="./../js/Chart.min.js"></script>

<script src="./../js/noti/sweetalert.min.js"></script>

<script src="./../js/main.js"></script>

<!-- izitoast Notification -->
<script src="./../js/noti/iziToast.js"></script>
<script src="./../js/noti/iziToast.min.js"></script>

<script>
	$(document).ready(function(){
		$('#sidebarCollapse').on('click', function() {
			$('#sidebar').toggleClass('active');
		});

		$(document).on('click','li', function(){
			var id = $(this).attr('id');
			var filter = $(this).attr('class');

			if(filter == 'main'){
				window.location = id+".php";
				// $('.content').html("<span>"+ id +"</span>");
			}
		});
	});
</script>