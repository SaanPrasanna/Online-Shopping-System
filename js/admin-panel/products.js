$(document).ready(function(){

	var dataTable = $('#ProductsTable').DataTable({
		"processing": true,
		"serverSide": true,
		"ajax": "../inc/datatable/getproductsdata.php",
		"dom": 'Bfrtip',
		"buttons": [{
			extend: 'excel',
			exportOptions: {
				columns: [1, 2, 3, 4, 5, 6, 7, 8]
			}
		},
		{
			extend: 'pdf',
			exportOptions: {
				columns: [ 1, 2, 3, 4, 5, 6, 7, 8]
			}
		},
		{
			extend: 'print',
			title: 'Products Details',
			customize: function (win)
			{
				$(win.document.body).prepend('<center><img src=" style="position:absolute; top:0; left:0;opacity:0.1;" /></center>');
			},
			exportOptions: {
				columns: [1, 2, 3, 4, 5, 6, 7, 8]
			}
		}

		]
	});

	$('#searchbox').on('keyup', function (){
		dataTable.search(this.value).draw();
	});

	$('#add').click(function() {
		$('#modal_id').hide();
		$('#product_form')[0].reset();
		$('.modal-title').text("Add Product");
		$('#action').val("Add");
		$('#operation').val("Add_product");
		$('.options').prop('disabled', false);
        $("#p_id").prop("readonly", false);
		$('#product').find('label').removeClass('active').end().find('[type="radio"]').prop('checked', false);
	});

    $('#manage').click(function() {
        $('#modal_id').hide();
        $('#product_form')[0].reset();
        $('.modal-title').text("Manage Product");
        $('#action').val("Manage");
        $('#operation').val("manage");
        $('.options').prop('disabled', false);
        $('#product').find('label').removeClass('active').end().find('[type="radio"]').prop('checked', false);
    });

	$(document).on('submit', '#product_form', function(e) {
        e.preventDefault();
        var name = $.trim($('#name').val());
        var image = document.getElementById('image').files[0];
        var category = $("input:radio[name ='options']:checked").val();
        var d1 = $.trim($('#d1').val());
        var d2 = $.trim($('#d2').val());
        var d3 = $.trim($('#d3').val());
        var d4 = $.trim($('#d4').val());
        var s_price = $.trim($('#s_price').val());
        var u_price = $.trim($('#u_price').val());
        var warranty = $.trim($('#warranty').val());
        var reorder =  $.trim($('#reorder').val());
        var operation = $('#operation').val();
        var p_id = $('#p_id').val();
        var type = 'product';

        $('input').css('border','1px solid #ddd');

        if(p_id.length < 1){
            $('#p_id').css('border','2px solid orangered');
        }else if (name.length < 1) {
        	$('#name').css('border','2px solid orangered');
        }else if(image){
        	if ($.trim(category).length < 1) {
        		msg = "Select the category";
        	}else if(d1.length < 1){
        		$('#d1').css('border','2px solid orangered');	
        	}else if(d2.length < 1){
        		$('#d2').css('border','2px solid orangered');	
        	}else if(d3.length < 1){
        		$('#d3').css('border','2px solid orangered');
        	}else if(d4.length < 1){
        		$('#d4').css('border','2px solid orangered');
        	}else if(s_price <= 0){
                $('#s_price').css('border','2px solid orangered');
            }else if(u_price <= 0){
                $('#u_price').css('border','2px solid orangered');
            }else if(warranty <= 0) {
        		$('#warranty').css('border','2px solid orangered');
        	} else if (reorder <= 0) {
        		$('#reorder').css('border','2px solid orangered');
        	} else {
                var description = d1 + '<br>' + d2 + '<br>' + d3 + '<br>' + d4;
        		// alert(image);
        		var formData = new FormData();
        		formData.append("p_id", p_id);
                formData.append('type', type);
                formData.append("name", name);
        		formData.append("image", image);
        		formData.append("category", category);
        		formData.append("description", description);
                formData.append("s_price", s_price);
                formData.append("u_price", u_price);
        		formData.append("warranty", warranty);
        		formData.append("reorder", reorder);
        		formData.append("operation", operation);
        		console.log(Array.from(formData));

        		$.ajax({
        			url: "../inc/datatable/action_datatables.php",
        			method: "POST",
        			// data: {p_id:p_id,name:name,category:category,description:description,warranty:warranty,reorder:reorder,operation:operation},
        			data: formData,
        			processData:false,
        			cashe:false,
        			contentType:false,
        			success: function(data) {
        				console.log(data);
        					// alert(data);
      				if ($.trim(data) == 'insert') {
       					swal("Record Added !","","success");                  
        					$('#ProductsTable').DataTable().ajax.reload();
        					$('.btn-group').find('label').removeClass('active').end().find('[type="radio"]').prop('checked', false);
        					$('#product').modal('hide');
                            $('$image').val(''); 

        				}   else if ($.trim(data) == 'update') {
                            console.log(data);
        					swal("Record Updated !","","success");
                            $('#ProductsTable').DataTable().ajax.reload();
                            $('.btn-group').find('label').removeClass('active').end().find('[type="radio"]').prop('checked', false);
                            $('#product').modal('hide');
                            $('#image').val(''); 

        				} else {
        					swal("Record Failed !",""+data+"","error");                          
        				}
        			}
        		});

        	}        	
        }else{
        	alert('Please select image');
        }

    });

    $(document).on('click', '.edit', function() {
        var p_id = $(this).attr("id");

       $.ajax({
            url: "./../inc/datatable/fetch_single_data.php",
            method: "POST",
            data: { p_id: p_id },
            dataType: "json",
            success: function(data) {
                console.log(data);
                $('.btn-group-sm').find('label').removeClass('active').end().find('[type="radio"]').prop('checked', false);
                $('#product').modal('show');
                $('input').css('border', '1px solid #ddd');
                $('.modal-title').text("Edit " + data.p_id + " Details");
                $('#name').val(data.name);
                var category = (data.category).toLowerCase();
                $('.'+category).addClass('active');
                $('#'+ data.category).prop('checked',true);
               $('#action').val("Edit");
                $('#operation').val("Edit_product");
                $('#s_price').val(data.s_price);
                $('#u_price').val(data.u_price);
                $('#warranty').val(data.warranty);
                $('#reorder').val(data.re_order);
                $('#p_id').val(data.p_id);
                $('#d1').val(data.description[0]);
                $('#d2').val(data.description[1]);
                $('#d3').val(data.description[2]);
                $('#d4').val(data.description[3]);
                $("#p_id").prop("readonly", true);
                // $('.options').prop('disabled', true);
            }
        });
    });

    $(document).on('click','.view',function(){
        var p_id = $(this).attr("id");
        $.ajax({
            url: "../inc/datatable/fetch_single_data.php",
            method: "POST",
            data: { p_id: p_id },
            dataType: "json",
            success: function(data){
                //Fetching the data to View Modal
                $('#viewmodal').modal('show');
                $('.view_pid').text(data.p_id);
                $('.view_name').text(data.name);
                $('.view_category').text(data.category);
                $('.view_warranty').text(data.warranty);
                $('.view_s_price').text(data.s_price);
                $('.view_u_price').text(data.u_price);
                $('.view_qty').text(data.qty);
                $('.view_re_order').text(data.re_order);
                $('.view_pid').text(data.p_id);
                $('.view_desc').text(data.description[0] + data.description[1]+ data.description[2]+ data.description[3]);
            }
        });

    });

    $(document).on('click','.remove',function(){
        var p_id = $(this).attr("id");
        var operation = 'remove_product';
        swal({
            title: "Are you sure?",
            text: "Double-check, You will not be able to reverse this operation ! info : "+ p_id,
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
                data: {operation:operation,p_id:p_id },
                success: function(data){
                    console.log(data);
                    swal("Record Removed !","","success");                  
                    $('#ProductsTable').DataTable().ajax.reload();
                }
            });
       
        });

    });

});