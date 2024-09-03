<?php

session_start();
$_SESSION['SenderId'];

// print_r($_SESSION['SenderId']);


include "../connection.php";

$query="SELECT * FROM `users`";
$statement=$connection->prepare($query);
$row=$statement->execute();
$users=$statement->fetchAll(PDO::FETCH_ASSOC);
// print_r($Users);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chat app</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: navy;
        }
        table{
            text-align: center;
            color: white;
        }
        th{
            color: black;
            border: 2px solid black;
            background-color: lightblue;
        }
        a{
            color: yellow;
            
        }
    </style>
</head>
<body>
    <table >
    <thead>
        <th>user</th>
        <th>message</th>
    </thead>
    <tbody>
        <?php foreach($users as $user) {?>
            <tr>
                <td><?php echo $user['UserName'] ?></td>
                <td><a href="../messasge/index.php?Id=<?=$user['Id']?>">Message</a></td>

            </tr>
        <?php } ?>
    </tbody>
    </table>

</body>
</html>