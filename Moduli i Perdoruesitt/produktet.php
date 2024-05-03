<?php

session_start();
include('crud.php');
include('config.php');

$sql = "SELECT * FROM produktet";

if (isset($_POST['submit'])) {
  $produkti = $_POST['produkti'];
  $kategorite = isset($_POST['kategorite']) ? $_POST['kategorite'] : [];
  $numericInput1 = $_POST['numericInput1'];
  $numericInput2 = $_POST['numericInput2'];

  $kushtet = [];

  if (!empty($produkti)) {
    $kushtet[] = "Emri LIKE '%$produkti%'";
  }

  if (!empty($kategorite)) {
    $kushtet[] = "ID_Kategoria IN (" . implode(',', $kategorite) . ")";
  }

  if (!empty($numericInput1) && !empty($numericInput2)) {
    $kushtet[] = "Cmimi BETWEEN $numericInput1 AND $numericInput2";
  }

  if (!empty($kushtet)) {
    $sql .= " WHERE " . implode(' AND ', $kushtet);
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="../assets/css/style.css"> -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="../assets/css/produktetStyle.css">
  <link rel="stylesheet" href="../assets/css/responsive-style.css">
  <link rel="stylesheet" href="../assets/css/responsive-produktet.css">
  <title>Document</title>
</head>

<body>

  <nav style="background-color:#1c4b54bd;">
    <ul>
      <li><a href="index.php"><i class="fa fa-home"></i>Ballina</a></li>
      <li><a href="produktet.php"><i class="fa fa-info-circle"></i>Produktet</a></li>
      <li><a href="verejtjet.php"><i class="fa fa-phone"></i>Kontakti</a></li>
      <?php
      if (isset($_SESSION['emri']) && $_SESSION['emri'] != '') {
      ?>
        <li><a href="shporta.php"><i class="fa fa-shopping-cart"></i>Shporta<span><?php $dbms = "SELECT sum(Sasia) FROM shporta WHERE ID_Perdoruesi=" . $_SESSION['id'];
                                                                                  $x = mysqli_query($lidhe, $dbms);
                                                                                  $row = mysqli_fetch_row($x);
                                                                                  $count = $row[0];
                                                                                  echo $count ?>
            </span>
          </a></li>
        <li><a href="logout.php"><i class="fa fa-sign-out"></i>Çkyçu
            <?php echo $_SESSION['emri']; ?>
          </a></li>


      <?php
      } else {
      ?>
        <li><a href="index1.php"><i class="fa fa-sign-in"></i>Kyçu</a></li>
      <?php
      }
      ?>



    </ul>
    <button class="navBtn"><i class="fa fa-bars"></i></button>

  </nav>

  <form action="produktet.php" method="post" class="produktetKonfig">
    <input id="KerkoProduktin" type="text" name="produkti" placeholder="Kërko Produktin">


    <div class="kategorite">

      <?php $produktet = $crud->Read('kategoria_produkteve');



      foreach ($produktet as $produkti) {



      ?>


        <input type="checkbox" name="kategorite[]" value="<?php echo $produkti['ID_Kategoria']; ?>">
        <label>
          <?php echo $produkti['Emri']; ?>
        </label>




      <?php } ?>
    </div>

    <div class="KonfigCmimi">
      <div class="price">
        <p>&euro; </p>
        <input type="number" id="numericInput" name="numericInput1" length="5" min="0" max="10000" step="1" placeholder="Nga">

      </div>
      -
      <div class="price">
        <p>&euro; </p>
        <input type="number" id="numericInput" name="numericInput2" length="5" min="0" max="10000" step="1" placeholder="deri">
      </div>
      <input type="submit" name='submit' value="Filtro">
    </div>
  </form>

  <br>
  <div class="products">

    <?php

    $query = mysqli_query($lidhe, $sql);
    while ($produkt = mysqli_fetch_assoc($query)) {

    ?>
      <div class="bestSeller">
        <div class="wrapper">
          <img src="../assets/images/Produktet/<?= $produkt['Foto'] ?>" alt="">
        </div>
        <h2>
          <?= $produkt['Emri'] ?>
        </h2>
        <div class="productInfo">
          <h4>
            <?= $produkt['Cmimi'] ?>€
          </h4>
          <?php if (isset($_SESSION['emri'])) { ?>
            <button><a href="Produkti.php?ID_Produkti=<?= $produkt['ID_Produkti'] ?>">Shiko</a> <i class="fa fa-shopping-cart"></i></button>
          <?php } else { ?>
            <button><a href="index1.php">Shiko</a> <i class="fa fa-shopping-cart"></i></button>
          <?php } ?>
        </div>
      </div>
    <?php
    }
    ?>
  </div>

  <button id="goUp"><i class="fa fa-arrow-up"></i></button>
  <h3 id="goUpMessage">Shko më lartë</h3>

  <footer>
    <div class="footerBox">
      <h3>Shikoni më shumë në rrjetet tona sociale</h3>
      <div class="socials">
        <div class="social"><a href="">Facebook <i class="fa fa-facebook"></i></a></div>
        <div class="social"><a href="">Instagram <i class="fa fa-instagram"></i></a></div>
        <div class="social"><a href="">Twitter <i class="fa fa-twitter"></i></a> </div>
        <div class="social"><a href="">WhatsApp <i class="fa fa-whatsapp"></i></a></div>
      </div>
    </div>
    <div class="footerBox">
      <h3>Informata Komunikimi</h3>
      <div class="contactInfo">
        <h4><i class="fa fa-envelope"></i> OnlineStore21071128@gmail.com</h4>
        <h4><i class="fa fa-phone"></i> 046-123-202</h4>
        <h4><i class="fa fa-comments"></i> Komuniko me Administratorët tanë!</h4>
      </div>
    </div>
    <div class="footerBox">
      <h3>Navigo</h3>
      <ul>
        <li><a href="index.php"><i class="fa fa-home"></i>Ballina</a></li>
        <li><a href="produktet.php"><i class="fa fa-info-circle"></i>Produktet</a></li>
        <li><a href="verejtjet.php"><i class="fa fa-phone"></i>Kontakti</a></li>
      </ul>
    </div>
    <div class="fun">
      <i class="fa fa-truck"></i>
      <div class="line"></div>
      <i class="fa fa-map-marker"></i>
    </div>
  </footer>

  <div class="copyright">
    <h4>E drejtat Autoriale &copy; 2023 Amela. Të gjitha të drejtat e rezervuara. Riprodhimi ose shpërndarja e
      paligjshme është rreptësisht e ndaluar</h4>
  </div>
  <script src="../assets/js/produktet.js"></script>
</body>

</html>