<?php
session_start();
if(!isset($_SESSION['perfil'])){
     	header('Location: index.php?erro=0');
    	exit;
     }
require_once('app/entities/Post.php');

$post = new Post();
$noticias = $post->listar();

?>
<!DOCTYPE html>
<html lang="pr-br">

<head>
    <meta charset="UTF-8">
    <meta property="og:url" content="index.html">
    <meta property="og:url" content="article">
    <meta property="og:title" content="Notícias do Internacional">
    <meta property="og:description" content="O portal de notícias dos colorados">
    <meta name="keywords" content="notícias, Clube internacional, S.C.Internacional">
    <meta property="og:image" content="assets\img\Escudo_do_Sport_Club_Internacional.svg">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="512x512" href="assets/favicon/favicon.ico">
    <link rel="icon" type="image/png" sizes="512x512" href="assets/favicon/android-chrome-512x512.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/favicon/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">

    <link rel="stylesheet" href="assets/css/paginasSecundarias.css">
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="stylesheet" href="assets/css/menu.css">
    <link rel="stylesheet" href="assets/css/form-login.css">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />
    <title>Fanáticos pelo Internacional</title>
</head>

<body>
    <div class="wrapper">
        <header>
        </header>
        <main>
            <div class='navmenu'>
                <nav id="menu">
                    <ul>
                        <li id="li"><a href="index.php">Home</a></li>
                        <li id="li"><a href="elenco.php">Elenco</a></li>
                        <li id="li"><a href="loja.php">Loja</a></li>
                        <li id="li"><a href="fale-conosco.php">fale-conosco</a></li>
                        <li id="li"> <?php
                                        if (!isset($_SESSION['perfil'])) { ?>
                        <li id="li">
                            <button class="btn-login" id="btn-login" onclick="toggleLogin()">login</button>
                        </li>
                        <div class="overlay">
                            <div class="login">
                                <div class="header">
                                    <h1>Login</h1>
                                    <i class="fas fa-times" onclick="toggleLogin()"></i>
                                </div>
                                <div class="body">
                                    <form name="form-login" method="post" class="form" action="app/controllers/sessoes.php">
                                        <input type="mail" name="email" size="25" placeholder="E-mail" required />
                                        <input type="password" name="senha" size="25" placeholder="Senha" required />
                                        <div id="divNavlog">
                                            <input type="submit" value="Login" class="btn-login" id="btn-loginform">
                                            <input type="hidden" name="op" value="login">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php
                                        } else { ?>
                        <li id="li"><a href="admin-post.php">Minhas postagens</a></li>
                        <li id="li">
                            <button class="btn-login" id="btn-login" onclick="funcaoalerta();">logout</button>
                        </li>

                    <?php   } ?>

                    </li>
                    </ul>
                </nav>
            </div>
            <section>
                <div id="divalinha">
                    <br><br>

                    <div class="navmenu">
                        <nav id="li">
                            <ul>
                                <div class="alinhaTitulo"></div>
                                <li id="li" > <a href="app/controllers/posts.php?op=novo">Novo Post</a></li>
                            </ul>
                            
                        </nav>
                    </div>
                    <?php
                    if (isset($_GET['erro'])) {
                        if($_GET['erro'] == 1) echo '<p class="msg-erro">ID do post é obrigatório</p>';
                        if($_GET['erro'] == 2) echo '<p class="msg-erro">Campos obrigatórios não informados na edição do post</p>';					
                        if($_GET['erro'] == 4) echo '<p class="msg-sucesso">Postagem salva com sucesso!</p>';
                        if($_GET['erro'] == 5) echo '<p class="msg-erro">Id do Post é inexistente!</p>';
                        if($_GET['erro'] == 6) echo '<p class="msg-sucesso">Postagem excluída com sucesso!</p>';
                        if($_GET['erro'] == 7) echo '<p class="msg-sucesso">Registro salvo/atualizado com sucesso</p>';
                    }
                    ?>
                    
                        <table>
                            <tr>
                                <th>ID</th>
                                <th>Data</th>
                                <th>Titulo</th>
                                <th>Autor</th>
                                <th>Operações</th>
                            </tr>
                            <?php foreach($noticias as $noticia){ ?>
				<tr>
					<td>  <strong> <?=$noticia->getId();?> </strong> </td>
					<td> <strong> <?=$noticia->getData();?></strong> </td>
					<td> <strong> <?=$noticia->getTitulo();?> </strong> </td>
					<td> <strong> <?=$noticia->getAutor();?> </strong> </td>
					<td>
					
                        <a href="app/controllers/posts.php?id=<?=$noticia->getId();?>&op=listar">Ver</a>
						<a href="app/controllers/posts.php?id=<?=$noticia->getId();?>&op=editar">Editar</a>
						<a href="app/controllers/posts.php?id=<?=$noticia->getId();?>&op=excluir">Excluir</a>
					</td>
				</tr>
			<?php } ?>
                        </table>
                    </div>

            </section>
    </div>
    <br><br><br><br><br><br><br><br><br>
    </main>
    <footer>
        <h6>Todos direitos reservados @ Fanáticos pelo Internacional</h6>
    </footer>
    <script src="assets/javascript/form-login.js"></script>
    <script src="assets/javascript/alerta.js"></script>
</body>

</html>