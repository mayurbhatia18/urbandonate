<html>
	<head>
	</head>
	
	<body>
	
		<?php
		
			$q = $_GET['q'];
			
			echo $q;
			
			$con = mysqli_connect('localhost','root','');
			if (!$con) {
				die('Could not connect: ' . mysqli_error($con));
			}
			mysqli_select_db($con,"urbandonate");
			$sql="SELECT * FROM ngolist WHERE area = '".$q."'";
			$result = mysqli_query($con,$sql);
			echo "<table>
				<tr>
				<th>Select</th>
				<th>ID</th>
				<th>NGOName</th>
				<th>Area</th>
				<th>Discription</th>
				</tr>";
				
			while($row = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td><input type='radio' name='selectedNgo' value='" . $row['id'] . "' onchange='displayDonationOptions(this.value);'></td>";
				echo "<td>" . $row['id'] . "</td>";
				echo "<td>" . $row['name'] . "</td>";
				echo "<td>" . $row['area'] . "</td>";
				echo "<td>" . $row['discription'] . "</td>";
				echo "</tr>";
			}
			echo "</table>";
			mysqli_close($con);
		?>
		
	</body>
	
</html>




<html>
	<head>
	</head>
	
	<body>
	
		<?php
		
			$p = $_GET['p'];
			
			$con = mysqli_connect('localhost','root','');
			if (!$con) {
				die('Could not connect: ' . mysqli_error($con));
			}
			mysqli_select_db($con,"urbandonate");
			$sql="SELECT items FROM donatable_items WHERE ngoid = '".$p."'";
			$result = mysqli_query($con,$sql);
			
			echo "<select name='items'>
				<option value='' disabled selected>Select donation item</option>";
			
			while($row = mysqli_fetch_array($result)) {
				echo "<option value='". $row['items'] . "'>" . $row['items'] . "</option>";
			}
			
			mysqli_close($con);
			?>
		
	</body>
	
</html>