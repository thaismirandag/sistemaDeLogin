<?php

if(!isset($_SESSION)) {
    session_start();

}
// Destrói todos os dados registrados em uma sessão
session_destroy();
header("location: index.php" );

?>
