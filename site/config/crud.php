<?php

include __DIR__ . '/conexao.php'; 

function create($sql = "", $dados = []) :int {
    global $db;

    $stmt  = $db->prepare($sql);

    $stmt->execute($dados);

    return $stmt->rowCount();
}


function read($sql = '', $dados = []) :array {
    global $db;

    $stmt  = $db->prepare($sql);

    $stmt->execute($dados);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function readOne($sql = '', $dados = [])  {
    global $db;

    $stmt  = $db->prepare($sql);

    $stmt->execute($dados);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}



function update($sql = '', $dados = []) :int {
    global $db;

    $stmt  = $db->prepare($sql);

    $stmt->execute($dados);

    return $stmt->rowCount();
}



function delete($sql = '', $dados = []) :int {
    global $db;

    $stmt  = $db->prepare($sql);

    $stmt->execute($dados);

    return $stmt->rowCount();
}



function buscaridCli($nr)
    {
        
        $res = array();
        global $db;
        $cmd = $db->prepare("SELECT id FROM utilizador WHERE nome = :nr");
        $cmd->bindValue(":nr", $nr);
        $cmd->execute();
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
        for ($i = 0; $i < count($res); $i++) {
            foreach ($res[$i] as $k => $v) {
                    $id = $v;
            }
        }

        return $id;
       
}

function buscarutilizador($nr)
    {
        
        $res = array();
        global $db;
        $cmd = $db->prepare("SELECT nome FROM utilizador WHERE id = :nr");
        $cmd->bindValue(":nr", $nr);
        $cmd->execute();
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
        for ($i = 0; $i < count($res); $i++) {
            foreach ($res[$i] as $k => $v) {
                    $id = $v;
            }
        }

        return $id;
       
}



function buscaCliente()
{

    $res = array();
    global $db;
    $cmd = $db->prepare("SELECT id,nome FROM utilizador");
    $cmd->execute();
    $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
    return $res;
}


function buscaridpost($nr)
    {
        
        $res = array();
        global $db;
        $cmd = $db->prepare("SELECT id FROM post WHERE nome = :nr");
        $cmd->bindValue(":nr", $nr);
        $cmd->execute();
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
        for ($i = 0; $i < count($res); $i++) {
            foreach ($res[$i] as $k => $v) {
                    $id = $v;
            }
        }

        return $id;
       
}



function buscartitulopost($nr)
    {
        
        $res = array();
        global $db;
        $cmd = $db->prepare("SELECT titulo FROM post WHERE id = :nr");
        $cmd->bindValue(":nr", $nr);
        $cmd->execute();
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
        for ($i = 0; $i < count($res); $i++) {
            foreach ($res[$i] as $k => $v) {
                    $id = $v;
            }
        }

        return $id;
       
}

function buscarComentador($nr)
    {
        
        $res = array();
        global $db;
        $cmd = $db->prepare("SELECT u.nome FROM comentarios c INNER JOIN utilizador u on c.utilizador = u.id  WHERE c.id = :nr");
        $cmd->bindValue(":nr", $nr);
        $cmd->execute();
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
        for ($i = 0; $i < count($res); $i++) {
            foreach ($res[$i] as $k => $v) {
                    $id = $v;
            }
        }

        return $id;
       
}

function buscarComentarioPost($nr)
    {
        
        $res = array();
        global $db;
        $cmd = $db->prepare("SELECT post FROM comentarios WHERE id = :nr");
        $cmd->bindValue(":nr", $nr);
        $cmd->execute();
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
        for ($i = 0; $i < count($res); $i++) {
            foreach ($res[$i] as $k => $v) {
                    $id = $v;
            }
        }

        return $id;
       
}



