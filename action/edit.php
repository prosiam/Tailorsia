<!-- File include -->
<?php include_once '../app/function.php'; ?>
<?php include_once '../app/database.php'; ?>





<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Product update form</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/style.css">
	<link rel="stylesheet" href="../assets/css/responsive.css">
	<!-- sweet alert -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
</head>
<body>

	<!--Php section  -->
	<?php

		$edit_id=$_GET['id'];

		// Get data after form submission
		if (isset($_POST['submit'])) {
			// Get data
			$order_id = $_POST['order-id'];
			$chest = $_POST['chest'];
			$cuff = $_POST['cuff'];
			$hand = $_POST['hand'];
			$height = $_POST['height'];
			$hip = $_POST['hip'];
			$belly = $_POST['belly'];
			$leg_height = $_POST['leg-height'];
			$others = $_POST['others'];

			if (empty($order_id)||empty($chest)||empty($cuff)||empty($hand)||empty($height)||empty($hip)||empty($belly)||empty($leg_height)||empty($others)) {
	?>
				<script>
					swal("Oh No!", "All fields are required!", "warning");
				</script>
	<?php
							
			}else{
				// value Update into database
				$sql="UPDATE measurement SET order_id='$order_id' ,chest='$chest',cuff='$cuff',hand='$hand',height='$height' ,hip='$hip',belly='$belly',leg_height='$leg_height',others='$others' WHERE id = $edit_id";
				$connection->query($sql);

						
	?>
			<script>
				swal("Congrats!", "Your Data successfully updated !", "success");
			</script>
	<?php
			}		
			
			
		}

		// Get old data from database table
		
		$sql="SELECT * FROM measurement WHERE id='$edit_id'";
		$product_data=$connection->query($sql);
		$product_fetched_data = $product_data-> fetch_assoc();
	?>





	<div class="wrap">
		<div class="card shadow ">

			<!-- Body ssection -->
			<div class="card-body">
				<div class="col-lg-6" style="margin:auto;" >
					<a class="btn btn-outline-primary btn-block" href="../data-table.php" >Go Back</a>
				</div>			
				<h2 class="text-center">Update the values</h2>
				<form action=" <?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $edit_id;  ?> " method="POST">
					<div class="form-group">
                        <label for="order-id">Order ID</label>
						<input class="form-control" name="order-id" value="<?php echo $product_fetched_data['order_id'];  ?>"  type="text">
					</div>
					<div class="form-group">
                        <label for="chest">chest</label>
						<input class="form-control" name="chest" value="<?php echo $product_fetched_data['chest'];  ?>"  type="text">
					</div>
					<div class="form-group">
                        <label for="cuff">cuff</label>
						<input class="form-control" name="cuff" value="<?php echo $product_fetched_data['cuff'];  ?>"  type="text">
					</div>
					<div class="form-group">
                        <label for="hand">hand</label>
						<input class="form-control" name="hand" value="<?php echo $product_fetched_data['hand'];  ?>"  type="text">
					</div>
					<div class="form-group">
                        <label for="height">height</label>
						<input class="form-control" name="height" value="<?php echo $product_fetched_data['height'];  ?>"  type="text">
					</div>
					<div class="form-group">
                        <label for="hip">hip</label>
						<input class="form-control" name="hip" value="<?php echo $product_fetched_data['hip'];  ?>"  type="text">
					</div>
					<div class="form-group">
                        <label for="belly">belly</label>
						<input class="form-control" name="belly" value="<?php echo $product_fetched_data['belly'];  ?>"  type="text">
					</div>
					<div class="form-group">
                        <label for="leg-height">Leg Height</label>
						<input class="form-control" name="leg-height" value="<?php echo $product_fetched_data['leg_height'];  ?>"  type="text">
					</div>
					<div class="form-group">
                        <label for="others">others</label>
						<input class="form-control" name="others" value="<?php echo $product_fetched_data['others'];  ?>"  type="text">
					</div>
					<div class="form-group">
						<input name="submit" class="btn btn-primary" type="submit" value="Update">
					</div>
				</form>
			</div>
		</div>
	</div>


	







	<!-- JS FILES  -->
	<script src="../assets/js/jquery-3.4.1.min.js"></script>
	<script src="../assets/js/popper.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>	
	<script src="../assets/js/custom.js"></script>
</body>
</html>