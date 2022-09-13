<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');


// var_dump($_POST);

$nomeDestinatario = filter_var($_POST['nome'], FILTER_SANITIZE_SPECIAL_CHARS);
$emailDestinatario = filter_var($_POST['email'], 
                FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
$mensagem = filter_var($_POST['mensagem'], FILTER_SANITIZE_SPECIAL_CHARS);

enviarEmailRecepcao($nomeDestinatario, $emailDestinatario, $mensagem);

// enviarEmailRecepcao($_POST['nome'], ...)

function enviarEmailRecepcao($nomeDestinatario, $emailDestinatario, $mensagem){
    //logica para disparo de e-mails
}
