<?php
include('Controll.php');

include('crud.php');

$message = "";  // Initialize an empty message

if (isset($_POST['submiti'])) {
    $emri = $_POST['Emri'];
    $lloji = $_POST['Lloji'];
    $cmimi = $_POST['Cmimi'];
    $Foto = $_POST['Foto'];
    $Pershkrimi = $_POST['Pershkrimi'];
    $kategoria = $_POST['inputChoice'];

    $sqlll = "SELECT ID_Kategoria FROM kategoria_produkteve WHERE Emri=?";
    $stmt_select = mysqli_prepare($lidhe, $sqlll);
    mysqli_stmt_bind_param($stmt_select, "s", $kategoria);
    mysqli_stmt_execute($stmt_select);
    $result = mysqli_stmt_get_result($stmt_select);

    if ($row = mysqli_fetch_array($result)) {
        $id_k = $row['ID_Kategoria'];
    } else {
        die("Error in fetching category ID: " . mysqli_error($lidhe));
    }

    mysqli_stmt_close($stmt_select);

    $insert_query = "INSERT INTO produktet (Emri, Lloji, Cmimi, Foto, Pershkrimi, ID_Kategoria) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($lidhe, $insert_query);

    if (!$stmt) {
        die("Error in statement preparation: " . mysqli_error($lidhe));
    }

    mysqli_stmt_bind_param($stmt, "sssssi", $emri, $lloji, $cmimi, $Foto, $Pershkrimi, $id_k);

    if (mysqli_stmt_execute($stmt)) {
        // Set the success message
        $message = "Produkti u shtua me sukses!";

        // Redirect after 5 seconds
        echo "<meta http-equiv='refresh' content='5;url=shto_produktin.php'>";
    } else {
        $message = "Gabim gjatë shtimit të produktit: " . mysqli_error($lidhe);
    }

    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css
">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css
">
    <title>Shto Produktin</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

        .col-auto i {
            color: gray;
        }

        :root {
            --header-height: 3rem;
            --nav-width: 68px;
            --first-color: #20525C;
            --first-color-light: #AFA5D9;
            --white-color: #F7F6FB;
            --body-font: 'Nunito', sans-serif;
            --normal-font-size: 1rem;
            --z-fixed: 100
        }

        *,
        ::before,
        ::after {
            box-sizing: border-box
        }

        body {
            position: relative;
            margin: var(--header-height) 0 0 0;
            padding: 0 1rem;
            font-family: var(--body-font);
            font-size: var(--normal-font-size);
            transition: .5s
        }



        a {
            text-decoration: none
        }

        .header {
            width: 100%;
            height: var(--header-height);
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1rem;
            background-color: var(--white-color);
            z-index: var(--z-fixed);
            transition: .5s
        }

        .header_toggle {
            color: var(--first-color);
            font-size: 1.5rem;
            cursor: pointer
        }

        .header_img {
            width: 35px;
            height: 35px;
            display: flex;
            justify-content: center;
            border-radius: 50%;
            overflow: hidden
        }

        .header_img img {
            width: 40px
        }

        .l-navbar {
            position: fixed;
            top: 0;
            left: -30%;
            width: var(--nav-width);
            height: 100vh;
            background-color: var(--first-color);
            padding: .5rem 1rem 0 0;
            transition: .5s;
            z-index: var(--z-fixed)
        }

        .nav {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden
        }

        .nav_logo,
        .nav_link {
            display: grid;
            grid-template-columns: max-content max-content;
            align-items: center;
            column-gap: 1rem;
            padding: .5rem 0 .5rem 1.5rem
        }

        .nav_logo {
            margin-bottom: 2rem
        }

        .nav_logo-icon {
            font-size: 1.25rem;
            color: var(--white-color)
        }

        .nav_logo-name {
            color: var(--white-color);
            font-weight: 700
        }

        .nav_link {
            position: relative;
            color: var(--first-color-light);
            margin-bottom: 1.5rem;
            transition: .3s
        }

        .nav_link:hover {
            color: var(--white-color)
        }

        .nav_icon {
            font-size: 1.25rem
        }

        .show {
            left: 0
        }

        .body-pd {
            padding-left: calc(var(--nav-width) + 1rem)
        }

        .active {
            color: var(--white-color)
        }

        .active::before {
            content: '';
            position: absolute;
            left: 0;
            width: 2px;
            height: 32px;
            background-color: var(--white-color)
        }

        .height-100 {
            height: 100vh
        }

        @media screen and (min-width: 768px) {
            body {
                margin: calc(var(--header-height) + 1rem) 0 0 0;
                padding-left: calc(var(--nav-width) + 2rem)
            }

            .header {
                height: calc(var(--header-height) + 1rem);
                padding: 0 2rem 0 calc(var(--nav-width) + 2rem)
            }

            .header_img {
                width: 40px;
                height: 40px
            }

            .header_img img {
                width: 45px
            }

            .l-navbar {
                left: 0;
                padding: 1rem 1rem 0 0
            }

            .show {
                width: calc(var(--nav-width) + 156px)
            }

            .body-pd {
                padding-left: calc(var(--nav-width) + 188px)
            }
            
        }

        .col-xl-3,
        .card,
        .card-body {
            border-radius: 10px;
        }

        .card {
            border-left: 3px solid #20525C;
        }


        .forma{
            width: 500px;
            margin: auto;
        }

        form{
            display: flex;
            gap: 5vw;
        }

        form select{
            padding: 5px 20px;
            border: 1px solid lightgray;
            border-radius: 5px;
            width: 90%;
        }

        form span, select{
            margin-left: 10px;
        }

        form input{
            width: 15vw;
        }

        .split{
            position: relative;
        }

        form .split .form-group{
            padding: 10px;
        }

        .split .btn{
            background-color: #20525C;
            border: 0;
        }

        @media screen and (max-width: 700px){
            form{
                flex-direction: column;
            }
        }
       
    </style>
</head>

<body id="body-pd">
    <div class="container-fluid">
        <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <a href="home.php" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Administratori</span> </a>
                <div class="nav_list">
                    <a href="porosite.php" class="nav_link"> <i class="fas fa-shopping-bag"></i> <span class="nav_name">Shiko Porosite</span> </a>

                    <a href="Produktet.php" class="nav_link active"> <i class="fas fa-shopping-cart"></i> <span class="nav_name">Produktet</span> </a>

                    <a href="perdoruesit.php" class="nav_link"> <i class="fas fa-user"></i><span class="nav_name">Përdoruesit</span> </a>

                    <a href="vrejtjet.php" class="nav_link"> <i class="fas fa-sticky-note"></i><span class="nav_name">Vërejtjet</span> </a>
                </div>
                <a href="logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Çkyçu</span> </a>

            </nav>
        </div>
        <br>
        <br>
        <h3 style="margin:auto;width:100%;text-align:center;">FORMA PËR SHTIMIN E PRODUKTIT</h3>
        <br>
        <div class="forma">
            <!-- Display the success or error message -->
            <?php if (!empty($message)) { ?>
                <p><strong><?php echo $message; ?></strong></p>
            <?php } ?>

            <!-- The rest of your form remains unchanged -->
            <form method="post" action="">
                <div class="split">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Emri</label>
                        <input type="text" class="form-control" name="Emri" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Emri">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Lloji</label>
                        <input type="text" name="Lloji" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Lloji">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Çmimi</label>
                        <input type="text" name="Cmimi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Çmimi">
                    </div>
                </div>
                <div class="split">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Foto</label>
                        <input type="text" name="Foto" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Foto">
                    </div>
                    <span>Kategoria</span><br>
                    <select id="inputChoice" name="inputChoice">
                        <option></option>
                        <?php
                        $produktet = $crud->Read('kategoria_produkteve');
                        foreach ($produktet as $produkti) {
                        ?>
                            <option value="<?php echo $produkti['Emri']; ?>">
                                <?php echo $produkti['Emri']; ?>
                            </option>
                        <?php } ?>
                    </select>
                    <br>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Përshkrimi</label>
                        <input type="text" name="Pershkrimi" class="form-control" id="exampleInputPassword1" placeholder="Përshkrimi">
                    </div>
                    <button type="submit" name="submiti" id="butoni" class="btn btn-danger">Shto</button>
                </div>
            </form>
        </div>
    </div>


</body>

</html>


<script>
    document.addEventListener("DOMContentLoaded", function(event) {

        const showNavbar = (toggleId, navId, bodyId, headerId) => {
            const toggle = document.getElementById(toggleId),
                nav = document.getElementById(navId),
                bodypd = document.getElementById(bodyId),
                headerpd = document.getElementById(headerId)

            if (toggle && nav && bodypd && headerpd) {
                toggle.addEventListener('click', () => {
                    nav.classList.toggle('show')
                    toggle.classList.toggle('bx-x')
                    bodypd.classList.toggle('body-pd')
                    headerpd.classList.toggle('body-pd')
                })
            }
        }

        showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

        const linkColor = document.querySelectorAll('.nav_link')

        function colorLink() {
            if (linkColor) {
                linkColor.forEach(l => l.classList.remove('active'))
                this.classList.add('active')
            }
        }
        linkColor.forEach(l => l.addEventListener('click', colorLink))

    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js
"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js
"></script>