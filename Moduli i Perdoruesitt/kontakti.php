<?php
include('Crud.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require './PHPMailer-PHPMailer-2128d99/src/Exception.php';
require './PHPMailer-PHPMailer-2128d99/src/PHPMailer.php';
require './PHPMailer-PHPMailer-2128d99/src/SMTP.php';

$email = new PHPMailer(true);
$numri_verifikues = '';
$showForm = true;


try {
  // $email->SMTPDebug = SMTP::DEBUG_SERVER;
  if (isset($_POST['butoni'])) {
    $emri = $_POST['Emri'];
    $mbiemri = $_POST['Mbiemri'];
    $adresa = $_POST['adresa'];
    $passwordi = $_POST['Passwordi'];
    $emaili = $_POST['emaili'];

    $ssl = "SELECT * FROM perdoruesi WHERE Email='" . $emaili . "'";
    $s = mysqli_query($lidhe, $ssl);
    if (mysqli_num_rows($s) > 0) {
      echo "<script>
      setTimeout(function(){
         window.location.href = 'index1.php';
      }, 3000);
   </script>";
      echo "<p><b>Ju lutem përdorni një email tjeter, pasi ky është tashmë i përdorur<b></p>";
      $showForm = false;
    } else {
      $email->isSMTP();
      $email->Host = "smtp.gmail.com";
      $email->SMTPAuth = true;
      $email->Username = "OnlineStore210710@gmail.com";
      $email->Password = "aehohcygkaebnoby";
      $email->SMTPSecure = "ssl";
      $email->Port = 465;
      $numri_verifikues = rand(1000, 6000);

      $email->setFrom("OnlineStore@gmail.com");
      $email->addAddress($emaili);

      $email->isHTML(true);
      $email->Subject = "Numri verifikues";
      $email->Body = "Mirësevini në Amela Store\n\n Kodi për verifikim:" . $numri_verifikues;
      $email->AltBody = "Këtu shkruhet mesazhi për tekst që nuk është HTML";


      $email->send();
    }
  }
} catch (Exception $e) {
  echo "Mesazhi nuk u dërgua, ju lutem provoni më vonë, Error: {$email->ErrorInfo}";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Verifikohuni</title>
</head>

<body>
  <button id="buttoni"><i class="fa fa-arrow-left"></i></button>

  <?php if ($showForm) : ?>
    <form action='Email_verification.php' method="POST" class="contactform">
      <label for="exampleInputEmail1">Shkruani kodin per verifikim më poshte:</label>
      <input class="form-control" type="text" placeholder="Kodi Verifikues" name="Kodi">
      <input type="hidden" name="numri" value=<?php echo $numri_verifikues; ?>>
      <input type="hidden" name="emri" value=<?php echo $emri; ?>>
      <input type="hidden" name="password" value=<?php echo $passwordi; ?>>
      <input type="hidden" name="mbiemri" value=<?php echo $mbiemri; ?>>
      <input type="hidden" name="adresa" value=<?php echo $adresa; ?>>
      <input type="hidden" name="emaili" value=<?php echo $emaili; ?>>
      <br>
      <button type="submit" class="btn btn-primary" name="buttoni">Submit</button>
    </form>
  <?php endif; ?>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300&display=swap');


    body {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
      font-family: DM Sans;
      background-image: url("../assets/images/bgimage.jpg");
      background-size: cover;
    }

    .contactform {
      display: flex;
      justify-content: center;
      flex-direction: column;
      align-items: center;
      gap: 10px;
    }

    label {
      font-weight: bold;
      margin-bottom: 20px;
    }

    .contactform input {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      outline: none;
      border: 2px solid rgb(33, 83, 94);
      transition: .3s ease;
    }

    input:focus {
      padding: 12px 20px;
      transition: .3s ease;
    }

    .contactform button {
      width: 100%;
      padding: 10px;
      background-image: linear-gradient(to left bottom, #1abfdf, #333);
      color: white;
      font-weight: bold;
      border: 0;
      border-radius: 5px;
      box-shadow: 0px 0px 4px gray;
      scale: 1;
      transition: .3s ease;
    }

    .contactform button:active {
      box-shadow: 0px 0px 8px black;
      transition: .3s ease;
      scale: .98;

    }

    #buttoni {
      position: absolute;
      left: 10px;
      top: 10px;
      padding: 10px 20px;
      background-color: #20525C;
      color: white;
      border-radius: 50%;
      border: 0;
      font-size: 25px;
      transition: .3s ease;
      cursor: pointer;
    }

    #buttoni:active {
      scale: .95;
      transition: .3s ease;
    }
  </style>

<script>
        document.querySelector("#buttoni").addEventListener("click", () => {
            window.location.href = "./index1.php"
        })
    </script>
</body>

</html>