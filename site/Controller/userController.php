<?php

 include __DIR__ . '../../config/conexao.php'; 
 include __DIR__ . '../../config/crud.php'; 

    
    $email = '';  
    $senha = ''; 
    $perfil = ''; 
    
    


 if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $perfil = $_POST['perfil'];



    $sql = "INSERT INTO utilizador (email, senha, perfil) VALUES (:email, :senha, :perfil)";
    $dados = [
            'email' => $email,
            'senha' => $senha,
            'perfil' => $perfil,

    ];


    create($sql, $dados);
    header('Location:../views/dashbord.php');
}
    ?>