<?php
session_start();
ob_start();
// if (condition) {
//         # code...
// }
unset($_SESSION['user_id'], $_SESSION['user_permission']);
$_SESSION['msg'] = "Seccao Terminada com sucesso";

header("Location: ../index.php");