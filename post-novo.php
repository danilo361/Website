<?php
session_start();
if (!isset($_SESSION['perfil'])) {
    header('Location: index.php?erro=0');
    exit;
}
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
    <link rel="stylesheet" href="assets/css/menu.css">
    <link rel="stylesheet" href="assets/css/formulario.css">
    <link rel="stylesheet" href="assets/css/form-login.css">
    <link rel="stylesheet" href="assets/css/admin.css">


    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />

    <title>Fanáticos pelo Internacional</title>
</head>

<body>
    <header></header>

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
            <div id="divAlinha">

                <?php
                if (isset($_GET['erro'])) {
                    if ($_GET['erro'] == 1) echo '<p class="msg-erro">O Titulo ou a autoria ou o texto não foram informados</p>';
                }
                ?>
                <br>
                <div id="divalinha">
                    <form name="form-novo" id="form" class="formpage" method="post" action="app/controllers/posts.php">

                        <h1 id="h1" >Nova postagem</h1>
                        <p id="mensagem-alerta"> </p>
                        <input type="text" class="intextarea" placeholder="Titulo" required="required" name="titulo" />
                        <label for="titulo" class="lable-inferior">Título</label>

                        <input type="text" name="autor" class="intextarea" placeholder="Nome do autor" required="required" />
                        <label for="autor" class="lable-inferior">Autor:</label>

                        <input type="date" name="data" class="intextarea" value="<?= $dataQuebrada[0]; ?>" />
                        <label for="data" class="label-inferior">&nbsp&nbsp Data</label>

                        <input type="time" name="hora" class="intextarea" value=" <?= $dataQuebrada[1]; ?>" />
                        <label for="hora" class="label-inferior">&nbsp&nbsp Hora</label>
                        <br>
                        <textarea name="texto" placeholder="                      Nova postagem" required="required"></textarea>
                        <br><br>
                        <input type="hidden" name="op" value="salvar">
                        <input type="submit" class="enviar" value="Salvar" />

                    </form>
                    <br><br>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <h6>Todos direitos reservados @ Fanáticos pelo Internacional</h6>
    </footer>
    <script src="assets/javascript/form-login.js"></script>
    <script src="assets/javascript/alerta.js"></script>
</body>

</html>