<?php
include_once("connect.php");

session_start();
if($_SERVER["REQUEST_METHOD"] =="POST"){
$first=$_POST["first"];
$last=$_POST["last"];
$email=$_POST["email"];
$date=$_POST["date"];
$userr=$_POST["user"];
$passw=$_POST["pass"];

$insert = "INSERT INTO register (First_name,Last_name,Email,DATE_Of_Birth,User_name,Password) VALUES('$first','$last','$email','$date','$userr','$passw')";
if($conn->query($insert)===true){
    echo "insert";
}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <style>
        body{
            background-color: black;
        }
        .align-center{
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
        }
        .h-70{
         height: 70vh;
        }   
        .w-4{
            width: 400px;
            overflow: hidden;
        }
        .mid-m input{
            width: 100%;
            padding: 4px 5px;
        }
        .two-input input{
            width: 49%;
        }
           </style>  
</head>
  <body>
    <div class="align-center">

        <div class="main bg-white h-70 rounded-4">
            <div class="container c0l-12 d-flex gap-4">
                <div class="col-9 w-4 h-70 bg-white py-3 px-4 d-flex flex-column justify-content-center">
                    <div class="head">
                        <h2>Welcome Back</h2>
                        <h6>Enter The Cradentails</h6>
                    </div>        
                    <div class="mid d-flex flex-column gap-2 w-100">
                        <div class="mid-m ">
                            <form method="POST" class="d-flex flex-column gap-2">
                                <div class="two-input d-flex gap-1">
                                    <input class="col-6" type="text" name="first" placeholder="Enter First Name" required>
                                    <input class="col-6" type="text" name="last" placeholder="Enter Last Name" required>
                                </div>
                                <div class="two-input d-flex gap-1">
                                    <input class="col-6" type="emai" name="email" placeholder="Enter Email" required>
                                    <input class="col-6" type="text" name="date" required
                                     onfocus="this.type='date';"
                                     onblur="this.type='text';"
                                     placeholder="Enter Date of Birth">
                                </div>
                                <input type="text" name="user"placeholder="Enter Username" required>
                                <input type="password" name="pass" placeholder="Enter password" required>
                              <button class="btn btn-success" type="submit">Create</button>
                            </form>
                        </div>
                        <div class="mid-f">
                            <a href="index.php">Already Have An Account!</a>
                        </div>
                    </div>
                    
                </div>
                <div class="col-3 h-70 bg-transparent py-3 rounded-end-4">
                        <img src="login-img.jpg" alt="" width="400px" height="100%">
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>