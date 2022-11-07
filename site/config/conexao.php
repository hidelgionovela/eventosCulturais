<?php 

/**
 * Instancia conexao com Mysql Database
 */

define('DATABASE', 'ujc_teatro');
define('HOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');

try {
    $db = new PDO ('mysql:host='.HOST.'; dbname='.DATABASE, DBUSER, DBPASS);
    
} catch (Exception $e) {
    echo $e->getMessage();
}