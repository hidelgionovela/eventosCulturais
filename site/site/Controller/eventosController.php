<?php
session_start();

//  include __DIR__ . '../../config/conexao.php'; 
 include __DIR__ . '../../config/crud.php'; 

 $nome = ''; // tex
 $data = ''; // date
 $hora_inicio = ''; //time
 $hora_fim = ''; //time
 $local = ''; //text
 $promotor = ''; //text
 $nr_bilhetes = ''; //number
 $preco = ''; //text
 $arquivo = ''; //text

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    
    $nome = $_POST['nome'];
    $data = $_POST['data_evento'];
    $hora_inicio = $_POST['hora_inicio'];
    $hora_fim = $_POST['hora_fim'];
    $local = $_POST['local_evento'];
    $promotor = $_POST['promotor'];
    $nr_bilhetes = $_POST['numero_bilhete'];
    $preco = $_POST['valor_evento'];
    $arquivo = $_FILES["cartaz"]["name"];
    $a = $_SESSION['user_id'];

var_dump($a);
echo "<hr>";

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["cartaz"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["cartaz"]["tmp_name"]);
      if($check !== false) {
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
      $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
      die();
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["cartaz"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["cartaz"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
        die();
      }
    }
    



$sql = "INSERT INTO evento (nome,hora_inicio,hora_fim,data_evento,numero_bilhete,local_evento,promotor,cartaz,valor_evento,admin_id) 
VALUES (:nome,:hora_inicio,:hora_fim,:data_evento,:numero_bilhete,:local_evento,:promotor,:cartaz,:valor_evento,:admin_id)";
$dados = [
        'nome' => $nome,
        'hora_inicio' => $hora_inicio,
        'hora_fim' => $hora_fim,
        'data_evento' => $data,
        'numero_bilhete' => $nr_bilhetes,
        'local_evento' => $local,
        'promotor' => $promotor,
        'cartaz' => $arquivo,
        'valor_evento' => $preco,
        'admin_id' => $a
        

];


create($sql, $dados);
header('Location:../views/dashbord.php');
    }
    ?>