	<!-- 
  Author: Ashley Hanes
  Revision Date: 05/05/2016
  File Name: index.php
  Description: UI
--> 

<?php
	require('model\database_connection');
	include('view\header.php');
	require('model\functions.php');
?>

<h1>Filter by Department</h1>

<div class="departments">
	<div class="dropdown">
	  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Departments<span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
	  	<?php 
	  		$departments = getDepartments();
	    	foreach ($departments as $department) { ?>
	        	<li><a href="#" name="<?php echo $department['DeptID']; ?>"><?php echo $department['Department']; ?></a></li>
	     <?php } ?>
	  </ul>
	</div>
</div>

<div id="data"></div>


<script> 
	$(document).ready(function() {
		$(".departments ul li a").click(function(e) {
			$("#data").load("departments.php", { 
				id: $(this).attr("name"),  
			});
		});
		
	});
</script>




