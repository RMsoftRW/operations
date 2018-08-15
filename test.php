<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table>
		<thead>
			<th>Name</th>
			<th>Status</th>
		</thead>
		<tbody>
<?php 

	$conn = mysqli_connect("localhost","root","","cars");
	if ($conn) {
		// echo "Yes";
	}

	$q = " SELECT * FROM car";
	$r = mysqli_query($conn,$q);
	while ($row = mysqli_fetch_array($r)) {		
		?>
			<tr>
				<td><div class="v"><?php echo $row['car_name'] ?></div></td>
				<td><input type="submit" class = "send" value="Click"></td>
			</tr>
		<?php
	}

 ?>

 </tbody>
			</table>
<script src="assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
 <script type="text/javascript">
 	$(document).ready(function(){
 		$('.send').on("click", function(){
 			var value = $(".v").val();
 			alert(value)
 		});
 	});
 </script>
 </body>
</html>