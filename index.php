<?php
include_once("connect.php");
session_start();
$btn = "login";


// if (isset($_SESSION["user_id"]) || isset($_COOKIE["user_id"])) {
//     header("Location: dash.php"); // Redirect to dashboard
//     exit();
// }
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $user_name = $_POST["user"];
    $password = $_POST["pass"];
    $sql = "SELECT * FROM register WHERE user_name = '$user_name' AND Password = '$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $_SESSION["user_name"] = $user_name;

        // ✅ Set cookie for auto-login (valid for 30 days)
        setcookie("user_name", $user_name, time() + (30 * 24 * 60 * 60), "/");
       header("Location: dash.php");
       exit();
   } else {
       echo '<script>
        alert("Invalid USername Or Password!");
    </script>';
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
           </style>  
</head>
  <body>
    <div class="align-center">

        <div class="main bg-white h-70 rounded-4">
            <div class="container c0l-12 d-flex gap-4">
                <div class="col-9 w-4 h-70 bg-white py-3 px-4 d-flex flex-column justify-content-evenly">
                    <div class="head">
                        <h2>Welcome Back</h2>
                        <h6>Enter The Cradentails</h6>
                    </div>        
                    <div class="mid d-flex flex-column gap-2 w-100">
                        <div class="mid-m ">
                            <form method="POST" class="d-flex flex-column gap-2">
                                <input type="text" name="user"placeholder="Enter Username" required>
                                <input type="password" name="pass" placeholder="Enter password" required>
                              <button class="btn btn-success" type="submit"><?php echo $btn;?></button>
                            </form>
                        </div>
                        <div class="mid-f d-flex justify-content-between">
                            <a href="email.php">Forget Password</a>
                            <a href="reg.php">Create One!</a>
                        </div>
                    </div>
                    
                </div>
                <div class="col-3 h-70 bg-transparent py-3 rounded-end-4">
                        <img src="login-img.jpg" alt="" width="400px" height="100%">
                </div>
            </div>
        </div>
    </div>
    <script>
        let storage = "<?php echo $_SESSION['user_name']?>";
        sessionStorage.setItem("user_id", storage);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>