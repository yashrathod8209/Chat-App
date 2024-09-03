<?php

header("Content-type:application/json");

$UserName=$_POST['UserName'];
$Password=$_POST['Password'];
$Email=$_POST['Email'];

$connection = new PDO("mysql:host=localhost;dbname=chat_app", "root", "");

$query="INSERT INTO users (`UserName`,`Password`,`Email`) VALUES(?,?,?)";
$params=[$UserName,$Password,$Email];
$statement=$connection->prepare($query);
$row=$statement->execute($params);

if($row>0){
    echo json_encode(['success'=>true, 'UserName' => $UserName]);
  }else{
    echo json_encode(['success'=> false]);
  }

?>