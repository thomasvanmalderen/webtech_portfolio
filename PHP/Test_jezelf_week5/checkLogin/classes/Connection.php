<?php 

		$sHost = "localhost";
		$sUser = "root";
		$sPassword = "root";
		$sDatabase = "checkLogin";
		$link = @mysqli_connect($sHost, $sUser, $sPassword, $sDatabase) or die("Database not found");

?>