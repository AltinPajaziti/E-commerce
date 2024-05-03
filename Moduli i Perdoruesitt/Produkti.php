<?php
session_start();
include('config.php');

$idProdukti = $_GET['ID_Produkti'];


$sql = "SELECT * FROM produktet WHERE ID_Produkti='" . $idProdukti . "'";

$query = mysqli_query($lidhe, $sql);

while ($row = mysqli_fetch_array($query)) {




?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../assets/css/responsive-produkti.css">
        <title>Blej Produktin</title>
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            .blejProduktin span {
                font-size: 25px;
                transform: translateY(15px);
            }
        </style>
    </head>

    <body>
        <nav style="background-color: rgb(33, 83, 94);">
            <ul>
                <li><a href="index.php"><i class="fa fa-home"></i>Ballina</a></li>
                <li><a href="produktet.php"><i class="fa fa-info-circle"></i>Produktet</a></li>
                <li><a href="verejtjet.php"><i class="fa fa-phone"></i>Kontakti</a></li>
                <?php
                if (isset($_SESSION['emri']) && $_SESSION['emri'] != '') {
                ?>
                    <li><a href="shporta.php"><i class="fa fa-shopping-cart"></i>Shporta</a></li>
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
        <div class="product">
            <div class="productInfo">
                <img src="../assets/images/Produktet/<?= $row['Foto'] ?>" alt="">
            </div>
            <div class="productInfo">
                <h2><?= $row['Emri'] ?></h2>
                <div class="llojiProduktit">
                    <h3><?= $row['Lloji'] ?></h3><br>
                    <p><?= $row['Pershkrimi'] ?></p>
                </div>
                <div class="blejProduktin">
                    <span> <?= $row['Cmimi']  ?> €</span>
                    <form action="shtoproduktin.php?ID_Produkti=<?= $idProdukti ?>" method="POST" onsubmit="return paraqitMesazhin(event)">
                        <div>
                            <input type="text" placeholder="numri i telefonit" name="numri_telefonit" required><br><br>
                            <input type="text" placeholder="adresa" name="adresa" required><br><br>
                        </div>
                        <input type="submit" value="Blej">
                    </form>


                    
                </div>
                <div class="mesazhi" style="display:none">
                        Porosia juaj u realizua me sukses. Për kthim, ju lutemi ta anuloni porosine në shportë brenda 24 orëve.</div>
            </div>
        </div>

    <?php } ?>

    <script>
        let navBtn = document.querySelector(".navBtn")
        let nav = document.querySelector("nav")


        navBtn.addEventListener("click", () => {
            nav.classList.toggle("active")
            if (nav.classList.contains("active")) {
                document.querySelector(".fa.fa-bars").classList.replace("fa-bars", "fa-times")
            } else {
                document.querySelector(".fa.fa-times").classList.replace("fa-times", "fa-bars")
            }
        })

        function paraqitMesazhin(event) {
            event.preventDefault();
            let mesazhiDiv = document.querySelector('.mesazhi');
            mesazhiDiv.style.display = 'block';

            setTimeout(function() {
                event.target.submit();
            }, 4000);

            return false;
        }
    </script>
    </body>

    </html>