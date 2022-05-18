<?php

	require_once 'include/connection.php';
	require_once 'include/functions.php';

	$del = delItem($_GET['item_number']);

	if ($del > 0) {
		header('Location: adminPage.php');
		die();
	} 