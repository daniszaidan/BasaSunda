<?php
	require "config.php";
	
	//Parameter check
	if (!isset($_GET['catid'])) {
		echo 'Error: Category ID (catid) required.';
		exit();
	}
	
	//Fetch categories from database
	$result = mysqli_query($conn, "SELECT id, label, sunda, image FROM word WHERE cat_id=" . $_GET['catid']);
	
	//Initialize array variable
	$dbdata = array();

	//Fetch into associative array
	while ($row = mysqli_fetch_assoc($result))  {
		$dbdata[]=$row;
	}

	//Print array in JSON format
	echo json_encode($dbdata);
?>