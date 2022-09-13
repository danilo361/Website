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
  <link rel="stylesheet" href="assets/css/style.css">
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

  <div id="container">
    <header>
      <div class="divmsg">
        <?php
        if (isset($_GET['erro'])) {
          if ($_GET['erro'] == 3) echo '<p class="msg-erro" id="p">Email ou senha incorreto(a)!</p>';
        }
        ?>
      </div>
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
        <article article id="post1">

          <img src="assets/img/bustos.jpg" class="img-noticia" alt="Imagem do jogador Bustos." width="400" height="370">

        </article>
        <h2>Anúncio de Bustos</h2>
        <article id="conf-article">
          <p>

            Com as más atuações de Heitor na lateral direita, o Internacional demorou,
            mas conseguiu fechar com Fabricio Bustos, um dos melhores laterais do futebol
            argentino e que já esteve na mira de clubes como Palmeiras e Flamengo em outros momentos.
            Ex-jogador do Independiente, o atleta foi contratado por três temporadas e acabou sendo
            apresentado na tarde desta quinta-feira (17).
          </p>
          <p>Segundo o jogador, outras equipes o procuraram, mas o Colorado foi, entre as opções,
            aquele que fez a proposta mais interessante aos olhos do jogador.
            “Vários clubes me procuraram pela situação contratual na Argentina.
            A proposta do Inter foi a que mais gostei. É um clube grande. Foi a melhor opção pra mim”.</p>
          <p>Quanto a sua forma física, Bustos deixou claro que depende apenas dos trâmites e da regularização
            do clube para fazer sua estreia. “Estou muito feliz. Já vinha treinando no Independiente.
            Estou à disposição do treinador. Temos uma grande partida no domingo para enfrentar, e depois
            pensaremos no clássico. Esperamos que eu possa estar habilitado para o domingo (contra o São José)”.</p>
          <p>Por fim, o lateral disse que pensa em voltar a ser convocado para a seleção da Argentina através de suas
            boas atuações com a camisa colorada. “Tenho muita expectativa com a minha chegada aqui, até mesmo voltar
            à seleção. Quero estar à altura deste clube”. O ala tem quatro partidas disputadas pela Argentina, todas em 2018.
          <p>
          <h5> <time datetime="2021-07-07 12:00">Noticiado dia 07/07/2021</time></h5>
          </p>
          <br>

        </article>

      </section>
      <?php
      function alerta($mensagem)
      {
        echo 'funcaoalerta();';
      }
      ?>
    </main>
    <footer class="indexfooter">
      <h6>Todos direitos reservados @ Fanáticos pelo Internacional</h6>
    </footer>
  </div>
  <script src="assets/javascript/form-login.js"></script>
  <script src="assets/javascript/alerta.js"></script>

</body>

</html>