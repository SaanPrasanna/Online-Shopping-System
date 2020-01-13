$(document).ready(function(){

	var dataTable = $('#ManageTable').DataTable({
		"processing": true,
		"serverSide": true,
		"ajax": "../inc/datatable/getmanageproductsdata.php",
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
			title: 'Manage Products Details',
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

    $(document).on('click', '.manage', function() {
        var p_id = $(this).attr("id");

       $.ajax({
            url: "./../inc/datatable/fetch_single_data.php",
            method: "POST",
            data: { p_id: p_id },
            dataType: "json",
            success: function(data) {
                console.log(data);
                $('.modal-title').text("Manage " + data.p_id );
                $('#name').val(data.name);
                $('#p_id').val(data.p_id);
            }
        });
    });


    $('#supplier_id').typeahead({
        source: function(query, result) {
            $.ajax({
                url: "../inc/datatable/search_supplier_id.php",
                method: "POST",
                data: {query:query},
                dataType: "json",
                success: function(data) {
                    result($.map(data, function(item) {
                        return item;
                    }));
                }
            });
        }
    });


	$(document).on('submit', '#manage_form', function(e) {
        e.preventDefault();
        var p_id = $.trim($('#p_id').val());
        var supplier_id = $.trim($('#supplier_id').val());
        var qty = $.trim($('#qty').val());
        var operation = 'manage';

        $('input').css('border','1px solid #ddd');

        if(supplier_id.length < 1){
            $('#supplier_id').css('border','2px solid orangered');
        }else if (qty < 1) {
        	$('#qty').css('border','2px solid orangered');
        }else{
    		var formData = new FormData();
    		formData.append("supplier_id", supplier_id);
            formData.append("p_id", p_id);
            formData.append("qty", qty);
            formData.append("operation", operation);
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
    				if ($.trim(data) == 'success') {
    					swal(qty + " Product(s) Added !","","success");                  
    					$('#ManageTable').DataTable().ajax.reload();
    					$('#manage').modal('hide');
                        $('#supplier_id').val('');
                        $('#qty').val('');
    				}else {
    					swal("Somethig Was Going Wrong !",""+data+"","error");                          
    				}
    			}
    		}); 
        }   	
    });


});