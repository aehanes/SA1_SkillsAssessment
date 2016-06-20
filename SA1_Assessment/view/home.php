<!-- 
  Author: Ashley Hanes
  Revision Date: 05/05/2016
  File Name: home.php
  Description: Home page for the app
--> 
<?php
	include('header.php');
	require('..\model\functions.php');
	$title = "Home";
?>

<div id="main">

<?php 
	getDepartments();
	
?>
