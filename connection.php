<?php
// Connection 
				$server = "localhost";
				$user = "root";
				$pass = "";
				$db = "e-learining";
				
				$con = mysqli_connect($server,$user,$pass,$db);
				if(!$con){
					die("Something is wrong!".mysqli_error($con));
				} 
				//echo "Connected"; 
			 
?>