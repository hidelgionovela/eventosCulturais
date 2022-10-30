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
<div>
  <button class="out"><a href="dashbord.php">Voltar</a></button>
</div>
    <div class="title">
      Criar Novo User
    </div>
    <form action="../Controller/userController.php" method="POST">
    <div class="form">
       <div class="inputfield">
          <label>Email</label>
          <input type="email" name="email" class="input">
       </div>  
        <div class="inputfield">
          <label>Senha</label>
          <input type="Password" name="senha" class="input">
       </div>  
       <div class="inputfield">
          <label>Perfil</label>
          <input type="text" name="perfil" class="input">
       </div>  
      
      <div class="inputfield">
        <input type="submit" value="Cadastrar" class="btn">
      </div>
    </div>
    </form>
</div>	
	
</body>
</html>