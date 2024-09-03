<?php

session_start();
// print_r($_SESSION['SenderId']);

$ReciverId=$_GET['Id'];
$SenderId=$_SESSION['SenderId'];

// echo $ReciverId;

include "../includes/init.php";
include pathOf('./connection.php');

$query="SELECT * FROM `messages` WHERE (`SenderId`=(?) AND `ReciverId`=(?)) OR (`SenderId`=(?) AND `ReciverId`=(?)) ";
$params=[$SenderId['Id'],$ReciverId,$ReciverId,$SenderId['Id']];
$statement=$connection->prepare($query);
$row=$statement->execute($params);
$messages=$statement->fetchAll(PDO::FETCH_ASSOC);
// print_r($messages);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: navy;
        }
        .table{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        table{
            text-align: center;
            color: white;
        }
        .table th{
            color: black;
            border: 2px solid black;
            background-color: lightblue;
        }
        a{
            color: green;
            
        }
        .form{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        input{
            border-radius: 20%;
        }
    
        </style>
</head>
<body>
    <div class="table">
    <table>
        <thead>
            <th>SenderId</th>
            <th>Message</th>
            <th>time</th>
        </thead>
        <tbody>
            <?php foreach($messages as $message){?>
                <tr>
                    <td><?php echo $message['SenderId']  ?></td>
                    <td><?php echo $message['Message'] ?></td>
                    <td><?php echo $message['Created-at'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
    <div class="form">
    <form action="">
        <table>
            <th>
        <textarea name="Message" id="Message" cols="50" rows="2" placeholder="enter your msg"></textarea>
        </th>
        <input type="hidden" name="SenderId" id="SenderId" value="<?php echo $SenderId['Id']; ?>">
        <input type="hidden" name="ReciverId" id="ReciverId" value="<?php echo $ReciverId; ?>">
        <th>
        <input type="button" value="send" onclick="insertmsg()">
        </th>
        </table>
    </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        function insertmsg(){
            let data={
                Message: $('#Message').val(),
                SenderId: $('#SenderId').val(),
                ReciverId: $('#ReciverId').val(),
            }
            $.ajax({
                url: "./insert.php",
                type: "POST",
                data:data,
                success: function(response){
                    alert("success");
                    console.log(data);
                    // window.location.href="./insert.php";

                },
                error: function(e){
                    console.log(e);
                }
            })
        }

    </script>
</body>
</html>