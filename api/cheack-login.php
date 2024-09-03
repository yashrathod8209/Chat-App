<?php

session_start();
include "../includes/init.php";
include pathOf("./connection.php");

$UserName = $_POST['UserName'];
$Password = $_POST['Password'];
$Email= $_POST['Email'];


$query = "SELECT `Id` FROM `users` WHERE `UserName`=(?) AND `Password`=(?) AND `Email`=(?) ";
$params=[$UserName,$Password,$Email];
$statement=$connection->prepare($query);
$row=$statement->execute($params);
$User=$statement->fetch(PDO::FETCH_ASSOC);

$_SESSION['SenderId']=$User;


if($row>0){
    echo json_encode(['success'=>true, 'UserName' => $UserName]);
  }else{
    echo json_encode(['success'=> false]);
  }


// print_r($User);

// STORE IN SESSION
// print_r($_SESSION['UserId']);


