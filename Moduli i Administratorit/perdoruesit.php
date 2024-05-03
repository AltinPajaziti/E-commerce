<?php
include('Controll.php');

include('crud.php');



if (isset($_POST['fshi'])) {
    $id_to_delete = $_POST['fshi'];

    $crud->Delete('shporta', ['kolona' => 'ID_Perdoruesi', 'value' => $id_to_delete]);
    $crud->Delete('perdoruesi', ['kolona' => 'ID_Perdoruesi', 'value' => $id_to_delete]);
    header('Location: perdoruesit.php');
    exit();
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perdoruesit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css
">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css
">
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
    </style>
</head>

<body>
    <script>
        function showConfirmation() {
            alert('Me fshirjen e këtij përdoruesi, fshihen edhe porosite e tij');
        }
    </script>


    <body id="body-pd">


        <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <a href="home.php" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Administratori</span> </a>
                <div class="nav_list">
                    <a href="porosite.php" class="nav_link"> <i class="fas fa-shopping-bag"></i> <span class="nav_name">Shiko Porosite</span> </a>

                    <a href="Produktet.php" class="nav_link"> <i class="fas fa-shopping-cart"></i> <span class="nav_name">Produktet</span> </a>

                    <a href="perdoruesit.php" class="nav_link active"> <i class="fas fa-user"></i><span class="nav_name">Përdoruesit</span> </a>

                    <a href="vrejtjet.php" class="nav_link"> <i class="fas fa-sticky-note"></i><span class="nav_name">Vërejtjet</span> </a>
                </div>
                <a href="logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Çkyçu</span> </a>

            </nav>
        </div>


<br>
            <h1 class="h3 mb-2 text-gray-800">PËRDORUESIT</h1>
            <p class="mb-4">Paraqitja e përdouresit me të dhëna.</p>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary" style="color:#20525C !important;">Të Dhënat e Përdoureseve</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>

                                <tr>
                                    <th>Email</th>
                                    <th>Emri</th>
                                    <th>Mbiemri</th>
                                    <th>Adresa</th>
                                    <th>Fjalëkalimi</th>
                                    <th>Fshi</th>
                                    <th>Modifiko</th>



                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $sql = 'SELECT * FROM perdoruesi';
                                $stmt = mysqli_query($lidhe, $sql);

                                while ($row = mysqli_fetch_array($stmt)) {
                                    echo '<tr>';

                                    echo '<td>' . $row['Email'] . '</td>';
                                    echo '<td>' . $row['Emri'] . '</td>';
                                    echo '<td>' . $row['Mbiemri'] . '</td>';
                                    echo '<td>' . $row['Adresa'] . '</td>';
                                    echo '<td>' . $row['passwordi'] . '</td>';

                                    echo '<td>
    <form action="perdoruesit.php" method="post" onsubmit="showConfirmation()">
        <input type="hidden" name="fshi" value="' . $row['ID_Perdoruesi'] . '">
        <button type="submit"  id="butoni" class="btn btn-danger">Fshi</button>
    </form>
  </td>';
                                    echo "<td>
  <a href='modifiko_perdorues.php?ID_Perdoruesi={$row['ID_Perdoruesi']}' class='btn btn-primary'>Modifiko</a>
</td>";

                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        

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



    </body>

</html>