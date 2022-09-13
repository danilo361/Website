<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once('../entities/Post.php');

//$_REQUEST pega dados de $_GET e de $_POST
if(!isset($_REQUEST['op'])){ //bloqueia acesso a requisicao na pagina sem operacao
    header('Location: ../../admin-post.php');
    exit;
}


$operacao = filter_var($_REQUEST['op'], FILTER_SANITIZE_SPECIAL_CHARS);

if(empty($operacao)) $operacao = 'listar';

switch($operacao){
    case 'editar':
        editar();
        break;
    case 'salvar':
        salvar();
        break;
    case 'excluir':
        excluir($_GET['id']);
        break;
    case 'listar':
        listar();
        break;
    case 'atualizar':
        atualizarPost();
        break;
    case 'novo':
        novaPostagem();
        break;
}

function editar(){

    if(!isset($_REQUEST['id'])){
        header('Location: ../../admin-post.php?erro=1');
        exit;
    }
    $id = filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);
    $post = new Post();
    $postEditar = $post->selecionar($id);
    $titulo = $postEditar->getTitulo();
    $dataCompleta = $postEditar->getData();
    $dataQuebrada = explode(" ", $dataCompleta);
    $autor = $postEditar->getAutor();
    $texto = $postEditar->getTexto();
    require_once('../../post-editar.php');
}

function atualizarPost(){
    // var_dump($_POST);
    // exit;
    if(empty($_POST['titulo']) || empty($_POST['texto']) ){
        header('Location: ../../admin-post.php?erro=2');
        exit;
    }
    $post = new Post();
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $postEditar = $post->selecionar($id);
    $postEditar->setTitulo(filter_var($_POST['titulo'], FILTER_SANITIZE_SPECIAL_CHARS));
    $postEditar->setAutor(filter_var($_POST['autor'], FILTER_SANITIZE_SPECIAL_CHARS));
    $postEditar->setTexto($_POST['texto']);
    $dataCompleta = $_POST['data'] . ' ' . $_POST['hora'];
    $postEditar->setData($dataCompleta);
    if($postEditar->atualizar()){ //atualizou
        
        header('Location: ../../admin-post.php?erro=7');
        return true;
    }
    //nao atualizou
    header('Location: ../../admin-post.php?erro=2');
    return false;
}

function salvar(){

    if(empty($_POST['titulo']) || empty($_POST['autor']) || empty($_POST['texto'])){
        header('Location: ../../post-novo.php?erro=1');
        exit;
    }
    $titulo = filter_var($_POST['titulo'], FILTER_SANITIZE_SPECIAL_CHARS);
    $texto = $_POST['texto'];
    $autor = filter_var($_POST['autor'], FILTER_SANITIZE_SPECIAL_CHARS);
    $post = new Post($titulo, $texto, $autor);
    $post->setData(date('Y-m-d H:i:s'));
    if($post->salvar()){
        header('Location: ../../admin-post.php?erro=4');
        return true; //so para confirmar saida da funcao
    }
    header('Location: ../../admin-post.php?erro=2');
    return false;
}

function excluir($id){
    if(empty($id)){
        header('Location: ../../admin-post.php?erro=1');
        exit;
    }

    $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    $post = new Post();
    $postExistente = $post->selecionar($id);
    if($postExistente){ //existe a postagem pesquisada
        //podemos excluir
        $postExistente->excluir();
        header('Location: ../../admin-post.php?erro=6');
        exit;
    }
    
    //nao existe a postagem:
    header('Location: ../../admin-post.php?erro=5');
    return false;
}

function listar(){
    
    if(!isset($_REQUEST['id'])){
        header('Location: ../../admin-post.php?erro=1');
        exit;
    }
    $id = filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);
    $post = new Post();
    $postEditar = $post->selecionar($id);
    $titulo = $postEditar->getTitulo();
    $dataCompleta = $postEditar->getData();
    $dataQuebrada = explode(" ", $dataCompleta);
    $autor = $postEditar->getAutor();
    $texto = $postEditar->getTexto();
    require_once('../../ver.php');
}


function novaPostagem(){
    header('Location: ../../post-novo.php');
}