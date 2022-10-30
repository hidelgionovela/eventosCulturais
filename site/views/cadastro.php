<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>cadastro</title>
	<link rel="stylesheet" href="../css/stylescadastro.css">
</head>
<body>

<div class="wrapper">
<div>
  <button class="out"><a href="dashbord.php">Voltar</a></button>
</div>
    <div class="title">
      Criar Evento
    </div>
    <form action="../Controller/eventosController.php" method="POST">
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
          <input type="file" class="input" name="cartaz">
       </div>
      <div class="inputfield">
        <input type="submit" value="Cadastrar" class="btn">
      </div>
    </div>
    </form>
</div>	
	
</body>
</html>