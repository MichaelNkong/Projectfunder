<?php
function createdb(){
$servername = "localhost";
$username = "root";
$password = "HoMoZea4722%?";
$dbname = "funder_projekt1";
//create connection
$con = mysqli_connect($servername,$username,$password,$dbname);
//check coonection
if(!$con){
die("connection Failed:" . mysqli_connect_error()); 
}


else {
	
	return $con;
	
}
	mysqli_close($con);


}