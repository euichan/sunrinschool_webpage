<?
	$mysqli = @new mysqli("localhost", "root", "root", "board");

	if (mysqli_connect_errno()) {
		die("ERROR : " . mysqli_connect_error());
	}
?>