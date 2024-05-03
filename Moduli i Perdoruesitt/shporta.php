<?php
session_start();
include('config.php');
include('crud.php');

function Fshi_pas_24h()
{
    global $lidhe;
    $sql = "DELETE FROM shporta WHERE TIMESTAMPDIFF(HOUR, Koha_Azhurnimit, NOW()) >= 24";
    $x = mysqli_query($lidhe, $sql);
}

if (isset($_POST['fshi'])) {
    $id_to_delete = $_POST['fshi'];

    $crud->Delete('shporta', ['kolona' => 'ID_Shporta', 'value' => $id_to_delete]);
    header('Location: shporta.php');
    exit();
}


if (isset($_POST['fshijtegjitha'])) {
    $crud->Delete('shporta', ['kolona' => 'ID_Perdoruesi', 'value' => $_SESSION['id']]);
    header('Location: shporta.php');
    exit();
}


Fshi_pas_24h();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/shporta.css">
    <link rel="stylesheet" href="../assets/css/responsive-shporta.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Shporta</title>
</head>

<body>
    <button id="relocate"><i class="fa fa-arrow-left"></i></button>
    <div class="container mt-5">
        <h1>Shporta Juaj</h1>
        <table class="table" class="content">

            <tbody>
                <?php
                $id = $_SESSION['id'];
                $sql = 'SELECT * FROM shporta WHERE ID_Perdoruesi =' . $id;
                $stmt = mysqli_query($lidhe, $sql);

                while ($row = mysqli_fetch_array($stmt)) {
                    echo '<tr>';

                    echo '<td id="fotoProdukt"><img src="../assets/images/Produktet/' . $row['Foto'] . '" alt="Product Image" style="max-width: 100px; max-height: 100px;"></td>';
                    echo '<td><h3>' . $row['Emri'] . '</h3>' . '<p>' . $row['Pershkrimi'] . '</p>' . '</td>';
                    echo '<td>'. $row['Sasia'] .'</td>';
                    echo '<td>' . $row['Cmimi'] . '&euro;</td>';
                    echo '<td>
                    <form action="shporta.php" method="post">
                        <input type="hidden" name="fshi" value="' . $row['ID_Shporta'] . '">
                        <button type="submit">Fshi</button>
                    </form>
                  </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
        <div class="checkout" class="content">
            <div class="totali">
                <div class="totali-pa-zbritje">
                   <h5>Totali i Shumës<span>
    <?php
    $result = mysqli_query($lidhe, "SELECT SUM(Cmimi * Sasia) as Totali FROM shporta WHERE ID_Perdoruesi={$_SESSION['id']}");
    echo $result ? number_format(mysqli_fetch_assoc($result)['Totali'], 2) : "Error: " . mysqli_error($lidhe);
    ?>
    &euro;
</span></h5>

                </div>
                <hr>
                <div class="totali-me-zbritje">
                    <h5>Totali i Produkteve: <span>
                            <?php     $result = mysqli_query($lidhe, "SELECT SUM(Sasia) as Totali FROM shporta WHERE ID_Perdoruesi = {$_SESSION['id']}");


                            echo $result ? mysqli_fetch_assoc($result)['Totali'] : "Error: " . mysqli_error($lidhe); ?>
                        </span></h5>
                </div>
                <hr>

                <div class="totali-buttonat">
                    <form action="shporta.php" method="post" style="width:100%">
                        <button type="fshijtegjitha" name="fshijtegjitha">Fshi të gjitha</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelector("#relocate").addEventListener("click", () => {
            window.location.href = "./index.php"
        })
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>