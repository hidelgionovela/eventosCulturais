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


function countRow($sql, $dados = []) {
    global $db;

    $stmt = $db->prepare($sql);
    $stmt->execute($dados);

    return $stmt->rowCount();
}




function buscarutilizador($nr)
    {
        
        $res = array();
        global $db;
        $cmd = $db->prepare("SELECT promotor FROM evento WHERE codigo = :codigo");
        $cmd->bindValue(":codigo", $nr);
        $cmd->execute();
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
        for ($i = 0; $i < count($res); $i++) {
            foreach ($res[$i] as $k => $v) {
                    $id = $v;
            }
        }

        return $id;
       
}