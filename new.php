<?php



if(isset($_POST['object'])){
	//Convert it to an Associative Array
	$person = json_decode($_POST['object'], true);
	//print_r($person);
	//Converting it back to a JSON String
	echo json_encode($person);
}








if(isset($_POST['array1'])){
  //Convert it to an Associative Array
 $person = json_decode($_POST['array1'], true);
  //Save In MySQL
  $conn = new mysqli("localhost", "root", "root", "db4");
  if($conn->connect_error){
 	die($conn->connect_error);
  }
  //print_r($person);
 for($i=0 ; $i<=3 ;$i++)
{
 $a1 = $person[0];

  $v1 =$a1['target'];
  $v2 =$a1['type'];
  $v3 =$a1['time'];
 $sql = "Insert Into t1 values('$v1', '$v2', '$v3')";
  $conn->query($sql);
  if($conn->affected_rows > 0){
    echo "Inserted Successfully";
  }
  else{
    echo "Sorry: Problem With Insertion";	
  } 
}}





if(isset($_GET['arr'])){
  $sql = "Select * from t1"; 
   $conn = new mysqli("localhost", "root", "root", "db4");
  if($conn->connect_error){
  	die($conn->connect_error);
   }
   if ($result = $conn->query($sql)){
    $rows = array();
    if($result->num_rows > 0){
     while($row = $result->fetch_assoc()){
       array_push($rows, $row);
     }     //Convert to JSON Before Sending to Client
     echo json_encode($rows);
    }
  }
 else{
  echo "No Data to Retrieve";
  }
}
?>