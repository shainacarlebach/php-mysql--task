<?php

require_once '../controllers/employeeController.php';
//sends request to get one employee

$employeeParams = $_REQUEST['employeeArray'];

if (!isset($employeeParams['employee_id'])) {
    echo ("Please choose an ID!");
}
else{
      $employee_id = $employeeParams['employee_id'];
       $e= new EmployeeController ($employeeParams);
       $employee = $e->getEmployeeById($employee_id);
       if($employee==false){
           echo ("You did not choose an ID!");
            $_SESSION['loggedin'] = false;
            
         }else{
            $_SESSION['loggedin'] = true;
        $_SESSION ["emp"] =$employee;
     echo json_encode($employee);
        }
    }
?> 
