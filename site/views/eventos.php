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
    <link rel="stylesheet" href="../assets/bootstrap.min.css">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/download.jpg">
    <link rel="stylesheet" href="../css/styleeventos.css">
    <link rel="stylesheet" href="../css/menu.css">
    <title>Proximos Eventos</title>
</head>


<body class="container">
    <?php
    include __DIR__ . '../../config/crud.php';
    ?>

    <div class="header__nav" >
        <img src="../img/download.jpg" style="width: 70px; border-radius:5%; float: left; margin-left:10px; margin-top:5px;" alt="logo">
        <h3 style="float: left">Lista de Eventos</h3>
        <nav class="header__menu mobile-menu" style="padding: 18px 0 27px;">
            <ul>
                <li class="active"><a href="dashbord.php">Home</a></li>
                <li><a href="cadastroUser.php">Criar User</a></li>
                <li><a href="cadastro.php">Criar Evento</a></li>
            </ul>
        </nav>
    </div>
    <div>
        <div class="divCentral">
            <center>
                <?php
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
            <center>
                <p style="color: green;">
                    <?php
                    if (isset($_SESSION['evento'])) {
                        $a = $_SESSION['evento'];
                        echo "$a";
                        unset($_SESSION['evento']);
                    }
                    ?>
                </p>
            </center>
            <?php foreach ($dados as $a) {  ?>

                <div style="margin-bottom:20px; padding: 20px; border-bottom: 1px solid lightgray; display: block; text-align: justify;">
                    <div>
                        <!--  style="width:50%; box-shadow: inset 0px 0px 2px rgb(58, 48, 3); padding:3px;"> -->
                        <h4>
                            <?php echo "Nome do Evento: #"; ?> <?php echo $a['nome']; ?>
                        </h4>
                    </div>
                    <br>

                    <div class="row hidel">
                        <div class="col-lg-4 col-sm-6">
                            <label for="">Cartaz</label>
                            <img src="../../webapp/img/<?php echo $a['cartaz']; ?>" style="width: 100%; padding: 7px;" alt="cartaz">
                            <?php //echo $a['cartaz']; 
                            ?>
                        </div>

                        <div class="col-lg-8 col-sm-6 texto">
                            <div style="padding: 15px;">
                                <label>
                                    Nome do Evento: <span><?php echo $a['nome']; ?></span>
                                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label>
                                    Promotor do Evento: <span><?php echo $a['promotor']; ?></span>
                                </label><br>
                                <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                                <label>
                                    Hora de Inicio: <span><?php echo $a['hora_inicio']; ?></span>
                                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                <label>
                                    Hora de Fim: <span><?php echo $a['hora_fim']; ?></span>
                                </label>
                                <br>
                                <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                                <label>
                                    Data do Evento: <span><?php echo $a['data_evento']; ?></span>
                                </label><br>
                                <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                                <label>
                                    Preco do Bilhete: <span><?php echo $a['valor_evento']; ?>MT</span>
                                </label><br>
                                <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                                <label>
                                    Numero de bilhetes: <span><?php echo $a['numero_bilhete']; ?></span>
                                </label><br>
                                <label>
                                    Local: <span><?php echo $a['local_evento']; ?></span>
                                </label>

                                <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->

                            </div>
                        </div>
                        <p style="text-align: right; padding-bottom: 1px;">


                            <a href="EditarEvento.php?id=<?php echo $a['codigo']; ?>" style="color:aliceblue; text-decoration:none">Editar evento</a></label>
                            &nbsp;&nbsp;&nbsp;&nbsp;

                            <label type="button" class="btn btn-warning">
                                <a href="bilhetes.php?id=<?php echo $a['codigo']; ?>" style="text-align: right; color:aliceblue; text-decoration:none">Ver bilhetes</a></label>
                            &nbsp;&nbsp;&nbsp;&nbsp;


                        </p>
                    </div>








                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>