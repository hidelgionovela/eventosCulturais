<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Ver Bilhetes</title>
</head>

<body>
    <label style="margin:1%;" type="button" class="btn btn-danger"><a href="verPost.php" style="color:aliceblue; text-decoration:none">Voltar</a></label><br>
    <center>
        <h1>Lista dos bilhetes comprados: <?php //echo $_SESSION['nome'] . " #" . $_SESSION['id']; ?>!</h1>
        <h3>Nome do evento <?php //echo $_SESSION['perfil']; ?>!</h3>
    </center>

    <?php include __DIR__ . '/conf/DB.php'; ?>
    <?php //if ($_SESSION['perfil'] === "admin" || $_SESSION['perfil'] === "administrador" || $_SESSION['perfil'] === "Administrador" || $_SESSION['perfil'] === "Admin") { ?>
        <?php



        $id = $_GET['id'];


        
        $dados = read("Select * from comentarios where post = $id ;");
        ?>
        <center>
            <h2 style="color:brown">Comentarios do post com titulo: <?php echo buscartitulopost($id)  ?> </h2>
        </center>

        <?php foreach ($dados as $a) {  ?>

            <div style="margin-bottom:20px; padding: 20px; border-bottom: 1px solid lightgray; display: block; text-align: justify;">

                <h3 style="color:blueviolet"><?php echo "Comentador: #"; ?> <?php echo buscarutilizador($a['utilizador']); ?></h3>

                <p>
                    <label>
                        Comentario: <span style="color: green"><?php echo $a['comentario']; ?></span>
                    </label><br>

                    <label>
                        Email do comentador: <span style="color: blue"><?php echo $a['email']; ?></span>
                    </label><br>
                    <label>
                        Aprovacao: <span style="color: blue"><?php echo $a['aprovado']; ?></span>
                    </label>


                </p>
                <!-- <p><a href="criarcomentario.php" style="text-align: right">Comentar</a><br>
    <a href="Vercomentario.php" style="text-align: right">ver comentarios</a></p> -->


                <p style="text-align: right;">

                    <?php if ($a['aprovado'] === "sim") { ?>
                        <label type="button" class="btn btn-primary"><a href="responder.php?id=<?php echo $a['id']; ?>" style="color:aliceblue; text-decoration:none">Responder</a></label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <label type="button" class="btn btn-info"><a href="verRespostas.php?id=<?php echo $a['id']; ?>" style="color:aliceblue; text-decoration:none">Ver Respostas</a></label>
                        &nbsp;&nbsp;&nbsp;&nbsp;

                    <?php  }


                    if (($_SESSION['perfil'] === "admin" || $_SESSION['perfil'] === "administrador" || $_SESSION['perfil'] === "Administrador" || $_SESSION['perfil'] === "Admin") && ($a['aprovado'] == "não")) { ?>
                        <label type="button" class="btn btn-success">
                            <?php if ($a['aprovado'] === "nao" || $a['aprovado'] === "não" || $a['aprovado'] === "Não") { ?>
                                <a href="aprovar.php?id=<?php echo $a['id']; ?>" style="color:aliceblue; text-decoration:none">Aprovar</a></label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                    <?php } ?>
                    <label type="button" class="btn btn-danger">
                        <a href="delete.php?id=<?php echo $a['id']; ?>" style="color:aliceblue; text-decoration:none">Apagar Comentario</a></label>
                <?php } ?>



                </p>
            </div>
        <?php }?>
  
    <!-- <a href="criarcomentario.php" style="text-align: right">Voltar</a> -->
</body>

</html>