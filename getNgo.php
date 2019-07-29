<html>
	<head>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<style>
table#ngo-select { 
  margin: 0 auto;
  border-collapse: collapse;
  font-family: "Montserrat", arial, sans-serif;
  font-weight: 100; 
  background: #333; color: #fff;
  text-rendering: optimizeLegibility;
  border-radius: 5px; 
  line-height: 20px;
  width: 100%;
  overflow: hidden;
}



#desc{
	width:50%;
	}

table#ngo-select thead th { font-weight: 600; }
table#ngo-select thead th, table#ngo-select tbody td { 
  padding: .8rem; font-size: 1.4rem;
}
table#ngo-select tbody td { 
  padding: .8rem; font-size: 1.4rem;
  color: #444; background: #eee;
  font-family: 'Open Sans', Arial, sans-serif;

}
table#ngo-select tbody tr:not(:last-child) { 
  border-top: 1px solid #ddd;
  border-bottom: 1px solid #ddd;  
}

table#ngo-select tbody tr{
	border-bottom: 1px solid #ddd;
}

@media screen and (max-width: 600px) {
  table#ngo-select caption { background-image: none; }
  table#ngo-select thead { display: none; }
  table#ngo-select tbody td { 
    display: block; padding: .6rem; 
    text-align: justify;
  }
  table#ngo-select tbody tr td:first-child { 
    background: #666; color: #fff; 
  }

  table#ngo-select tbody tr td{ 
    border-bottom: 1px solid #ddd;
  }
	table#ngo-select tbody td:before { 
    content: attr(data-th); 
    font-weight: bold;
    display: inline-block;
    width: 0;  
  }
  #desc{
	width:100%;
	
}
}
	</style>
	<script src="js/jquery.min.js"></script>
	</head>
	
	<body>
	
		<?php
		
			$q = $_GET['q'];
			
			
			$con = mysqli_connect('localhost','urban2gw_admin','dev@urbandonate');
			if (!$con) {
				die('Could not connect: ' . mysqli_error($con));
			}
			mysqli_select_db($con,"urban2gw_donate");
			$sql="SELECT * FROM ngolist WHERE area = '".$q."'";
			$result = mysqli_query($con,$sql);

				
			
echo "<table id='ngo-select' class='ngoitem'>
<caption style='text-align:center;'>Select Organization</caption>
<thead>
<tr><th>NGO name<th>Donatable items<th>Strength<th>Description";

while($row = mysqli_fetch_array($result)) {

echo"<tbody>
<tr>
<td><input type='radio' name='selectedNgo' value='" . $row['name'] . "' requried onchange='displayDonationOptions(this.value);'> &nbsp;" . $row['name'] . "
<td>";

$ngoid = $row['id'];
$sql2 = "SELECT items FROM donatable_items WHERE id = '".$ngoid."'";
$result2 = mysqli_query($con,$sql2);
$row2 = mysqli_fetch_array($result2);
echo $row2['items'];
while($row2 = mysqli_fetch_array($result2)){
     echo ",".$row2['items']."";
}

echo "<td>" . $row['strength'] ."
<td id='desc'>" . $row['description'];

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