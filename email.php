<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include_once("connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Simple query
    $result = $conn->query("SELECT * FROM register WHERE email = '$email'");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $password = $row['Password'];
        $name = $row['User_name'];

    require 'vendor/autoload.php';

     $mail = new PHPMailer(true);

try {
    // SMTP Settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';  
    $mail->SMTPAuth   = true;
    $mail->Username   = 'hk12wahab@gmail.com';  // Apna Gmail
    $mail->Password   = 'rjiu awhp ibmi kfrs'; // Yahan App Password paste karo
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Sender & Recipient
    $mail->setFrom('hk12wahab@gmail.com', 'Chaudry Wahab'); // Aap ka email
    $mail->addAddress($email, $name); // Jis ko bhejna hai

    // Email Content
    $mail->isHTML(true);  // HTML email bhejne ke liye
    $mail->Subject = 'Your Password Is Recoverd';
    $mail->Body = "<h1>Salam!</h1>
<p>Ap nay jo request di thi kay ap ka password forget ho gaya ha uski recovery kay liya ye App Ka password ye hai: 
<strong>" . $password . "</strong></p>";

    // Send Email
    $mail->send();
    echo 'Email successfully sent!';
} catch (Exception $e) {
    echo "Email could not be sent. Error: {$mail->ErrorInfo}";
}





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
</head>
  <body>
      <div class="form postion-absolute top-0 bottom-0 left-0 right-0 d-flex justify-content-center py-4">
        <div class="coantainer">
            <div class="col-12">
                <h2>Enter The Email</h2>
                <p>An Email is Send to your mail that contains your cradentails</p>
                <form action="" method="POSt" class="d-flex flex-column align-items-start gap-2">
                    <input type="Email" name="email" placeholder="Email" required>
                    <button class="btn btn-success" type="submit">Send</button>
                </form>
            </div>
        </div>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
