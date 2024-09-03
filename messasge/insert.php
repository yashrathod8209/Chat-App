<?php
header("Content-type:application/json");

$connection = new PDO("mysql:host=localhost;dbname=chat_app", "root", "");


$Message=$_POST['Message'];
$SenderId=$_POST['SenderId'];
$ReciverId=$_POST['ReciverId'];
echo $Message;

$query="INSERT INTO messages (`Message`,`SenderId`,`ReciverId`) VALUES(?,?,?)";
$params=[$Message,$SenderId,$ReciverId];
$statement=$connection->prepare($query);
$row=$statement->execute($params);

// if($row>0){
//     echo json_encode(['success'=>true, 'Message' => $Message]);
//   }else{
//     echo json_encode(['success'=> false]);
//   }




?>