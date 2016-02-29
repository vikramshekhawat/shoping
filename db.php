<?php
$con=mysqli_connect("localhost","root","","ecommerce");
if($con){
	echo"WELCOME";
}
else{
	echo "you are not connected".mysqli_connect_errno();
	}