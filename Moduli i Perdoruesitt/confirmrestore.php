<?php

include('config.php');
include('crud.php');
$Emaili = $_POST['emaili'];
$passi = $_POST['passi'];


if (isset($_POST['buttoni'])) {
    if ($_POST['passi'] != '') {

        $crud->Update('perdoruesi', ['Email' => $Emaili], ['kolona' => 'passwordi', 'value' => $passi]);
        echo "<script>
      setTimeout(function(){
         window.location.href = 'index1.php';
      }, 3000);
   </script>";
        echo "<p><b>Passwordi juaj eshte resetuar me suksese<b></p>";

        exit();
    } else {
        $errorMessage = 'Incorrect code. Please try again.';
    }
}
?>


?>