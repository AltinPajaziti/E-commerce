<?php
include('login_verification.php');
if ((isset($_SESSION['emri']) != '')) {
  header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/kyquStyle.css">
  <link rel="stylesheet" href="../assets/css/responsive-kyqu.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  
  <title>Kyçu</title>

</head>

<body>
<button class="btn"><i class="fa fa-arrow-left"></i></button>

  <div class="container">
    <div class="containerInner">
      <form action="" id="Kyqu" autocomplete="off"  method="POST">
        <h1>Kyçuni</h1>
        <div class="form-control"  method="POST">
          <input type="text" required name="email" >
          <label>Përdoruesi</label>
        </div>
        <div class="form-control"  method="POST">
          <input type="password" required name="password">
          <label>Fjalëkalimi</label>
        </div>
        <input type="submit" name="submitbuttoni" value="Kyçu">
      </form>
      



      <form action="kontakti.php" id="Regjistrohu" autocomplete="off"  method="POST">
        <h1>Regjistrohu</h1>
        <div class="form-control"  method="POST">
          <input type="text" required name="Emri">
          <label>Përdoruesi</label>
        </div>
        <div class="form-control"  method="POST">
          <input type="text" required name="Mbiemri">
          <label>Mbiemri</label>
        </div>
        <div class="form-control"  method="POST">
          <input type="password" required name="Passwordi">
          <label>Fjalëkalimi</label>
        </div>
        <div class="form-control"  method="POST">
          <input type="email" required name="emaili">
          <label>Email</label>
        </div>
        <div class="form-control"  method="POST">
          <input type="text" name="adresa" required placeholder="Adresa">
          <label>Adresa</label>
        </div>
        <input type="submit" name="butoni" value="Regjistrohu">
      </form>

      <div class="containerOuter">
        <div class="regjistrimiMesazh">
          <div class="regjistrimiInnerDiv"  method="POST">
            <h1>Bashkohuni me Ne</h1>
            <p>Këtu do te gjesh çdo gjë të mundshme për elektronik</p>
            <button class="buttonat">Kyçu</button>
          </div>
        </div>
        <div class="kyqjaMesazh">
          <div class="kyqjaInnerDiv">
            <h1>Mirësevini!</h1>
            <p>Përshendetje, kyçuni për të gjetur më të rejat nga produktet tona.</p>
            <button class="buttonat">Regjistrohu</button>
          </div>
        </div>
      </div>
    </div>


  </div>

  <script src="../assets/js/kyqu.js"></script>

</body>

</html>