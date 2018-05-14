<?php 
require_once 'dal.php';

class BL{
private $tableName;
private $dal;
private $insertedobjects;
private $values;
private $column;
private $idNum;
private $i;


function __construct(){ 
	$this->dal=new DAL();
} 

//generic query get data by student id 
	public function get_employeeID_DB($tableName,$idNum){
	$idall=$this->dal->getAll("SELECT * FROM`".$tableName."` WHERE employee_id=$idNum");
	return $idall;
	}
	
//generic query to get all  data 
 public function getAllTable($tableName){
$alldata = $this->dal->getAll("SELECT * FROM `".$tableName."`");
return $alldata;
}

//check if id exists to get/add employee
function check_if_id_exists($tableName, $idNum) {
	$check =  $this->dal->CheckId("SELECT employee_id FROM ".$tableName." WHERE employee_id='$idNum'");
	$doesexist = ($check > 0 ?  true : false);
	return $doesexist;
}
//check if id exists to add employee
function check_if_newid_exists($tableName, $idNum) {
	$idarray =  $this->dal->getAll("SELECT employee_id FROM ".$tableName." WHERE employee_id='$idNum'");
	for ($i = 0; $i < count($idarray); $i++){ 
	if ($idarray[$i]["employee_id"] == $idNum ){
	return  true;
	}
	else{
		return false;
	}
}
}

//query to create new rows in db table
public function Insert($tableName, $column,$values,$insertedobjects){
	$query="INSERT INTO ".$tableName."(".$column.") VALUES (".$values.")";
	$newRows=$this->dal->insertData($query, $insertedobjects);
   return $newRows;	
   }

//generic query to update employee data
public function updateData($tableName,$values,$idNum){
	$update=$this->dal->query("UPDATE `".$tableName."` SET ".$values."WHERE employee_id=$idNum ");
	return $update;
}

//generic query to delete employee data
public function deleteData($tableName,$idNum) {
	$remove=$this->dal->query("DELETE FROM`".$tableName."`WHERE employee_id=$idNum ");
	return $remove;
}

 
}
?>
