
$(document).ready(function(){
	$('#top-title').text("Dashboard");
	$('title').text("LKMart || Admin Panel Dashboard");

	//Loading the Chart using Chart Js Library
	var chart = 'line_chart';
	$.ajax({
		url:"../inc/chartjs/dashboard.php",
		data: {chart:chart},
		method: "POST",
		success: function(cdata){
			var test = JSON.parse(cdata);
			var ctx = document.getElementById('myChart').getContext('2d');
			var myChart = new Chart(ctx, {
				type: 'line',
				data: {
					labels: test.dates,
					datasets: [{
						label: 'Total Earn Rs.',
						data: test.prices,
						backgroundColor: ['rgb(0,99,132, 0.3)'],
						borderColor: ['rgb(0,99,132)'],
						fill: true

					}]
				},
				options: {
					title: {
						display: true,
						text: 'Average Earn of the 10 Days (Currencty LKR)'
					}
				}

			});				

		}
	});

	//Loading the Chart using Chart Js Library
	var chart = 'pie_chart';
	$.ajax({
		url:"../inc/chartjs/dashboard.php",
		data: {chart:chart},
		method: "POST",
		success: function(cdata){
			var piec = JSON.parse(cdata);
			console.log(piec);
			new Chart(document.getElementById("pie-chart"), {
				type: 'pie',
				data: {
					labels: piec.category,
					datasets: [{
						label: "Currency Rs. ",
						backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#a28f5e"],
						data: piec.amount
					}]
				},
				options: {
					title: {
						display: true,
						text: 'From Start Day to Today (Currency LKR)'
					}
				}
			});		

		}
	});	

	//Loading the Chart using Chart Js Library
	var chart = 'horizontal_chart';
	$.ajax({
		url:"../inc/chartjs/dashboard.php",
		data: {chart:chart},
		method: "POST",
		success: function(cdata){
			var horizontalc = JSON.parse(cdata);
			console.log(horizontalc);
			new Chart(document.getElementById("bar-chart-horizontal"), {
				type: 'horizontalBar',
				data: {
					labels: horizontalc.category,
					datasets: [
					{
						label: "Quantity have ",
						backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#a28f5e"],
						data: horizontalc.qty
					}
					]
				},
				options: {
					legend: { display: false },
					title: {
						display: true,
						text: 'Quantities on Stock'
					}
				}
			});

		}
	});	


	$(document).ready(function(){
		var discount = 'discount';
		$.ajax({
			method: "POST",
			url: "../inc/datatable/fetch_single_data.php",
			data: {discount:discount},
			success: function(data){
				var test = JSON.parse(data);
				console.log(test);
				for (var i = 0; i < 6; i++) {
					$('#'+test.category[i]+'s').val(test.rating[i]);
				}
			}

		});
	});

	$('#submit').on('click',function(){
		var accessories = $.trim($('#accessories').val());
		var desktops = $.trim($('#desktops').val());
		var laptops = $.trim($('#laptops').val());
		var monitors = $.trim($('#monitors').val());
		var printers = $.trim($('#printers').val());
		var softwares = $.trim($('#softwares').val());

		 $('input').css('border','1px solid #ddd');
		if(laptops < 0){
            $('#laptops').css('border','2px solid orangered');
        }else if (desktops < 0) {
        	$('#desktops').css('border','2px solid orangered');
        }else if(printers < 0){
            $('#printers').css('border','2px solid orangered');
        }else if(softwares < 0){
            $('#softwares').css('border','2px solid orangered');
        }else if(monitors < 0){
            $('#monitors').css('border','2px solid orangered');
        }else if(accessories < 0){
            $('#accessories').css('border','2px solid orangered');
        }else{
    		var formData = new FormData();
    		formData.append("accessorie", accessories);
    		formData.append("laptop", laptops);
            formData.append("desktop", desktops);
            formData.append("monitor", monitors);
            formData.append("printer", printers);
            formData.append("software", softwares);
            formData.append("operation", 'discount');
    		console.log(Array.from(formData));
    		$.ajax({
    			method:"POST",
    			url: "../inc/datatable/action_datatables.php",
    			data:formData,
    			processData:false,
    			cashe:false,
    			contentType:false,
    			success:function(data){
    				console.log(data);
    				iziToast.success({
    					title: 'Success',
    					message: 'Update the Discount Prices',
    					position: 'topRight',
    				});
    			}
    		});
    	}

	});



});