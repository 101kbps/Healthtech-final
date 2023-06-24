<!-- Caso a pessoa aperte para voltar depois de fazer o login-->
<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id'])) {
    die("<div class='text-center'>Você não pode acessar esta página porque não está logado!<p><a href=\"login.php\">Entrar</a></p></div>");
}

?>