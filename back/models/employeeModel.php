<?php
require_once 'models.php';
require_once '../common/dal.php';
require_once '../common/validations.php';
//class model to replicate table in DB    
            
Class EmployeeModel extends Model implements JsonSerializable{

private $employee_id;
private $employee_name;
private $startingDate;
private $validation;

function __construct($employeeParams) 
{
   $this->tableName =`employee`;
   if(array_key_exists("employee_id",$employeeParams)) $this->employee_id = $employeeParams["employee_id"];
   if(array_key_exists("employee_name",$employeeParams)) $this->employee_name = $employeeParams["employee_name"];
   if(array_key_exists("startingDate",$employeeParams)) $this->startingDate = $employeeParams["startingDate"];
   $this->validation= new Validation();
   }

   public function setID(){
    
    if($this->validation->NotNull($employee_id) && $this->validation->isNumber($employee_id)){
    $this->employee_id=$employee_id;
}
}

public function getID()
{
    return $this->employee_id;
}

public function setName($employee_name){
    if ($this->validation->NotNull($employee_name) && $this->validation->is_name_valid($employee_name)){
         $this->employee_name = $employee_name;
}
}
function getName()
{
    return $this->employee_name;
}
public function setDate($startingDate){
    if ($this->validation->NotNull($startingDate) && $this->validation->is_date_valid($startingDate)){
         $this->startingDate = $startingDate;
}
}
function getDate()
{
    return $this->startingDate;
}

function jsonSerialize(){
    return[
      "employee_id"=>$this->getID(),
       "employee_name"=>$this->getName(),
       "startingDate"=>$this->getDate()
    ]; 
     
    }

}

?>