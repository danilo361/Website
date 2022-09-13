<?php
session_start();
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
      <h1>Elenco do Clube do povo</h1>

      <div id="divAlinha">
        <img src="assets/img-elenco/elenco1.png" width="937px" height="369px" alt="Imagem dos jogadores Anthoni, Daniel e Emerson Junior.">
        <img src="assets/img-elenco/elenco2.png" width="937px" height="369px" alt="Imagem dos jogadores Keiller, Bruno Méndez e Gabriel Mercado.">
        <img src="assets/img-elenco/elenco3.png" width="937px" height="369px" alt="Imagem dos jogadores Kaique Rocha, Rodrigo Moledo e Tiago Barbosa.">
        <img src="assets/img-elenco/elenco4.png" width="937px" height="369px" alt="Imagem dos jogadores Victor Cuesta, Fabricio Bustos e Heitor .">
        <img src="assets/img-elenco/elenco5.png" width="937px" height="369px" alt="Imagem dos jogadores Mazeti, Moisés, Paulo Victor.">
        <img src="assets/img-elenco/elenco6.png" width="937px" height="369px" alt="Imagem dos jogadores Thaun Lara, Boschilia e Bruno Gomes">
        <img src="assets/img-elenco/elenco7.png" width="937px" height="369px" alt="Imagem dos jogadores D'Alessandro, Edenilson e Gabriel.">
        <img src="assets/img-elenco/elenco8.png" width="937px" height="369px" alt="Imagem dos jogadores Jhonny, Liziero e Lucas Ramos.">
        <img src="assets/img-elenco/elenco9.png" width="937px" height="369px" alt="Imagem dos jogadores Mauricio, Matheus Dias e Rodrigo Lindoso.">
        <img src="assets/img-elenco/elenco10.png" width="937px" height="369px" alt="Imagem dos jogadores Rodrigo Dourado, Caio Vidal e David.">
        <img src="assets/img-elenco/elenco11.png" width="937px" height="369px" alt="Imagem dos jogadores Gustavo Maia, Matheus Cadorini e Nicolas.">
        <img src="assets/img-elenco/elenco12.png" width="937px" height="369px" alt="Imagem dos jogadores Palacios, Taison, Wesley Morais.">
        <img src="assets/img-elenco/elenco13.png" width="937px" height="369px" alt="Imagem dos jogadores Alexander Medina, Fernando Machado e Jadson vieira.">

      </div>
    </main>

    <footer>
      <h6>Todos direitos reservados @ Fanáticos pelo Internacional</h6>
    </footer>
  </div>
  <script src="assets/javascript/form-login.js"></script>
  <script src="assets/javascript/alerta.js"></script>
</body>

</html>