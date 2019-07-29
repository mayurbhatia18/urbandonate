<html>
	<head>
	</head>
	
	<body>
	
		<?php
		
			$q = $_GET['q'];
			
			
			$con = mysqli_connect('localhost','id2077444_ud_admin','dev@urbandonate');
			if (!$con) {
				die('Could not connect: ' . mysqli_error($con));
			}
			mysqli_select_db($con,"id2077444_urdandonate");
			$sql="SELECT * FROM ngolist WHERE area = '".$q."'";
			$result = mysqli_query($con,$sql);

				
			while($row = mysqli_fetch_array($result)) {
				echo "<table class='ngoitem' style='width:100%;border: 1px solid black;'>
				<tr>
				<th rowspan='3' width='10%;'><input type='radio' name='selectedNgo' value='" . $row['id'] . "' onchange='displayDonationOptions(this.value);'></th>
				<th width='15%'>NGO Name:</th>
				<td width='15%'>" . $row['name'] . "</td>
				<th width='60%'>Discription</th>
				</tr>
				<tr>
				<th>Donatable Items:</th>
				<td>Donatable items content</td>
				<td rowspan='2'><div style='max-height:200px;overflow-y:auto;'>" . $row['discription'] . "</div></td>
				</tr>
				<tr>
				<th>Strength:</th>
				<td>Strength Content</td>
				</tr>
				</table>";

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
			
			$con = mysqli_connect('localhost','id2077444_ud_admin','dev@urbandonate');
			if (!$con) {
				die('Could not connect: ' . mysqli_error($con));
			}
			mysqli_select_db($con,"id2077444_urdandonate");
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