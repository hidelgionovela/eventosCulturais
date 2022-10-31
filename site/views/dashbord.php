<?php
session_start();
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashbord</title>
    <link rel="stylesheet" href="../css/styledashbord.css" />
  </head>
  <body>
    <div class="container">
      <div class="navbar">
        <div class="menu">
          <div class="lg1">
            <h3 class="logo">Teatro<span>Gungu</span></h3></div>
            <!-- <img src="../img/download.jpg"  style="width: 60px;" alt=""> -->
          
          <div class="hamburger-menu">
            <div class="bar"></div>
          </div>
        </div>
      </div>

      <div class="main-container">
        <div class="main">
          <header>
            <div class="overlay">
              <div class="inner">
              <img src="../img/download.jpg"  style="width: 80px;" alt="">
                <h2 class="title">Companhia de Teatro Gungu</h2>
                <p>
                É uma companhia de teatro profissional de Maputo, Moçambique fundada em 1992 por Gilberto Mendes.
                </p>
                <button class="btn"><a href="../index.php">Sair</a></button>
              </div>
            </div>
          </header>
        </div>

        <div class="shadow one"></div>
        <div class="shadow two"></div>
      </div>

      <div class="links">
        <ul>
          <li>
            <a href="dashbord.php" style="--i: 0.05s;">Home</a>
          </li>
          <li>
            <a href="eventos.php" style="--i: 0.1s;">Eventos</a>
          </li>
          <li>
            <a href="cadastroUser.php" style="--i: 0.15s;">Cadastrar User</a>
          </li>
          <li>
            <a href="cadastro.php" style="--i: 0.15s;">Cadastrar Eventos</a>
          </li>
        </ul>
      </div>
    </div>

    <script src="../js/appdashbord.js"></script>
  </body>
</html>
