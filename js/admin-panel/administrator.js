$(document).ready(function(){

	var dataTable = $('#AdministratorTable').DataTable({
		"processing": true,
		"serverSide": true,
		"ajax": "../inc/datatable/getadministratordata.php",
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
				columns: [1, 3, 4]
			}
		},
		{
			extend: 'print',
			title: 'Administrator Details',
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

    //For cutom search box
	$('#searchbox').on('keyup', function (){
		dataTable.search(this.value).draw();
	});

    //The add button clicked when 
	$('#add').click(function() {
		$('#modal_id').hide();
		$('#administrator_form')[0].reset();
		$('.modal-title').text("Add Administrator");
		$('#action').val("Add");
		$('#operation').val("Add_administrator");
        $("#username").prop("readonly", false);
        $('#password').prop('readonly', false);
	});

    //Subimit the modal
	$(document).on('submit', '#administrator_form', function(e) {
        e.preventDefault();//Preventing the submit triggering
        var username = $.trim($('#username').val());
        var password = $.trim($('#password').val());
        var fname = $.trim($('#fname').val());
        var lname = $.trim($('#lname').val());
        var address = $.trim($('#address').val());
        var number = $.trim($('#number').val());
        var operation = $.trim($('#operation').val());
        var type = 'administrator';
        $('input').css('border','1px solid #ddd');

        if(username.length < 1){
            $('#username').css('border','2px solid orangered');
        }else if(password.length < 1){
            $('#password').css('border','2px solid orangered');
        }else if (fname.length < 1) {
        	$('#fname').css('border','2px solid orangered');
        }else if(lname.length < 1){
            $('#lname').css('border','2px solid orangered');
        }else if(address.length < 1){
             $('#address').css('border','2px solid orangered');
        }else if(number.length < 1){
            $('#number').css('border','2px solid orangered');
        }else{
    		var formData = new FormData(); //Creating the form object 
    		formData.append("username", username);
            formData.append("password", password);
            formData.append("fname", fname);
            formData.append("lname", lname);
    		formData.append("address", address);
            formData.append("number", number);
            formData.append("operation", operation);
            formData.append("type", type);

    		$.ajax({
    			url: "../inc/datatable/action_datatables.php",
    			method: "POST",
    			data: formData,
    			processData:false,
    			cashe:false,
    			contentType:false,
    			success: function(data) {
    				console.log(data); //For the testing
    				if ($.trim(data) == 'insert') {
    					swal("Record Added !","","success");                  
    					$('#AdministratorTable').DataTable().ajax.reload();
    					$('#administratormodal').modal('hide');
    				}   else if ($.trim(data) == 'update') {
    					swal("Record Updated !","","success");
                        $('#AdministratorTable').DataTable().ajax.reload();
                        $('#administratormodal').modal('hide');

    				} else {
    					swal("Record Failed !",""+data+"","error");                          
    				}
    			}
    		});  
        }   	
    });

    $(document).on('click', '.edit', function() {
        var username = $(this).attr("id");

       $.ajax({
            url: "./../inc/datatable/fetch_single_data.php",
            method: "POST",
            data: { username: username },
            dataType: "json",
            success: function(data) {
                console.log(data);
                $('#administratormodal').modal('show');
                $('input').css('border', '1px solid #ddd');
                $('.modal-title').text("Edit " + data.username + " Details");
                $('#operation').val("Edit_administrator");
                $('#action').val("Edit");
                $('#fname').val(data.fname);
                $('#lname').val(data.lname);
                $('#number').val(data.number);
                $('#address').val(data.address);
                $('#username').val(data.username);
                $('#username').prop('readonly', true);
                $('#password').val('Fakepassword');
                $('#password').prop('readonly', true);

            }
        });
    });

    $(document).on('click','.view',function(){
        var username = $(this).attr("id");
        $.ajax({
            url: "../inc/datatable/fetch_single_data.php",
            method: "POST",
            data: { username: username },
            dataType: "json",
            success: function(data){
                console.log(data);
                //Fetching the data to View Modal
                $('#viewmodal').modal('show');
                $('.view_username').text(data.username);
                $('.view_fname').text(data.fname);
                $('.view_lname').text(data.lname);
                $('.view_number').text(data.number);
                $('.view_address').text(data.address);
            }
        });

    });


    $(document).on('click','.remove',function(){
        var username = $(this).attr("id");
        var operation = 'remove_administrator';
        swal({
            title: "Are you sure?",
            text: "Double-check, You will not be able to reverse this operation ! info : "+ username,
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, Delete administrator account !",
            closeOnConfirm: false
        },
        function (){
            $.ajax({
                url: "../inc/datatable/action_datatables.php",
                method: "POST",
                data: {operation:operation,username:username},
                success: function(data){
                    console.log(data);
                    if ($.trim(data) == 'remove') {
                        swal("Record Added !","","success");                  
                        $('#AdministratorTable').DataTable().ajax.reload();

                    } else {
                        swal("Record Failed !",""+data+"","error");                          
                    }
                }
            });
       
        });


    });


});