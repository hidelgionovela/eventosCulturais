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
	<link rel="stylesheet" href="../css/stylescadastro.css">
</head>
<body>


<div class="wrapper">

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
      <button class="btn2"><a href="dashbord.php">Voltar</a></button>
        <input type="submit" value="Cadastrar" class="btn">
      </div>
    </div>
    </form>
</div>	
	
</body>
</html>