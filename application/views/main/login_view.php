<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>

	<div id="main-content">


		<h1> Name is <?php echo $name; ?></h1>
		<h2> <?php echo $age; ?> years old.</h2>
		<h2> Lives in <?php echo $address; ?> </h2>

		<?php 
			foreach($product as $row) {
				echo $row['product_name']. '</br>';
			}
		?>
	</div>

