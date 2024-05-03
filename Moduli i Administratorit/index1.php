
    <?php
include('login.php');
if ((isset($_SESSION['emri']) != '')) {
  header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    body{
      display: flex;
      height: 100vh;
      justify-content: center;
      align-items: center;
      background-image: url("../assets/images/bgimage.jpg");
      background-position: 100% 100%;
      background-size: cover;
    }
  </style>
  
  <title>Login</title>
</head>

<body>
 <div class="forma"  method="POST">
        <form method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Emri</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Emri ose Email-i">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Fjalëkalimi</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Fjalëkalimi">
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary">Kyçu</button>
        </form>
    </div> 



      



  </div>

  <script src="../assets/js/kyqu.js"></script>

</body>

</html>