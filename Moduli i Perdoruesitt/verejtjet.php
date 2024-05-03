<?php
include('Crud.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../assets/js/PHPMailer/src/Exception.php';
require '../assets/js/PHPMailer/src/PHPMailer.php';
require '../assets/js/PHPMailer/src/SMTP.php';

try {
  if (isset($_POST['dergo'])) {
    $emri = $_POST['Emri'];
    $mbiemri = $_POST['Mbiemri'];
    $emaili = $_POST['emaili'];
    $subjekt = $_POST['subjekti'];
    $kontakti = $_POST['NrKontaktues'];
    $mesazhi = $_POST['mesazhi'];

    $dataToInsert = array(
      'Emri' => $emri,
      'Mbiemri' => $mbiemri,
      'Nr_Telefonit' => $kontakti,
      'Adresa' => $subjekt,
      'Emaili' => $emaili,
      'pershkrimi' => $mesazhi
    );

    $crud->Create('kontakti', $dataToInsert);

    echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('formContainer').style.display = 'none';
                document.getElementById('successMessage').style.display = 'block';
                document.querySelector('.innerContainer').style.display = 'none';
                setTimeout(function() {
                    document.getElementById('successMessage').style.display = 'none';
                    window.location.href = 'index.php';
                }, 5000);
            });
        </script>";
  }
} catch (Exception $e) {
  // ... (kodi për raste gabimesh)
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/kontaktiStyle.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../assets/css/responsive-kontakti.css">
  <title>Kontakti</title>
</head>

<body>
  <button><i class="fa fa-arrow-left"></i></button>
  <div class="container">



    <form action="verejtjet.php" method="post" id="formContainer">
      <h1>Kontakti</h1>
      <div class="form">
        <div class="form-control">
          <input type="text" name="Emri" required>
          <label>Emri</label>
        </div>
        <div class="form-control">
          <input type="text" name="Mbiemri" required>
          <label>Mbiemri</label>
        </div>
      </div>
      <div class="form">
        <div class="form-control">
          <input type="number" name="NrKontaktues" maxlength="9" minlength="0" required>
          <label>Numri Kontaktues</label>
        </div>

        <div class="form-control">
          <input type="text" name="subjekti">
          <label>Subjekti</label>
        </div>
      </div>

      <div class="form-control">
        <input type="email" name="emaili" required>
        <label>Email</label>
      </div>
      <textarea name="mesazhi" id="mesazh" cols="30" rows="10" placeholder="Mesazhi juaj..."></textarea>
      <input type="submit" name="dergo" value="Submit">
    </form>

    <div class="innerContainer">
      <div class="info">
        <h3><i class="fa fa-phone"></i> Numri Kontaktues</h3>
        <h6>Na kontaktoni në numrin: 046-123-202</h6>
      </div>
      <div class="info">
        <h3><i class="fa fa-map-marker"></i> Lokacioni</h3>
        <h6>Na vizitoni në zyret tona: Rr.Zija Shemsiu Gjilan 60000</h6>
      </div>
      <div class="info">
        <h3><i class="fa fa-clock-o"></i> Orët Biznesore</h3>
        <h6>Jemi te hapurë për thirrje ose vizita: 08.00:16:00</h6>
      </div>
    </div>
    <div id="successMessage" style="display:none;padding:20px">
      <p><b>Vërejtja është duke u dërguar në sistem. Ju lutem pritni 5 sekonda.</b></p>
    </div>
  </div>


  <script src="../assets/js/kontakti.js"></script>

</body>

</html>