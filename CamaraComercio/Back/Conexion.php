<?php 

	function conn(){
		$conn=mysqli_connect("localhost", "root", "", "CamaraComercio");
		mysqli_set_charset($conn,"utf8");

		return $conn;
	}
 ?>