$(document).ready(function(){

	var dataTable = $('#CustomerTable').DataTable({
		"processing": true,
		"serverSide": true,
		"ajax": "../inc/datatable/getcustomerdata.php",
		"dom": 'Bfrtip',
		"columnDefs": [{
                targets: [ 0 ],
                visible : false,
                searchable : false
         }],
		"buttons": [{
			extend: 'excel',
			exportOptions: {
				columns: [0,1, 2, 3, 4]
			}
		},
		{
			extend: 'pdf',
			exportOptions: {
				columns: [0,1,2,  3, 4]
			}
		},
		{
			extend: 'print',
			title: 'Customer Details',
			customize: function (win)
			{
				$(win.document.body).prepend('<center><img src=" style="position:absolute; top:0; left:0;opacity:0.1;" /></center>');
			},
			exportOptions: {
				columns: [0, 1, 2, 3, 4]
			}
		}

		]
	});

	$('#searchbox').on('keyup', function (){
		dataTable.search(this.value).draw();
	});

});