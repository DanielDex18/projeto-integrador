<?php

if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['id_funcionarios'])){
    die("Você não pode acessar esta página porque não está logado. <p> <a href=\"/ProjetoIntegrador/Login.php\">Entrar</a> </p>");
}

?>