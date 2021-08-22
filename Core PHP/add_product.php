<?php
	ob_start();
	// Including database connection
    include "database.php";

	// After form submission store the data to tables
	if (isset($_POST['add_product'])) {
    	$captcha = $_POST['g-recaptcha-response'];
	    if ($captcha) {
	    	
	    	// Get name field
	        $name = $_POST['name'];

	        // Check for name error
	        if(empty($name))
	        {	
	        	echo "<script>alert('Name field is required.');</script>";
	        }

	        // Get price field
	        $price = $_POST['price'];

	        // Check for price error
	        if(empty($price))
	        {	
	        	echo "<script>alert('Price field is required.');</script>";
	        }
	        else if (!is_numeric($price) && is_float($price) != $price)
	        {
	        	echo "<script>alert('Price field should be a decimal number.');</script>";	
	        }

	        // Get description field
	        $description = $_POST['description'];

	        // Get stock count field
	        $stockCount = $_POST['stock_count'];

	        // Check stock count error
	        if(empty($stockCount))
	        {	
	        	echo "<script>alert('Stock count field is required.');</script>";
	        } 
	        else if (!is_numeric($stockCount))
	        {
	        	echo "<script>alert('Stock count field should be a number.');</script>";	
	        }

	        // Save products
	        $saveProductsQuery = "INSERT INTO products(name, price, description) VALUES ($name, $price, $description)";
	        $saveProducts = $saveProductsQuery or die(mysqli_errno());

	        if (mysqli_query($connection, $saveProducts)) {
	           	if( mysqli_affected_rows() > 0 ) {
				    	
				    // Get id if record inserted
				    $id = mysqli_insert_id();

				    // Save quantities
				    $saveQuantityQuery = "INSERT INTO quantities(product_id, stock_count) VALUES ($id, $stockCount)";
	            	$saveQuantities = $saveQuantityQuery or die(mysqli_errno());

	            	echo "<script>alert('New product added successfully.');</script>";

				} else {
				        
				    // No record inserted
				    echo "<script>alert('Something Went Wrong');</script>";
				}
	        } else {

	           	// No record inserted due to some error
	            echo "<script>alert('Something Went Wrong');</script>";
	        }
	        
	    } else {

	    	// If captcha error exists
	        print_r($errors);
	    }
	}
?>