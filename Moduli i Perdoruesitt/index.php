<?php
session_start();
include('config.php');
include('crud.php');

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/responsive-style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
    integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <title>Ballina</title>
</head>

<body>
  <div id="container">
    <nav>
      <ul>
        <li><a href="index.php"><i class="fa fa-home"></i>Ballina</a></li>
        <li><a href="produktet.php"><i class="fa fa-info-circle"></i>Produktet</a></li>
        <li><a href="verejtjet.php"><i class="fa fa-phone"></i>Kontakti</a></li>
        <?php
        if (isset($_SESSION['emri']) && $_SESSION['emri'] != '') {
          ?>
          <li><a href="shporta.php"><i class="fa fa-shopping-cart"></i>Shporta<span><?php $dbms = "SELECT Sum(Sasia) FROM shporta WHERE ID_Perdoruesi=" . $_SESSION['id'];
              $x = mysqli_query($lidhe, $dbms);
              $row = mysqli_fetch_row($x);
              $count = $row[0];
              echo $count ?></span>
            </a></li>
          <li><a href="logout.php"><i class="fa fa-sign-out"></i>Çkyçu
            </a></li>


          <?php
        } else {
          ?>
          <li><a href="index1.php"><i class="fa fa-sign-in"></i>Kyçu</a></li>
          <?php
        }
        ?>


      </ul>
      <button class="navBtn"><i class="fa fa-bars" ></i></button>
    </nav>

    <header>
      <div class="carousel">
        <div class="carousel-item active"></div>
        <div class="carousel-item"></div>
        <div class="carousel-item"></div>
      </div>
      <div id="headerText">
        <h1>Mirësevini në Amela Online Store</h1>
        <p>
        Përshëndetje dhe mirësevini në platformën tonë e-commerce! 
Jemi këtu për të garantuar një eksperiencë blerje të jashtëzakonshme. 
Me një gamë të gjërë produktesh, të kujdesura me detaje për të plotësuar preferencat tuaja, ofrojmë cilësi dhe inovacion.
Nëse keni pyetje apo nevojë për ndihmë, jemi këtu për ju.
 Faleminderit për zgjedhjen tuaj!</p>
        <a href="produktet.php">Bli Tani</a>
      </div>

    </header>

    <main>

      <div class="products">
        <h1 class="MainHeading">PRODUKTET MË TË KËRKUARA</h1>
        <?php
        $produktet = $crud->Read('produktet');
        $selectedProducts = array_slice($produktet, 0, 8);
        foreach ($selectedProducts as $produkt) {
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
                <button><a href="Produkti.php?ID_Produkti=<?= $produkt['ID_Produkti'] ?>">Shiko</a> <i
                    class="fa fa-shopping-cart"></i></button>
              <?php } else { ?>
                <button><a href="index1.php">Shiko</a> <i class="fa fa-shopping-cart"></i></button>
              <?php } ?>
            </div>
          </div>
          <?php
        }
        ?>
      </div>

      <div class="statistics">
        <div class="stat">
          <i class="fa fa-truck"></i>
          <div class="statInfo" data-target="800">0</div>
          <h2>Dërgesat</h2>
        </div>
        <div class="stat">
          <i class="fa fa-bar-chart"></i>
          <div class="statInfo" data-target="200">0</div> <!-- Pak a shume -->
          <h2>Produktet Tona</h2>
        </div>
        <div class="stat">
          <i class="fa fa-map-marker"></i>
          <div class="statInfo" data-target="40">0</div>
          <h2>Destinacionet</h2>
        </div>
      </div>

      <div id="extraInfo">
        <h1 class="MainHeading">KLIENTËT TANË MË TË KËNAQUR</h1>
        <div class="swiper-wrapper">
          <div class="swiper-slide" v-for="(koment,index) in comments" :key="index">
            <p> {{ koment.komenti }}</p>
            <div class="customerInfo">
              <img width="30px" src="../assets/Images/avatarMale.jpg" v-if="koment.gender">
              <img width="30px" src="../assets/Images/avatarFemale.png" v-else>
              <h1>{{ koment.emri }}</h1>
            </div>
          </div>
        </div>
      </div>
    </main>

    <footer>
      <div class="footerBox">
        <h3>Shikoni më shumë në rrjetet tona sociale</h3>
        <div class="socials">
          <div class="social"><a href="https://www.facebook.com/lirim.ymeri.7">Facebook <i class="fa fa-facebook"></i></a></div>
          <div class="social"><a href="https://www.instagram.com/albimehmeti_/">Instagram <i class="fa fa-instagram"></i></a></div>
          <div class="social"><a href="">Twitter <i class="fa fa-twitter"></i></a> </div>
          <div class="social"><a href="38346123202">WhatsApp <i class="fa fa-whatsapp"></i></a></div>
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
  </div>

  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="../assets/js/script.js"></script>
  <script>
    const vue = Vue.createApp({
      data() {
        return {
          comments: [{
            emri: "Ilir Gashi",
            komenti: "Blerja ime e fundit nga Amela për një laptop ishte një sukses total! Produkti është shumë cilësor, dhe çmimi ishte fantastik. Do të vazhdoj të blej nga ky vend!",
            gender: true,
          },
          {
            emri: "Dafina Hajdari",
            komenti: "Amela është destinacioni im i parë për produkte elektronike. Kam blerë një smartphone dhe kam qenë tejet e kënaqur me cilësinë dhe shërbimin e shpejtë. Të nderuarit, Amela!",
            gender: false,
          },
          {
            emri: "Ergin Krasniqi",
            komenti: "Sot më është dorëzuar porosia ime nga Amela për një kamerë fotografike. Produkti është në nivelin më të lartë teknologjik, dhe pakoja ishte e mbrojtur shumë mirë gjatë transportit. ",
            gender: true,
          },
          {
            emri: "Blerta Shala",
            komenti: "Nuk mund të besoj se gjetëm një ofertë të tillë të mirë në Amela për një televizor smart! Kjo faqe e-commerce ka një gamë të shkëlqyeshme të produkteve elektronike.",
            gender: false,

          },
          {
            emri: "Agron Bajrami",
            komenti: "Si një teknofil, kisha nevojë për një tablet të ri dhe gëzuar që e gjej në Amela. Cilësia është e padiskutueshme, dhe shërbimi i klientit ishte shumë i ndihmshëm. Faleminderit, Amela, për eksperiencën shkëlqyeshëm!",
            gender: true,

          }
          ]
        }
      }
    }).mount("#extraInfo")

    const komentet = new Swiper('#extraInfo', {
      effect: 'coverflow',
      grabCursor: false,
      centeredSlides: true,
      slidesPerView: 'auto',
      coverflow: {
        rotate: 50,
        stretch: 0,
        depth: 10,
        modifier: 1,
        slideShadows: false
      },
      loop: true
    });
  </script>
</body>

</html>