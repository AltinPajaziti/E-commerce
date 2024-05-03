<?php
include('config.php');
include('crud.php');
session_start();
$id = $_SESSION['id'];
$productid = $_REQUEST['ID_Produkti'];
$adresa = $_REQUEST['adresa'];
$numri = $_REQUEST['numri_telefonit'];

$sqlw = "SELECT * FROM produktet WHERE ID_Produkti = " . $productid;

$result = mysqli_query($lidhe, $sqlw);

if ($result) {
    while ($row = mysqli_fetch_array($result)) {
        $Emri = $row['Emri'];
        $Lloji = $row['Lloji'];
        $Cmimi = $row['Cmimi'];
        $Foto = $row['Foto'];
        $Pershkrimi = $row['Pershkrimi'];
    }
    mysqli_free_result($result);
} else {
    echo "Error: " . mysqli_error($lidhe);
}

$sql2 = "SELECT Adresa FROM perdoruesi WHERE ID_Perdoruesi=".$id;

$l = mysqli_query($lidhe , $sql2);
$r = '';

while($row = mysqli_fetch_array($l)){
    $r = $row['Adresa'];
}
$checkS = mysqli_query($lidhe , "SELECT Sasia  FROM shporta WHERE Emri ='".$Emri."' " ." AND ID_Perdoruesi=".$id);

if(mysqli_num_rows($checkS) > 0){
    $row = mysqli_fetch_array($checkS);
    $s = $row['Sasia'] + 1;

    $updati = "UPDATE shporta SET Sasia = " . $s . " WHERE Emri = '" . $Emri . "' AND ID_Perdoruesi = " . $id;

    $ekzekutimi = mysqli_query($lidhe , $updati);
} else {
    $table = "shporta";
    $data = array(
        "Emri" => $Emri,
        "Lloji" => $Lloji,
        "Cmimi" => $Cmimi,
        'ID_Perdoruesi' => $id,
        "Foto" => $Foto,
        "Pershkrimi" => $Pershkrimi,
        "Adresa" => $adresa,
        "Sasia" => 1,
        "Numri" => $numri
    );

    $crud->Create($table ,$data);
}

header('location: Produkti.php?ID_Produkti='.$productid);
?>
