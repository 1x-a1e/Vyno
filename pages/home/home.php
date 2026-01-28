<?php

  session_start();

  if (!isset($_SESSION["username"])) {
    header("Location: /login");
    exit();
  }

?>

<!doctype html>
<html lang="it">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Vyon — Home</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300;400;700;800&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="/pages/home/css/home.css">
</head>

<body class="vyon">
  <div class="bg" aria-hidden="true"></div>

  <!-- TOP BAR -->
  <header class="topbar">
    <div class="brand">
      <span class="brand__mark"></span>
      <span class="brand__name">Vyon</span>
    </div>

    <nav class="topbar__actions">
      <a href="/chat" class="icon" title="Chat">💬</a>
      <a href="/profile" class="avatar" title="Profilo">A</a>
    </nav>
  </header>

  <!-- STORIES -->
  <section class="stories" aria-label="Storie">
    <div class="story you">Tu</div>
    <div class="story">Luca</div>
    <div class="story">Sara</div>
    <div class="story">Alex</div>
    <div class="story">Marta</div>
  </section>

  <!-- MAIN LAYOUT -->
  <main class="layout">

    <!-- FEED -->
    <section class="feed">

      <article class="post">
        <header class="post__head">
          <div class="avatar">L</div>
          <div>
            <strong>luca_dev</strong>
            <span>• 2h fa</span>
          </div>
        </header>
        <p class="post__text">
          🚀 Primo post su Vyon!  
          Questo social ha vibes spaziali.
        </p>
        <footer class="post__actions">
          <button>❤️ 12</button>
          <button>💬 3</button>
          <button>↗️</button>
        </footer>
      </article>

      <article class="post">
        <header class="post__head">
          <div class="avatar">S</div>
          <div>
            <strong>sara.codes</strong>
            <span>• 4h fa</span>
          </div>
        </header>
        <p class="post__text">
          ✨ UI pulita, zero rumore.  
          Vyon promette molto bene.
        </p>
        <footer class="post__actions">
          <button>❤️ 24</button>
          <button>💬 6</button>
          <button>↗️</button>
        </footer>
      </article>

      <article class="post">
        <header class="post__head">
          <div class="avatar">A</div>
          <div>
            <strong>alex_space</strong>
            <span>• 6h fa</span>
          </div>
        </header>
        <p class="post__text">
          🌌 Finalmente un social che non ti sovraccarica.
        </p>
        <footer class="post__actions">
          <button>❤️ 31</button>
          <button>💬 9</button>
          <button>↗️</button>
        </footer>
      </article>

      <article class="post">
        <header class="post__head">
          <div class="avatar">M</div>
          <div>
            <strong>marta.ui</strong>
            <span>• ieri</span>
          </div>
        </header>
        <p class="post__text">
          🎨 Font, colori e spazio: design super centrato.
        </p>
        <footer class="post__actions">
          <button>❤️ 18</button>
          <button>💬 2</button>
          <button>↗️</button>
        </footer>
      </article>

      <article class="post">
        <header class="post__head">
          <div class="avatar">G</div>
          <div>
            <strong>galaxy.dev</strong>
            <span>• 2 giorni fa</span>
          </div>
        </header>
        <p class="post__text">
          🔧 Sarebbe figo aggiungere post con immagini 👀
        </p>
        <footer class="post__actions">
          <button>❤️ 42</button>
          <button>💬 14</button>
          <button>↗️</button>
        </footer>
      </article>

    </section>

    <!-- SIDEBAR PROFILO -->
    <aside class="sidebar">
      <div class="profile-card">
        <div class="avatar big">A</div>
        <strong>alex_space</strong>
        <span>@alex_space</span>

        <div class="profile-actions">
          <a href="/profile">Profilo</a>
          <a href="/settings">Impostazioni</a>
        </div>
      </div>
    </aside>

  </main>
</body>
</html>
