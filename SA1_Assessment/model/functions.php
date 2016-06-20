<!-- 
  Author: Ashley Hanes
  Revision Date: 06/17/2016
  File Name: functions.php
  Description: Functions
-->

<?php 

//get the department information
function getDepartments() {
	global $db;
	global $errors;
	
	$query = 'SELECT DISTINCT DeptID, Department from Dept_to_Division_Map';
	$statement = $db->prepare($query);
	$statement->execute();
	$departments = $statement->fetchAll(PDO::FETCH_ASSOC);
	$statement->closeCursor();
	return $departments;
}

function getAllEmpOverForty() {
	global $db;
	global $errors;

	$query = 'SELECT DISTINCT em.a_employee_number, CAST(ab.ac_earned_to_date AS decimal(10,2)), at.info, dtdm.Department, dtdm.Division
			FROM EmployeeMaster AS em 
			LEFT JOIN AccrualBalances AS ab ON em.a_employee_number = ab.a_employee_number
			LEFT JOIN Dept_to_Division_Map AS dtdm ON em.a_division = dtdm.DivID
			LEFT JOIN AccrualTypes AS at ON at.AccrualType = ab.a_accrual_type
			WHERE ab.a_accrual_type IN (4, 5, 6)
				AND ab.a_accrual_type IS NOT NULL
				AND ab.ac_earned_to_date > 40
			ORDER BY dtdm.Department, dtdm.Division';
	$statement = $db->prepare($query);
	$statement->execute();
	$empOver = $statement->fetchAll(PDO::FETCH_ASSOC);
	$statement->closeCursor();
	return $empOver;
}

function getEmpOverForty($department) {
	global $db;
	global $errors;

	$query = 'SELECT DISTINCT em.a_employee_number, CAST(ab.ac_earned_to_date AS decimal(10,2)), at.info, dtdm.Department, dtdm.Division
			FROM EmployeeMaster AS em 
			LEFT JOIN AccrualBalances AS ab ON em.a_employee_number = ab.a_employee_number
			LEFT JOIN Dept_to_Division_Map AS dtdm ON em.a_division = dtdm.DivID
			LEFT JOIN AccrualTypes AS at ON at.AccrualType = ab.a_accrual_type
			WHERE ab.a_accrual_type IN (4, 5, 6)
				AND ab.a_accrual_type IS NOT NULL
				AND ab.ac_earned_to_date > 40
				AND dtdm.DeptID = :department
			ORDER BY dtdm.Department, dtdm.Division';
	$statement = $db->prepare($query);
	$statement->bindParam(':department', $department);
	$statement->execute();
	$empOver = $statement->fetchAll(PDO::FETCH_ASSOC);
	$statement->closeCursor();
	return $empOver;
}

?>