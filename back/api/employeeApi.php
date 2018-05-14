<?php

require_once '../controllers/employeeController.php';
require_once '../models/employeeModel.php';
//sends request according to method CRUD

$method = $_SERVER['REQUEST_METHOD']; 
switch($method){

case "GET":
$employeeParams = $_REQUEST['employeeArray'];
$e= new EmployeeController ($employeeParams);
$employees = $e->getAllEmployees();
if($employees==false){
    echo ("No data!");
     $_SESSION['loggedin'] = false;
     
  }else{
     $_SESSION['loggedin'] = true;
 $_SESSION ["emp"] =$employees;
echo json_encode($employees);
 }
break;

case "POST":
$employeeParams = $_REQUEST['employeeArray'];

$e= new EmployeeController ($employeeParams);
$newemployee = $e->AddNew($employeeParams);
if($newemployee ==="This employee already exists!"){
echo json_encode("This employee already exists!");
}
else if($newemployee===null){
 echo json_encode("Successfully inserted!");
}
break;

case "DELETE":
parse_str(file_get_contents("php://input"),$post_vars);
$employeeParams = $post_vars['employeeArray']; 
$e= new EmployeeController ($employeeParams);

 $deleteemployee = $e->DeleteEmployee($employeeParams);
 if ($deleteemployee==true){
     echo json_encode("Successfully deleted! ");
      }
      else{
echo json_encode($deleteemployee);
 }
 break;

case "PUT":
    parse_str(file_get_contents("php://input"),$post_vars);
    $employeeParams = $post_vars['employeeArray']; 
    $e= new EmployeeController ($employeeParams);
     $updateemployee=$e->UpdateEmployee($employeeParams);
     if ($updateemployee==true){
        echo json_encode("Successfully updated! ");
         }
         else{
      echo json_encode($updateemployee);
}
break;
}

?>