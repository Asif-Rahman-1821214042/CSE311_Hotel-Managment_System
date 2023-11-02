<?php

require "connection.php";

$id=$_GET['id'];
$result= "DELETE FROM guest_info WHERE NID='$id'";

$query=mysqli_query($conn,$result);
if($query){
	header("Location: after_log.php?Sucessfully_deleted");
}
else{
	header("Location: after_log.php?delect_operation_failed");
}
?>