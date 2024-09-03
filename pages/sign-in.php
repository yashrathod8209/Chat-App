<?php


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    
    <style>
      .table{
        width: 500px;
        display: flex;
        justify-content:right ;
      }


 body{
    margin: 0%;
    padding: 0%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.container{
    width: 350px;
    padding: 30px;
    box-shadow: 0 2px 5px gray;
    margin-top: 30px;
}

h1{
    text-align: center;
    margin-bottom: 30px;

}

input[type="text"]{
    width: 330px;
    padding: 10px ;
    margin-bottom: 10px ;
}

#submit{
    width: 100%;
    background-color: yellow;
    padding: 10px 20px;
    margin-top:  10px;
}

.forgotpss{
    margin-top: 10px;
    text-align: center;
}


    </style>

</head>
<body>
    <div class="container">
        <h1>Welcome </h1>
        <form >
            <label>Username </label>
            <input type="text" name="UserName" placeholder="Enter your Username" id='UserName' >
        
            <label for="Password">Password </label>
            <input type="text" name="Password" placeholder="Enter your Password" id="Password">
            
            <label for="Password">Email </label>
            <input type="text" name="Email" placeholder="Enter your Email" id="Email">
            
            <input type="checkbox" name="remember me" >
            <label for="checkbox">Remember me</label>

            <input type="submit" value="submit" onclick="insertdata()" id="submit"/>
            <div class="forgotpss">
                <a href="./log-in.php">log-in</a><br> 
            </div>
        </form>
        
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        function insertdata(){
                  let data ={
                     UserName: $('#UserName').val(),
                     Password: $('#Password').val(),
                     Email: $('#Email').val(),
                  }
                  $.ajax({
                     url:"../api/insert-user.php",
                     type: "POST",
                     data: data,
                     success: function(response) {
                      $('#UserName').val('');
                      $('#UserName').focus();
                     },
                     error: function(e){
                        conole.log(e);
                     }
                  });
               }

    </script>
    
</body>
</html