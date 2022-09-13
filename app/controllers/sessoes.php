<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');


//$_REQUEST pega dados de $_GET e de $_POST
if(!isset($_REQUEST['op'])){ //bloqueia acesso a requisicao na pagina sem operacao
    header('Location: ../../index.php');
    exit;
}


$operacao = filter_var($_REQUEST['op'], FILTER_SANITIZE_SPECIAL_CHARS);


switch($operacao){
    case 'login':
        login();
        break;
    case 'logout':
        logout();
        break;
}




function login(){
    if(empty($_POST['email']) || empty($_POST['senha'])){
        header('Location: ../../index.php?erro=1');
        exit;
    }
    $email = filter_var($_POST['email']);
    $senha = filter_var($_POST['senha']);
    
    if($senha == 1234){
        session_regenerate_id();
        $_SESSION['perfil'] = 0;
        $_SESSION['nome'] = 'Fulano(a)';
        $_SESSION['email'] = $email;
        header('Location: ../../admin-post.php');
        return true;
    }
    header('Location: ../../index.php?erro=3');
   
}



function logout(){
    session_destroy();
    header('Location: ../../index.php?erro=2');
    return true;

}
