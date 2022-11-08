<?php
session_start();
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>cadastro</title>
   <link rel="icon" type="image/png" sizes="16x16" href="../img/download.jpg">
   <link rel="stylesheet" href="../css/stylescadastro.css">
   <link rel="stylesheet" href="../css/menu.css">
</head>

<body>

   <div class="header__nav">
      <img src="../img/download.jpg" style="width: 60px; border-radius:5%; float: left; margin-left:10px; margin-top:5px;" alt="logo">
      <h2 style="float: left">Cadastrar Eventos</h2>
      <nav class="header__menu mobile-menu">
         <ul>
            <li class="active"><a href="dashbord.php">Home</a></li>
            <li><a href="cadastroUser.php">Criar User</a></li>
            <li><a href="eventos.php">Ver Eventos</a></li>
         </ul>
      </nav>
   </div>

   <div class="wrapper">

      <div class="title">
         Criar Evento
      </div>
      <form action="../Controller/eventosController.php" method="POST" enctype="multipart/form-data">
         <div class="form">
            <div class="inputfield">
               <label>Nome do Evento</label>
               <input type="text" class="input" name="nome">
            </div>
            <div class="inputfield">
               <label>Data</label>
               <input type="date" class="input" name="data_evento">
            </div>
            <div class="inputfield">
               <label>Hora de Inicio</label>
               <input type="time" class="input" name="hora_inicio">
            </div>
            <div class="inputfield">
               <label>Hora do fim</label>
               <input type="time" class="input" name="hora_fim">
            </div>
            <div class="inputfield">
               <label>Local</label>
               <input type="text" class="input" name="local_evento">
            </div>
            <div class="inputfield">
               <label>Promotor</label>
               <input type="text" class="input" name="promotor">
            </div>

            <div class="inputfield">
               <label>Número de bilhetes</label>
               <input type="number" class="input" name="numero_bilhete">
            </div>
            <div class="inputfield">
               <label>Preço</label>
               <input type="text" class="input" name="valor_evento">
            </div>
            <div class="inputfield">
               <label>Cartaz do Evento</label>
               <input type="file" class="input" name="cartaz" value="cartaz">
            </div>

            <center>
               <p style="color: red;">
                  <?php
                  if (isset($_SESSION['imgErrorr'])) {
                     $a = $_SESSION['imgError'];
                     $b = $_SESSION['imgErrorr'];
                     echo "$a";
                     echo "<br>";
                     echo "$b";
                     unset($_SESSION['imgError']);
                     unset($_SESSION['imgErrorr']);
                  }
                  ?>
               </p>
            </center><br>

            <div class="inputfield">
               <!-- <button class="btn2"><a href="dashbord.php">Voltar</a></button> -->
               <input type="submit" value="Criar" class="btn">
            </div>
         </div>
      </form>
   </div>

</body>

</html>