<?php

require_once 'controller.php';
require_once '../models/employeeModel.php';
require_once '../common/bl.php';
require_once '../common/validations.php';

class EmployeeController extends Controller{
       private $tableName='employee';
       private $validation;
       
       
// Get all employees to display to client    
function getAllEmployees(){
$bl = new BL();	
$employeeArray=array();	
$allemployees=$bl->getAllTable('employee');
foreach($allemployees as $row){
	$employees= new EmployeeModel ($row);
array_push($employeeArray,$employees->jsonSerialize());
}
 return $employeeArray;
}


//check if id exists and retrieve employee
function getEmployeeById($employee_id){

 if(!empty($employee_id) && ctype_digit($employee_id)){
  $bl=new BL();
  $checkid =  $bl->check_if_id_exists('employee', $employee_id);
  if ($checkid ===true){
 $eID=$bl->get_employeeID_DB('employee',$employee_id);
 return $eID;
 }
 else if($checkid===false){
     return("This employee doesn't exist!");
 } 
}
}

//create new employee
function AddNew($employeeParams){
 $bl=new BL();
 $m=new Employeemodel($employeeParams);
 if($m->getName()!='null' && $m->getDate()!='null'){
$column="employee.employee_id,employee.employee_name,employee.startingDate";
$values= ":employee_id,:employee_name,:startingDate";

$insertedObjects= array(
"employee_id"=>$m->getID(),    
"employee_name"=>$m->getName(),
"startingDate"=>$m->getDate()
);
$checkid =  $bl->check_if_newid_exists('employee',$employeeParams["employee_id"]);

if ($checkid===null)
{
$newEmployee = $bl->Insert('employee', $column,$values,$insertedObjects);
}
else {
    return("This employee already exists!");
} 
}
}


//update employee    
   
function UpdateEmployee($employeeParams){
    $bl=new BL();
    $checkid =  $bl->check_if_id_exists('employee', $employeeParams["employee_id"]);
    if ($checkid ===true){
    $m= new EmployeeModel ($employeeParams);
    if($m->getID()!=false||$m->getID()!=false){
        if($m->getName()!=false){
            $updateEmployee= "employee_name= '".$m->getName()."' ,startingDate= '".$m->getDate()."'";
            $updatedEmployee=$bl->updateData('employee',$updateEmployee,$m->getID());
            if($updateEmployee == true){
             return true;
            }else{
                return "Error!";
            }
        }   
       }
    }
    else if($checkid===false){
        return("This employee doesn't exist!");
    } 

}
   

    //delete employee
function DeleteEmployee($employeeParams){
     $bl=new BL();
     $checkid =  $bl->check_if_id_exists('employee', $employeeParams["employee_id"]);
     if ($checkid ===true){
    $m =new EmployeeModel($employeeParams);
    if($m->getID()!='false'){
    $deletedEmployee=$bl-> deleteData('employee',$m->getID());
    if($deletedEmployee == true){
         return true;
    }else{
        return false;
    }
}       
}
else if($checkid===false){
    return("This employee doesn't exist!");
} 
}

}
?>












    
   
