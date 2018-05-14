
<?php
//connect to database
class DAL {
    private $host ='127.0.0.1';
    private $db ='northwind';
    private $user='root';
    private $pass='';
    private $charset='utf8';
    private $pdo;
    private $dsn;
    private $opt;
    private $conn;
    private $stmt;

 function __construct(){
     $this->dsn="mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
     $this->opt=[
         PDO::ATTR_ERRMODE     =>PDO::ERRMODE_EXCEPTION,
         PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC,
         PDO::ATTR_EMULATE_PREPARES =>false
     ]; 
     
 }
 //create new PDO
 function openConnection(){
     try{
         $this->conn=new PDO($this->dsn, $this->user, $this->pass, $this->opt);
         return $this->conn;
         echo "Connected successfully";
     }
     catch(PDOException $e){
         print "ERROR!".$e->getMessage()."<br/>";
     }
 }
//prepare statements to prevent SQL injection
    public function query($query){
        $conn = $this->openConnection();
          $this->stmt = $conn->prepare($query);
        $this->stmt->execute();
          return true;
    }
 
//returns all data from tables 
public function getAll($query){
 $conn=$this->openConnection();
  $stmt = $conn->prepare($query);
  $stmt->execute();
   return $stmt->fetchAll();
    }

    // searches for a id in a table and returns the count of the result
function CheckId($query) {
    $conn=$this->openConnection();
    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->rowCount();
}
 //inserts data into table 
 function insertData($query, $insertedobjects) {
  $conn=$this->openConnection();
   $stmt = $conn->prepare($query);
   $stmt->execute($insertedobjects);
    if($stmt!==false){
     return true;
    }
 }          
   
   
}
?>