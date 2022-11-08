<?php
session_start();
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>cadastro Admin</title>
  <link rel="icon" type="image/png" sizes="16x16" href="../img/download.jpg">
  <link rel="stylesheet" href="../css/stylescadastro.css">
  <link rel="stylesheet" href="../css/menu.css">
</head>

<body>

  <div class="header__nav">
    <img src="../img/download.jpg" style="width: 60px; border-radius:5%; float: left; margin-left:10px; margin-top:5px;" alt="logo">
    <h2 style="float: left">Cadastrar Usuario</h2>
    <nav class="header__menu mobile-menu">
      <ul>
        <li class="active"><a href="dashbord.php">Home</a></li>
        <li><a href="cadastro.php">Criar Evento</a></li>
        <li><a href="eventos.php">Ver Eventos</a></li>
      </ul>
    </nav>
  </div>


  <div class="wrapper" style="margin-top: 120px;">

    <div class="title">
      Criar Novo User
    </div>
    <form action="../Controller/userController.php" method="POST">
      <div class="form">
        <div class="inputfield">
          <label>Email</label>
          <input type="email" name="email" class="input" placeholder="email@exemplo.com">
        </div>
        <div class="inputfield">
          <label>Senha</label>
          <input type="Password" name="senha" class="input" placeholder="****">
        </div>
        <div class="inputfield">
          <label>Perfil</label>
          <input type="text" name="perfil" class="input" placeholder="admin">
        </div>
        <div class="inputfield">
          <label>Perfil</label>
          <input type="text" name="perfil" class="input" placeholder="admin">
        </div>

        <div class="inputfield">
          <!-- <button class="btn2"><a href="dashbord.php">Voltar</a></button> -->
          <input type="submit" value="Cadastrar" class="btn">
        </div>
      </div>
    </form>
  </div>

</body>

</html>