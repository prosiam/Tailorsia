<!-- File include -->
<?php include_once 'app/function.php'; ?>
<?php include_once 'app/database.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Data Table</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/data-table/assets/img/favicon.png">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/data-table/assets/css/bootstrap.min.css">
    
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/data-table/assets/css/font-awesome.min.css">
    
    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="assets/data-table/assets/css/feathericon.min.css">
    
    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/data-table/assets/css/style.css">

    <!-- data table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap4.min.css">

    <!-- sweet alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <!-- php section -->

    <?php
        // Get data from database table
        $sql="SELECT * FROM measurement ORDER BY id DESC";
		$product_data=$connection->query($sql);
        $i=0;
    
    ?>

    <section class="main-section">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="col-lg-4 " style="margin:auto;" >
                    <a class="btn btn-outline-success btn-block" href="index.php" >Add new product</a>
                </div>
                <div class="card-header">
                    <h4 class="card-title text-center">Product list</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="product_table" class="table table-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th>Count</th>
                                    <th>Order ID</th>
                                    <th>Chest</th>
                                    <th>Cuff</th>
                                    <th>Hand</th>
                                    <th>Height</th>
                                    <th>Hip</th>
                                    <th>Belly</th>
                                    <th>Leg height</th>
                                    <th>Others</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                    while ($fetched_product_data = $product_data -> fetch_assoc()):
                                
                                ?>

                                <tr>
                                    <td><?php echo $i=$i+1; ?></td>
                                    <td><?php echo $fetched_product_data['order_id']; ?></td>
                                    <td><?php echo $fetched_product_data['chest']; ?></td>
                                    <td><?php echo $fetched_product_data['cuff']; ?></td>
                                    <td><?php echo $fetched_product_data['hand']; ?></td>
                                    <td><?php echo $fetched_product_data['height']; ?></td>
                                    <td><?php echo $fetched_product_data['hip']; ?></td>
                                    <td><?php echo $fetched_product_data['belly']; ?></td>
                                    <td><?php echo $fetched_product_data['leg_height']; ?></td>
                                    <td><?php echo $fetched_product_data['others']; ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-warning" href="action/edit.php?id=<?php echo $fetched_product_data['id'];?>">Edit</a>
                                        <a id="delete_id" class="btn btn-sm btn-outline-danger" href="action/delete.php?id=<?php echo $fetched_product_data['id'];?>">Delete</a>
                                    </td>
                                </tr>
                                <?php
                                    endwhile;
                                
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- jQuery -->
    <script src="assets/data-table/assets/js/jquery-3.2.1.min.js"></script>
		
    <!-- Bootstrap Core JS -->
    <script src="assets/data-table/assets/js/popper.min.js"></script>
    <script src="assets/data-table/assets/js/bootstrap.min.js"></script>
    
    <!-- Slimscroll JS -->
    <script src="assets/data-table/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    
    <!-- Custom JS -->
    <script  src="assets/data-table/assets/js/script.js"></script>

    <!-- data table js -->
    <script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap4.min.js"></script>

    <!-- data table script -->
    <script>
        $(document).ready(function() {
        $('#product_table').DataTable();
        } );
    </script>


    <!-- Custom JS code -->
    <script>
        // Confirmation alert for deleting data
        $("a#delete_id").click(function(){
            let status= confirm('Are you sure?');
            if (status) {
                return true;
            } else {
                return false;
            }
        });
    </script>
</body>
</html>