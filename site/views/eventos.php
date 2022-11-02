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
    <link rel="stylesheet" href="../css/styleeventos.css">
    <title>Proximos Eventos</title>
</head>

<body class="container" >
    <!-- <label style="margin:1%;" type="button" class="btn btn-secondary"><a href="CriarPost.php" style="color:aliceblue; text-decoration:none">criar novo Post</a></label><br>
    <label style="margin:1%;" type="button" class="btn btn-danger"><a href="sair.php" style="color:aliceblue; text-decoration:none">Logout</a></label><br> -->
    <div class="divCentral">
    <center>
        <h1>Lista de Eventos <?php //echo $_SESSION['nome'] . " #"
                                ?>!</h1>

        <?php
        include __DIR__ . '../../config/crud.php';


        $h = read("SELECT COUNT(*) FROM evento;");
        foreach ($h as $k) {
            echo "<h2>" . "Total de Eventos Criados:  " . "#" . $k['COUNT(*)'] . "</h2>";
        }
        ?>
    </center>

    <?php
    $dados = read("Select * from evento ORDER BY codigo DESC");
    ?>
    <hr>
    <?php foreach ($dados as $a) {  ?>

        <div  style="margin-bottom:20px; padding: 20px; border-bottom: 1px solid lightgray; display: block; text-align: justify;">

            <h3 style="color:brown"><?php echo "Nome do Evento: #"; ?> <?php echo $a['nome']; ?></h3><br>

           
            <!-- <h3>
                Promotor do evento: <span style="color: red"><?php echo ($a['promotor']); ?></span>
            </h3><br> -->
            <div class="row">
            <div class="col-lg-4 col-sm-6">
                <img src="../Controller/uploads/<?php echo $a['cartaz'] ?>" style="width: 100%;" alt="cartaz">
            </div>

            <div class="col-lg-8 col-sm-6 texto">
                <label>
                    Nome do Evento: <span style="color: blue"><?php echo $a['nome']; ?></span>
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    Promotor do Evento: <span style="color: blue"><?php echo $a['nome']; ?></span>
                </label><br>
                <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                <label>
                    Hora de Inicio: <span style="color: blue"><?php echo $a['hora_inicio']; ?></span>
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
                <label>
                    Hora de Fim: <span style="color: blue"><?php echo $a['hora_fim']; ?></span>
                </label>
                <br>
                <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                <label>
                    Data do Evento: <span style="color: blue"><?php echo $a['data_evento']; ?></span>
                </label><br>
                <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                <label>
                    Preco do Bilhete: <span style="color: blue"><?php echo $a['valor_evento']; ?>MT</span>
                </label><br>
                <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                <label>
                    Numero de bilhetes: <span style="color: blue"><?php echo $a['numero_bilhete']; ?></span>
                </label><br>
                <label>
                    Local: <span style="color: blue"><?php echo $a['local_evento']; ?></span>
                </label>
                
                <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                </div>
            </div>

         


            <p style="text-align: right;">

                <!-- <label style="color: green"><a href="./ver.php?id=<?php //echo $a['id']; 
                                                                        ?>">Ver</a></label>
		 		&nbsp;&nbsp;&nbsp;&nbsp; -->

                <label type="button" class="btn btn-dark">
                    <a href="EditarEvento.php?id=<?php echo $a['codigo']; ?>" style="color:aliceblue; text-decoration:none">Editar evento</a></label>
                &nbsp;&nbsp;&nbsp;&nbsp;

                <label type="button" class="btn btn-warning">
                    <a href="bilhetes.php?id=<?php echo $a['codigo']; ?>" style="text-align: right; color:aliceblue; text-decoration:none">Ver bilhetes</a></label>
                &nbsp;&nbsp;&nbsp;&nbsp;


            </p>



        </div>
    <?php } ?>
    </div>

    <!-- <a href="index1.php" style="text-align: right">Voltar</a> -->
</body>

</html>