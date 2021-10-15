<!-- File include -->
<?php include_once 'app/function.php'; ?>
<?php include_once 'app/database.php'; ?>





<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Product adding form</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
	<!-- sweet alert -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
</head>
<body>

	<!--Php section  -->
	<?php

		// Get data after form submission
		if (isset($_GET['submit'])) {
			// Get data
			$order_id = $_GET['order-id'];
			$chest = $_GET['chest'];
			$cuff = $_GET['cuff'];
			$hand = $_GET['hand'];
			$height = $_GET['height'];
			$hip = $_GET['hip'];
			$belly = $_GET['belly'];
			$leg_height = $_GET['leg-height'];
			$others = $_GET['others'];

			// Validation with sweet alert messages
			if (empty($order_id)||empty($chest)||empty($cuff)||empty($hand)||empty($height)||empty($hip)||empty($belly)||empty($leg_height)||empty($others)) {
	?>
			<script>
				swal("Oh No!", "All fields are required!", "warning");
			</script>
	<?php
				
			}else{
				// value insert into database
				$sql="INSERT INTO measurement(order_id,chest,cuff,hand,height,hip,belly,leg_height,others)VALUES('$order_id','$chest','$cuff','$hand','$height','$hip','$belly','$leg_height','$others')" ;
				$connection->query($sql);
			
	?>
			<script>
				swal("Congrats!", "Your Data submission successfull!", "success");
			</script>
	<?php
					
			}
			
		}
	?>





	<div class="wrap">
		<div class="card shadow ">

			<!-- Body ssection -->
			<div class="card-body">
				<div class="col-lg-6" style="margin:auto;" >
					<a class="btn btn-outline-primary btn-block" href="data-table.php" >Show all product details</a>
				</div>			
				<h2 class="text-center" >Put the values</h2>
				<form action=" <?php echo $_SERVER['PHP_SELF'] ?> " method="GET">
					<div class="form-group">
						<input class="form-control" name="order-id" value="<?php old('order-id'); ?>" placeholder="Order ID" type="text">
					</div>
					<div class="form-group">
						<input class="form-control" name="chest" placeholder="Chest" type="text">
					</div>
					<div class="form-group">
						<input class="form-control" name="cuff" placeholder="Cuff" type="text">
					</div>
					<div class="form-group">
						<input class="form-control" name="hand" placeholder="Hand" type="text">
					</div>
					<div class="form-group">
						<input class="form-control" name="height" placeholder="Height" type="text">
					</div>
					<div class="form-group">
						<input class="form-control" name="hip" placeholder="Hip" type="text">
					</div>
					<div class="form-group">
						<input class="form-control" name="belly" placeholder="Belly" type="text">
					</div>
					<div class="form-group">
						<input class="form-control" name="leg-height" placeholder="Leg Height" type="text">
					</div>
					<div class="form-group">
						<input class="form-control" name="others" placeholder="Others" type="text">
					</div>
					<div class="form-group">
						<input name="submit" class="btn btn-primary" type="submit" value="Submit">
					</div>
				</form>
			</div>
			<!-- footer section -->
		</div>
	</div>


	







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>	
	<script src="assets/js/custom.js"></script>
</body>
</html>