<?php require_once('../inc/common/header.admin.php'); ?>
	<div class="container-fluid">
		<div class="row  mb-4 ">


		<div class="card mx-3 ">
			<h5 class="card-header">Total Earn By Category</h5>
			<div class="card-body">
				<canvas id="pie-chart" width="250" height="250"></canvas>
			</div>
		</div>

		<div class="card mx-3 ">
			<h5 class="card-header">Quantities on Stock</h5>
			<div class="card-body">
				<canvas id="bar-chart-horizontal" width="430" height="250"></canvas>
			</div>
		</div>


		<div class="card mx-3 ">
			<h5 class="card-header">Discounts %</h5>
			<div class="card-body">
				<form method="post" id="supplier_form" enctype="multipart/form-data">
					<div class="float-left">						
						<div class="form-group" style="width:160px;">
							<div class="input-group" >
								<div class="input-group-prepend">
									<span class="input-group-text" id="">Laptops</span>
								</div>
								<input type="number" class="form-control" id="laptops" maxlength="2">
							</div>
						</div>
						<div class="form-group" style="width:160px;">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="">Desktops</span>
								</div>
								<input type="number" class="form-control" id="desktops">
							</div>
						</div>
						<div class="form-group" style="width:160px;">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="">Printers</span>
								</div>
								<input type="number" class="form-control" id="printers">
							</div>
						</div>
					</div>
					<div class="float-left ml-2">						
						<div class="form-group" style="width:160px;">
							<div class="input-group" >
								<div class="input-group-prepend">
									<span class="input-group-text" id="">Softwares</span>
								</div>
								<input type="number" class="form-control" id="softwares">
							</div>
						</div>
						<div class="form-group" style="width:160px;">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="">Monitors</span>
								</div>
								<input type="number" class="form-control" id="monitors">
							</div>
						</div>
						<div class="form-group" style="width:160px;">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="">Accessories</span>
								</div>
								<input type="number" class="form-control" id="accessories">
							</div>
						</div>
						<div class="form-group float-right">
							<input type="button" name="submit" id="submit" class="btn btn-success" value="Change" style="width: 100px;" />
						</div>
					</div>
				</form>
			</div>
		</div>	

	
		<div class="chart-container mt-2">
			<div class="card" >
				<div class="card-header">
					Avarage 10 Days Income of the LKMart
				</div>
				<div class="card-body">
					<canvas id="myChart" height="350" width="1190"></canvas>
				</div>
			</div>
		</div>


	</div>
</div>
<?php require_once('../inc/common/footer.admin.php'); ?>
<script src="../js/admin-panel/dashboard.js"></script>