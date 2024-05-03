<?php
include('config.php');
include('Crud.php');

$errorMessage = '';
$numri =  $_POST['numri'];
$emri = $_POST['emri'];
$mbiemri = $_POST['mbiemri'];
$adresa = $_POST['adresa'];
$emaili = $_POST['emaili'];
$passwordi = $_POST['password'];


if (isset($_POST['buttoni'])) {
    if ($_POST['Kodi'] == $numri) {
        $crud->Create('perdoruesi', ['Emri' => $emri, 'Mbiemri' => $mbiemri, 'Adresa' => $adresa, 'Email' => $emaili, 'passwordi' => $passwordi]);
        header('Location: index1.php');
        exit();
    } else {
        $errorMessage = 'Kodi qe keni shkuar eshte gabim. Ju lutem Kontrolloni ne email!';
    }
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

    <br>

    <form method="post" action='Email_verification.php'>
        <?php if (!empty($errorMessage)) : ?>
            <label for="exampleInputEmail1" style="color:red;"><?php echo $errorMessage; ?></label><br>
        <?php endif; ?>

        <input type="text" name="Kodi" id="Kodi"><br><br>
        <button type="submit" class="btn btn-primary" name="buttoni">Submit</button>
        <input type="hidden" name="numri" value=<?php echo $_POST['numri']; ?>>
        <input type="hidden" name="emri" value=<?php echo $emri; ?>>
        <input type="hidden" name="password" value=<?php echo $passwordi; ?>>
        <input type="hidden" name="mbiemri" value=<?php echo $mbiemri; ?>>
        <input type="hidden" name="adresa" value=<?php echo $adresa; ?>>
        <input type="hidden" name="emaili" value=<?php echo $emaili; ?>>
    </form>




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

        form {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }

        label {
            font-weight: bold;
            margin-bottom: 20px;
        }

        form input {
            width: 60%;
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

        form button {
            width: 60%;
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

        form button:active {
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