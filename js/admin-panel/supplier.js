$(document).ready(function(){

	var dataTable = $('#SupplierTable').DataTable({
		"processing": true,
		"serverSide": true,
		"ajax": "../inc/datatable/getsupplierdata.php",
		"dom": 'Bfrtip',
		"buttons": [{
			extend: 'excel',
			exportOptions: {
				columns: [1, 2, 3, 4]
			}
		},
		{
			extend: 'pdf',
			exportOptions: {
				columns: [1, 2, 3, 4]
			}
		},
		{
			extend: 'print',
			title: 'Supplier Details',
			customize: function (win)
			{
				$(win.document.body).prepend('<center><img src=" style="position:absolute; top:0; left:0;opacity:0.1;" /></center>');
			},
			exportOptions: {
				columns: [1, 2, 3, 4]
			}
		}

		]
	});

	$('#searchbox').on('keyup', function (){
		dataTable.search(this.value).draw();
	});

	$('#add').click(function() {
		$('#modal_id').hide();
		$('#supplier_form')[0].reset();
		$('.modal-title').text("Add Supplier");
		$('#action').val("Add");
		$('#operation').val("Add_supplier");
		$('.options').prop('disabled', false);
        $("#supplier_id").prop("readonly", false);
	});

	$(document).on('submit', '#supplier_form', function(e) {
        e.preventDefault();
        var company = $.trim($('#company').val());
        var address = $.trim($('#address').val());
        var number = $.trim($('#number').val());
        var operation = $.trim($('#operation').val());
        var supplier_id = $.trim($('#supplier_id').val());
        var type = 'supplier';
        $('input').css('border','1px solid #ddd');

        if(company.length < 1){
            $('#company').css('border','2px solid orangered');
        }else if (number.length < 1) {
        	$('#number').css('border','2px solid orangered');
        }else if(address.length < 1){
            $('#address').css('border','2px solid orangered');
        }else{
    		var formData = new FormData();
    		formData.append("supplier_id", supplier_id);
            formData.append("company", company);
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
    					$('#SupplierTable').DataTable().ajax.reload();
    					$('#suppliermodal').modal('hide');
    				}   else if ($.trim(data) == 'update') {
                        console.log(data);
    					swal("Record Updated !","","success");
                        $('#SupplierTable').DataTable().ajax.reload();
                        $('#suppliermodal').modal('hide');

    				} else {
    					swal("Record Failed !",""+data+"","error");                          
    				}
    			}
    		});  
        }   	
    });

    $(document).on('click', '.edit', function() {
        var supplier_id = $(this).attr("id");

       $.ajax({
            url: "./../inc/datatable/fetch_single_data.php",
            method: "POST",
            data: { supplier_id: supplier_id },
            dataType: "json",
            success: function(data) {
                console.log(data);
                $('#suppliermodal').modal('show');
                $('input').css('border', '1px solid #ddd');
                $('.modal-title').text("Edit " + data.supplier_id + " Details");
                $('#operation').val("Edit_supplier");
                $('#action').val("Edit");
                $('#company').val(data.company);
                $('#address').val(data.address);
                $('#number').val(data.number);
                $('#supplier_id').val(data.supplier_id);
            }
        });
    });

    $(document).on('click','.view',function(){
        var supplier_id = $(this).attr("id");
        $.ajax({
            url: "../inc/datatable/fetch_single_data.php",
            method: "POST",
            data: { supplier_id: supplier_id },
            dataType: "json",
            success: function(data){
                console.log(data);
                //Fetching the data to View Modal
                $('#viewmodal').modal('show');
                $('.view_supplier_id').text(data.supplier_id);
                $('.view_company').text(data.company);
                $('.view_number').text(data.number);
                $('.view_address').text(data.address);
            }
        });

    });

    $(document).on('click','.remove',function(){
        var supplier_id = $(this).attr("id");
        var operation = 'remove_supplier';
        swal({
            title: "Are you sure?",
            text: "Double-check, You will not be able to reverse this operation ! info : "+ supplier_id,
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, Remove it !",
            closeOnConfirm: false
        },
        function (){
            $.ajax({
                url: "../inc/datatable/action_datatables.php",
                method: "POST",
                data: {operation:operation,supplier_id:supplier_id},
                success: function(data){
                    console.log(data);
                    swal("Record Removed !","","success");                  
                    $('#SupplierTable').DataTable().ajax.reload();
                }
            });
       
        });


    });


});