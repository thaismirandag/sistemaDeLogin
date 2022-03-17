<?php

$mysqli = new mysqli('localhost', 'root', '', 'cadastro');

/* checa a conexão */

if($mysqli == FALSE) {
    echo "Conexão falhou";
    exit();
}