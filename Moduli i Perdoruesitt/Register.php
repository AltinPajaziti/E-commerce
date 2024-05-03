<?php 
    include('config.php');
?>


<link rel="stylesheet" href="../assets/css/kyquStyle.css">



<form action="" id="Regjistrohu" autocomplete="off">
        <h1>Regjistrohu</h1>
        <div class="form-control">
          <input type="text" required name="Perdoruesi">
          <label>Përdoruesi</label>
        </div>
        <div class="form-control">
          <input type="password" required name="Fjalekalimi">
          <label>Fjalëkalimi</label>
        </div>
        <div class="form-control">
          <input type="email" required name="email">
          <label>Email</label>
        </div>
        <div class="form-control">
          <input type="number" name="NrKontaktues" required maxlength="9">
          <label>Numri Kontaktues</label>
        </div>
        <input type="submit" value="Regjistrohu">
      </form>

      <div class="containerOuter">
        <div class="regjistrimiMesazh">
          <div class="regjistrimiInnerDiv">
            <h1>Bashkohuni me Ne</h1>
            <p>Këtu do të gjesh çdo gjë të mundshme për elektronik</p>
            <button>Kyçu</button>
          </div>
        </div>
        <div class="kyqjaMesazh">
          <div class="kyqjaInnerDiv">
            <h1>Mirësevini!</h1>
            <p>Përshendetje, kyçuni për të gjetur me të rejat nga produktet tona.</p>
            <button>Regjistrohu</button>
          </div>
        </div>
      </div>
    </div>


  </div>

  <script src="../assets/js/kyqu.js"></script>
</body>

</html>