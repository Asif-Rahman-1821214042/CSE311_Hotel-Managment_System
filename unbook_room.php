<!DOCTYPE html>
<html lang="en">
<head>
	<title>Table V04</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="container">
	<h2 class="display-3 lead">Booked Room</h2>
	<hr>
  <p class="lead">Type the room type to search that are availabe or not:</p><br> </di>
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver1 m-b-110">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column1">Room Number</th>
									<th class="cell100 column2">Type</th>
									<th class="cell100 column3">Bedding</th>
									<th class="cell100 column4">Guest ID</th>
									<th class="cell100 column5">Guest Name</th>
									<th class="cell100 column6">Phone</th>
									<th class="cell100 column7">Unbook</th>

								</tr>
							</thead>
						</table>
					</div>
					<?php
                    require "connection.php";
                    $result= "SELECT rn.id,r.type,r.bedding,g.NID,g.first_name,g.phn_number
                              FROM room_num AS rn, room AS r, guest_info AS g
                              WHERE rn.t_id=r.id AND rn.cusid IS NOT null AND g.NID=rn.cusid";
                    $query= mysqli_query($conn,$result);
                    while($row=mysqli_fetch_assoc($query)){
                    echo '<div class="table100-body js-pscroll">
						<table>
							<tbody id="myTable">
								<tr class="row100 body">
									<td class="cell100 column1">'.$row["id"].'</td>
									<td class="cell100 column2">'.$row["type"].'</td>
									<td class="cell100 column3">'.$row["bedding"].'</td>	
									<td class="cell100 column4">'.$row["NID"].'</td>
									<td class="cell100 column5">'.$row["first_name"].'</td>
                                    <td class="cell100 column6">'.$row["phn_number"].'</td>
									<td class="cell100 column7"><a href=unbook_operation.php?id='.$row['id'].'>unbook</a></td>	
										
								</tr>

								
							</tbody>
						</table>
					</div>';
                }

					?>



									</div>
									<div>
										<form action="after_log.php" method="post">
											<p class="lead font-italic">Wanna go back to profile?</p>
      									<button class="btn btn-info">Back</button>
    									</form>
									</div>
				</div>
			</div>
		</div>




<!--===============================================================================================-->	
	<script src="js/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="js/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			var ps = new PerfectScrollbar(this);

			$(window).on('resize', function(){
				ps.update();
			})
		});
			
		
	</script>
	<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>