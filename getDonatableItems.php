<html>
	<head>
	</head>
	
	<body>
	
		<?php
		
			$p = $_GET['p'];
			
			$con = mysqli_connect('localhost','urban2gw_admin','dev@urbandonate');
			if (!$con) {
				die('Could not connect: ' . mysqli_error($con));
			}
			mysqli_select_db($con,"urban2gw_donate");
			$sql="SELECT items FROM donatable_items WHERE id = '".$p."'";
			$result = mysqli_query($con,$sql);
			
			echo "<table id='ngo-select' class='ngoitem' style='width:100%;'>
			<caption style='text-align:center;'>Select Item</caption>
				<thead>
				<tr><th>Item<th>Quantity(in numbers/Kgs)<th>Description";
			
			while($row = mysqli_fetch_array($result)) {
				echo "<tbody>
					  <tr>
					  <td><input name='selectedItem[]' type='checkbox' value='". $row['items'] . "' autofocus> &nbsp;" . $row['items'] . "
					  <td><select name='quant[]' class='form-control'><option value='' disabled selected>Select Quantity</option>
					  		<option value='10-20'>10-20</option>
					  		<option value='21-30'>21-30</option>
					  		<option value='31-40'>31-40</option>
					  		<option value='41-50'>41-50</option>
					  		<option value='51-60'>51-60</option>
					  		<option value='61-70'>61-70</option>
					  		<option value='71-80'>71-80</option>
					  		<option value='81-90'>81-90</option>
					  		<option value='91-100'>91-100</option>
					  		<option value='< 100'>>100</option>
					  <td><input type='text' name='itemdesc[]' class='form-control' placeholder='Describe the items briefly' maxlength='100'>";
			}
			echo "</table>";
			
			mysqli_close($con);
			?>


<script>
	var headertext = [],
headers = document.querySelectorAll("#ngo-select th"),
tablerows = document.querySelectorAll("#ngo-select th"),
tablebody = document.querySelector("#ngo-select tbody");

for(var i = 0; i < headers.length; i++) {
  var current = headers[i];
  headertext.push(current.textContent.replace(/\r?\n|\r/,""));
} 
for (var i = 0, row; row = tablebody.rows[i]; i++) {
  for (var j = 0, col; col = row.cells[j]; j++) {
    col.setAttribute("data-th", headertext[j]);
  } 
}

</script>
		
	</body>
	
</html>