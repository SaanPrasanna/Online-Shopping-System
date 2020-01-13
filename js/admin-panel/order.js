$(document).ready(function(){

	var dataTable = $('#OrderTable').DataTable({
		"processing": true,
		"serverSide": true,
		"ajax": "../inc/datatable/getorderdata.php",
		"dom": 'Bfrtip',
		"buttons": [{
			extend: 'excel',
			exportOptions: {
				columns: [0, 1, 2, 3, 4, 5, 6, 7]
			}
		},
		{
			extend: 'pdf',
			exportOptions: {
				columns: [0, 1, 2, 3, 4, 5, 6, 7]
			}
		},
		{
			extend: 'print',
			title: 'Order Details',
			customize: function (win)
			{
				$(win.document.body).prepend('<center><img src=" style="position:absolute; top:0; left:0;opacity:0.1;" /></center>');
			},
			exportOptions: {
				columns: [0, 1, 2, 3, 4, 5, 6, 7]
			}
		}

		]
	});

	$('#searchbox').on('keyup', function (){
		dataTable.search(this.value).draw();
	});

	$(document).on('click','.jobdone',function(){
		var order_id = $(this).attr("id");
		var operation = 'finish_order';
		swal({
			title:"Are you sure?",
			text:  order_id+" Is this order successfuly delevered",
			type: "info",
			showCancelButton: true,
			closeOnConfirm: false,
			showLoaderOnConfirm: true
		}, function () {
			setTimeout(function () {
				$.ajax({
					url: "../inc/datatable/action_datatables.php",
					method: "POST",
					data: {operation:operation,order_id:order_id},
					success: function(data){
						console.log(data);
						if($.trim(data) == "success"){
							swal("Job Done !","","success");                  
							$('#OrderTable').DataTable().ajax.reload();
						}else{
							swal("Record Failed !",""+data+"","error");    
						}
					}
				}, 2000);
			});
		});
	});
	


    $(document).on('click','.view',function(){
        var order_id = $(this).attr("id");
        var order_details = 'order_details';
        $.ajax({
            url: "../inc/datatable/fetch_single_data.php",
            method: "POST",
            data: { order_id: order_id,order_details:order_details},
            dataType: "json",
            success: function(data){
                console.log(data);
                //Fetching the data to View Modal
                $('#viewmodal').modal('show');
                $('#modal-label').text(data.order_id + " Order Details");
                $('#order_details').html('');
                for (var i = 0; i < data.p_id.length; i++) {
					$('#order_details').append('<span>Product ID: '+data.p_id[i]+' <i class="fas fa-arrow-right"></i> '+data.qty[i]+' Quantity(s)</span><br>');
                }
            }
        });

    });

});