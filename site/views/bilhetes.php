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
    <link rel="icon" type="image/png" sizes="16x16" href="../img/download.jpg">
    <link rel="stylesheet" href="../assets/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styleeventos.css">
    <link rel="stylesheet" href="../css/menu.css">
    <title>Ver Bilhetes</title>
</head>

<body class="container">
    <?php include __DIR__ . '../../config/crud.php';
    $id = $_GET['id'];


    $dados = read("Select * from bilhete INNER JOIN espectador ON espectador.espectador_id = bilhete.espectador_id where bilhete.evento_id = $id;");

    // var_dump($dados);
    ?>
    <div class="header__nav">
        <img src="../img/download.jpg" style="width: 60px; border-radius:5%; float: left; margin-left:10px; margin-top:5px;" alt="logo">
        <h2 style="float: left">Lista de Eventos</h2>
        <nav class="header__menu mobile-menu">
            <ul>
                <li class="active"><a href="dashbord.php">Home</a></li>
                <li><a href="cadastroUser.php">Criar User</a></li>
                <li><a href="cadastro.php">Criar Evento</a></li>
            </ul>
        </nav>
    </div>
    <div class="divCentral">
        <center>
            <h1>Lista venda de Bilhetes</h1>
            <h3>Nome do evento: <?php $dado = read("Select nome from evento where codigo = $id");
                                foreach ($dado as $a) {
                                    echo $a['nome'];
                                }
                                ?></h3>

            <?php $h = read("SELECT COUNT(*) FROM bilhete where bilhete.evento_id = $id;");
            foreach ($h as $k) {
                echo "<h2>" . "Total de Vendas:  " . "#" . $k['COUNT(*)'] . "</h2>";
            }
            ?>
            <!-- <img src="../img/download.jpg" style="width: 80px; border-radius:5%;" alt="logo"> -->
            <hr>
        </center>
        <br><br>


        <table>
            <thead>
                <tr>
                    <th>Espectador</th>
                    <th>Estado bilhete</th>
                    <th>Quantidade</th>
                    <th>Tipo de bilhete</th>
                    <th>Data da compra</th>
                    <th>Numero de telefone</th>
                    <th>Bairro</th>
                </tr>
            </thead>
            <tbody>
                <?php $quant = 0;
                foreach ($dados as $a) {  ?>

                    <tr>
                        <td><?php echo $a['nome']; ?></td>
                        <td><?php echo $a['estado']; ?></td>
                        <td><?php echo $a['quantidade']; ?></td>
                        <td><?php echo $a['tipo_bilhete']; ?></td>
                        <td><?php echo $a['data_compra']; ?></td>
                        <td><?php echo $a['telefone']; ?></td>
                        <td><?php echo $a['bairro']; ?></td>
                    </tr>
                <?php
                    $quant = $quant + $a['quantidade'];
                } ?>
                <tr>
                    <td><strong>Total</strong></td>
                    <td>-</td>
                    <td><?php echo $quant; ?></td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
            </tbody>
        </table>
        <br><br>
        <h5 style="padding: 1%;">admin: </h5>
    </div>
</body>

</html>