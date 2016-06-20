<?php
	require('model\database_connection');
	include('view\header.php');
	require('model\functions.php');
?>

<?php 
$deptID = filter_input(INPUT_POST, 'id');
?>

<table class="table">
	<tr>
		<th>Employee Number</th>
		<th>Comp Time Accurals(hr)</th>
		<th>Comp Time Type</th>
		<th>Department</th>
		<th>Division</th>
	</tr>
	<?php $empOver = getEmpOverForty($deptID);
		foreach ($empOver as $set) { ?>
			<tr>
				<?php foreach ($set as $data) { ?>
					<td><?php echo $data; ?></td>
				<?php } ?>
			</tr>
		<?php } ?>
		</table>

