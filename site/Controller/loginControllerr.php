<?php
session_start();


// include __DIR__ . '../../config/conexao.php'; 
include __DIR__ . '../../config/crud.php';


$dadoss = filter_input_array(INPUT_POST, FILTER_DEFAULT);
var_dump($dadoss);

if ($dadoss['email'] == "") {
    # code...
    echo "Campo email vazio";
    $_SESSION['loginError'] = "O campo email vazio, presisa ser preenchido";
    header("Location: ../index.php");
    die();
}

if ($dadoss['senha'] == "") {
    # code...
    echo "Campo password vazio";
    $_SESSION['loginError'] = "O campo password vazio, presisa ser preenchido";
    header("Location: ../index.php");
    die();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $senha = $_POST['senha'];
    $data = [
        'email' => $_POST['email']
    ];

    echo "$ ";

    //consulta para verificar se o user existe na bd e retornar 1 ou mais caso existe
    $sql = "SELECT * FROM utilizador WHERE email = :email";
    $usuarioExiste = countRow($sql, $data);
    if ($usuarioExiste > 0) {
        //pega os dados do usuario existente
        $dados = readOne($sql, $data);

        //senha vinda da bd
        echo "$ ";

        $senhaUser = $dados['senha'];
        // var_dump($senhaUser);
        // var_dump($senha);

        // verifica se a senha da Db e igual inserida e retorna a senha caso verdade
        // retorna null caso senhas incompativeis

        if ($senha === $senhaUser) {
            # code...
            $senhaVerificada = $senhaUser;
            echo "ola Mundo";
            // die();
        } else {
            # code...
            $senhaVerificada = null;
            echo "null";
        }

        //se retornar null da senha significa senhas diferentes
        // retornar para login com messagem de senhas erradas
        if ($senhaVerificada != null) {
            // chegou aqui porque a senha inserida e igual da base dados
            // verificar se existe um usuario com nome, senha e estado activo na base dados
            $sql = "SELECT * FROM utilizador WHERE email = :email AND senha = :senha";
            $data = [
                'email' => $_POST['email'],
                'senha' => $senhaUser
            ];

            // se retornar um 1 significa que existe um user activo com 
            // um determinado perfil 
            $contaVerificada = countRow($sql, $data);
            if ($contaVerificada == 1) {

                // pegar os dados desse usuario para poder redirecionar no lugar certo
                $dados = readOne($sql, $data);
                
            } else {
        
    $_SESSION['loginError'] = "Email ou Password incorrectos!";
    header("Location: ../index.php");
    die();
            }

            var_dump($dados['perfil']);
            if ($dados['perfil'] == 'Admin' || $dados['perfil'] == 'admin') {
                //caso o perfil seja admin
                $_SESSION['user_id'] = $dados['codigo'];
                $_SESSION['user_permission'] = $dados['perfil'];
                header("location:../views/dashbord.php");
                echo "ola Maputo";
                die();
            } else {
                
                $_SESSION['loginError'] = "Area restrita! Perfil invalido!!";
         header("Location: ../index.php");
             die();
            }
        } else {
            $_SESSION['loginError'] = "Email ou Password incorrectos!";
    header("Location: ../index.php");
    die();
        }
    } else {
        $_SESSION['loginError'] = "Email ou Password incorrectos!";
    header("Location: ../index.php");
    die();
    }
}
