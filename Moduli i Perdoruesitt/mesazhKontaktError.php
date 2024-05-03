<?php
echo "<h1>Mesazhi ka dështuar të dërgohet, ju lutem provoni më vonë.</h1>";
echo "<script>
        setTimeout(function(){
          window.location.href = 'kontakti.php'
        },3000);
      </script>";
?>

<style>
  body{
    display: flex;
    height: 100vh;
    justify-content: center;
    align-items: center;
    font-weight: bold;
  }

  h1{
    font-size: 50px;
  }
</style>