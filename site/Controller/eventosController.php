<?php

  session_start();
  ob_start();

  include __DIR__ . '../../config/crud.php';
  include __DIR__ . '../../Model/Evento.php';


  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $evento = new Evento();
    
    $evento->setNome($_POST['nome']);
    $evento->setDataEvento($_POST['data_evento']) ;
    $evento->setHoraInicio($_POST['hora_inicio']) ;
    $evento->setHoraFim($_POST['hora_fim']) ;
    $evento->setLocalEvento($_POST['local_evento']) ;
    $evento->setPromotor($_POST['promotor']) ;
    $evento->setNumeroBilhete($_POST['numero_bilhete']) ;
    $evento->setValorEvento($_POST['valor_evento']) ;
    $evento->setAdmin_id($_SESSION['user_id']) ;
    $evento->setDescricao($_POST['descricao']) ;

    $target_dir = "../../webapp/img/";
    $target_file = $target_dir . basename($_FILES["cartaz"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $temporario = $_FILES['cartaz']['tmp_name'];
    $extensao = pathinfo($_FILES["cartaz"]["name"], PATHINFO_EXTENSION);
    $novoNome = uniqid() . ".$extensao";
    $evento->setCartaz($novoNome) ;

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
      $check = getimagesize($_FILES["cartaz"]["tmp_name"]);
      if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["cartaz"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $_SESSION['imgError'] = "Sorry, your file is too large.!";
      $uploadOk = 0;
    }

    // Allow certain file formats
    if (
      $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif"
    ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $_SESSION['imgError'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed..!";
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
      $_SESSION['imgErrorr'] = "Sorry, your file was not uploaded.!";
      header("Location: ../views/cadastro.php");
      die();
      // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($temporario, $target_dir . $novoNome)) {
        echo "The file " . htmlspecialchars(basename($_FILES["cartaz"]["name"])) . " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
        die();
      }
    }


    $sql = "INSERT INTO evento (nome,hora_inicio,hora_fim,data_evento,numero_bilhete,local_evento,promotor,cartaz,valor_evento,admin_id,descricao) 
    VALUES (:nome,:hora_inicio,:hora_fim,:data_evento,:numero_bilhete,:local_evento,:promotor,:cartaz,:valor_evento,:admin_id,:descricao)";
    $dados = [
      'nome' => $evento->getNome(),
      'hora_inicio' => $evento->getHoraInicio(),
      'hora_fim' => $evento->getHorafim(),
      'data_evento' => $evento->getDataEvento(),
      'numero_bilhete' => $evento->getNumeroBilhete(),
      'local_evento' => $evento->getLocalEvento(),
      'promotor' => $evento->getPromotor(),
      'cartaz' => $evento->getCartaz(),
      'valor_evento' => $evento->getValorEvento(),
      'admin_id' => $evento->getAdmin_id(),
      'descricao' => $evento->getDescricao()
    ];


    if (!isset($_SESSION['imgErrorr'])) {
      $_SESSION['evento'] = "Evento Criado com Sucesso";

      create($sql, $dados);
      header('Location:../views/eventos.php');
    }
}
