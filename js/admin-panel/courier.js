$(document).ready(function(){

	var dataTable = $('#CourierTable').DataTable({
		"processing": true,
		"serverSide": true,
		"ajax": "../inc/datatable/getcourierdata.php",
		"dom": 'Bfrtip',
		"buttons": [{
			extend: 'excel',
			exportOptions: {
				columns: [1, 2, 3, 4, 5]
			}
		},
		{
			extend: 'pdf',
			exportOptions: {
				columns: [1,2, 3, 4, 5]
			}
		},
		{
			extend: 'print',
			title: 'Courier Details',
			customize: function (win)
			{
				$(win.document.body).prepend('<center><img src=" style="position:absolute; top:0; left:0;opacity:0.1;" /></center>');
			},
			exportOptions: {
				columns: [1, 2, 3, 4, 5]
			}
		}

		]
	});

	$('#searchbox').on('keyup', function (){
		dataTable.search(this.value).draw();
	});

	$('#add').click(function() {
		$('#modal_id').hide();
		$('#courier_form')[0].reset();
		$('.modal-title').text("Add Courier");
		$('#action').val("Add");
		$('#operation').val("Add_courier");
		$('.options').prop('disabled', false);
	});

	$(document).on('submit', '#courier_form', function(e) {
        e.preventDefault();
        var fname = $.trim($('#fname').val());
        var lname = $.trim($('#lname').val());
        var number = $.trim($('#number').val());
        var address = $.trim($('#address').val());
        var operation = $.trim($('#operation').val());
        var co_id = $.trim($('#co_id').val());
        var type = 'courier';

        $('input').css('border','1px solid #ddd');

        if(fname.length < 1){
            $('#fname').css('border','2px solid orangered');
        }else if (lname.length < 1) {
        	$('#lname').css('border','2px solid orangered');
        }else if(number.length < 1){
            $('#number').css('border','2px solid orangered');
        }else if(address.length < 1){
            $('#address').css('border','2px solid orangered');
        }else{
    		var formData = new FormData();
    		formData.append("co_id", co_id);
            formData.append("fname", fname);
            formData.append("lname", lname);
    		formData.append("number", number);
            formData.append("address", address);
            formData.append("operation", operation);
            formData.append("type", type);
    		console.log(Array.from(formData));

    		$.ajax({
    			url: "../inc/datatable/action_datatables.php",
    			method: "POST",
    			data: formData,
    			processData:false,
    			cashe:false,
    			contentType:false,
    			success: function(data) {
    				console.log(data);
    					// alert(data);
    				if ($.trim(data) == 'insert') {
    					swal("Record Added !","","success");                  
    					$('#CourierTable').DataTable().ajax.reload();
    					$('#couriermodal').modal('hide');
    				}   else if ($.trim(data) == 'update') {
                        console.log(data);
    					swal("Record Updated !","","success");
                        $('#CourierTable').DataTable().ajax.reload();
                        $('#couriermodal').modal('hide');

    				} else {
    					swal("Record Failed !",""+data+"","error");                          
    				}
    			}
    		});  
        }   	
    });


    $(document).on('click', '.edit', function() {
        var co_id = $(this).attr("id");

       $.ajax({
            url: "./../inc/datatable/fetch_single_data.php",
            method: "POST",
            data: { co_id: co_id },
            dataType: "json",
            success: function(data) {
                console.log(data);
                $('#couriermodal').modal('show');
                $('input').css('border', '1px solid #ddd');
                $('.modal-title').text("Edit " + data.co_id + " Details");
                $('#operation').val("Edit_courier");
                $('#action').val("Edit");
                $('#fname').val(data.fname);
                $('#lname').val(data.lname);
                $('#address').val(data.address);
                $('#number').val(data.number);
                $('#co_id').val(data.co_id);
            }
        });
    });
    $(document).on('click','.view',function(){
        var co_id = $(this).attr("id");
        $.ajax({
            url: "../inc/datatable/fetch_single_data.php",
            method: "POST",
            data: { co_id: co_id },
            dataType: "json",
            success: function(data){
                console.log(data);
                //Fetching the data to View Modal
                $('#viewmodal').modal('show');
                $('.view_co_id').text(data.co_id);
                $('.view_fname').text(data.fname);
                $('.view_lname').text(data.lname);
                $('.view_number').text(data.number);
                $('.view_address').text(data.address);
            }
        });

    });

    $(document).on('click','.remove',function(){
        var co_id = $(this).attr("id");
        var operation = 'remove_courier';
        swal({
            title: "Are you sure?",
            text: "Double-check, You will not be able to reverse this operation ! info : "+ co_id,
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, Remove "+ co_id +" !",
            closeOnConfirm: false
        },
        function (){
            $.ajax({
                url: "../inc/datatable/action_datatables.php",
                method: "POST",
                data: {operation:operation,co_id:co_id},
                success: function(data){
                    console.log(data);
                    swal("Courier Removed !","","success");                  
                    $('#CourierTable').DataTable().ajax.reload();
                }
            });
       
        });


    });


});