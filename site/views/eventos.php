<?php
session_start();
ob_start();

// if (!isset($_SESSION['id'], $_SESSION['nome'])) {
//     $_SESSION['msg'] = "É necessário iniciar a sessão! ";
//     header("Location: index.php");
    
//   }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap.min.css">
    <title>Posts Cadastrados</title>
</head>

<body>
    <label style="margin:1%;" type="button" class="btn btn-secondary"><a href="CriarPost.php" style="color:aliceblue; text-decoration:none">criar novo Post</a></label><br>
    <label style="margin:1%;" type="button" class="btn btn-danger"><a href="sair.php" style="color:aliceblue; text-decoration:none">Logout</a></label><br>

    <center>
        <h1>Bem vindo : <?php echo $_SESSION['nome'] . " #"?>!</h1>
        <h3>Perfil <?php echo $_SESSION['perfil']; ?>!</h3>
   <?php  
   include __DIR__ . '/conf/DB.php'; 
   $h = read("SELECT COUNT(*) FROM post;");  
    foreach ($h as $k) {
        echo "<h2>". "Ultimos Posts:  ". "Total #" . $k['COUNT(*)'] . "</h2>";
    }
    ?>
    </center>

    <?php
    $dados = read("Select * from post ORDER BY id DESC");
    ?>
    <hr>
    <?php foreach ($dados as $a) {  ?>

        <div style="margin-bottom:20px; padding: 20px; border-bottom: 1px solid lightgray; display: block; text-align: justify;">

            <h3 style="color:brown"><?php echo "Post: #"; ?> <?php echo $a['titulo']; ?></h3>

            <p>
            <h3>
                Post de: <span style="color: red"><?php echo buscarutilizador($a['utilizador']); ?></span>
            </h3><br>

            <label>
                Titulo: <span style="color: blue"><?php echo $a['titulo']; ?></span>
            </label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label>
                Categoria: <span style="color: blue"><?php echo $a['categoria']; ?></span>
            </label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label>
                Tags: <span style="color: blue"><?php echo $a['tags']; ?></span>
            </label><br>
            <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
            <label>
                Texto: <span style="color: blue"><?php echo $a['texto']; ?></span>
            </label><br>
            <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
            <label>
                Data: <span style="color: blue"><?php echo $a['data']; ?></span>
            </label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


            </p>


            <p style="text-align: right;">

                <!-- <label style="color: green"><a href="./ver.php?id=<?php echo $a['id']; ?>">Ver</a></label>
		 		&nbsp;&nbsp;&nbsp;&nbsp; -->

                <label type="button" class="btn btn-primary">
                    <a href="criarcomentario.php?id=<?php echo $a['id']; ?>" style="color:aliceblue; text-decoration:none">Comentar</a></label>
                &nbsp;&nbsp;&nbsp;&nbsp;

                <label type="button" class="btn btn-secondary">
                    <a href="Vercomentario.php?id=<?php echo $a['id']; ?>" style="text-align: right; color:aliceblue; text-decoration:none">Ver comentarios</a></label>
                &nbsp;&nbsp;&nbsp;&nbsp;


            </p>



        </div>
    <?php } ?>

    <!-- <a href="index1.php" style="text-align: right">Voltar</a> -->
</body>

</html>