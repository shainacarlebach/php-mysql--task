<?php
require_once 'dal.php';
//checks id, name, date server side
class Validation 
{
    public static function NotNull($value)
    {
        if($value == '')
        {
            return false;
        }
        return true;
    }
 
    public function isNumber($value){
        if(!ctype_digit($value))
        {
            return false;
        }
        return true;
    }

    
    public static function is_name_valid($employee_name){
        //if is alphanumeric charcters
        if (preg_match("/^[a-zA-Z'-]+$/"))
     {
        return true;
        }
        return false;
    }
    public static function is_date_valid($startDate)
    {     
         //if (is_numeric($date)) {
        if (preg_match("^([0]?[1-9]|[1|2][0-9]|[3][0|1])[./-]([0]?[1-9]|[1][0-2])[./-]([0-9]{4}|[0-9]{2})$", $date)) {    
            return true;
        } 
        return false;
    }
        
    }
    ?>