<!doctype html>
<html lang="it">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Vyon — Login</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Dosis:wght@300;400;700;800&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="/pages/login/css/login.css" />
  </head>

  <body class="vyon">
    <div class="bg" aria-hidden="true"></div>

    <main class="wrap">
      <section class="card" aria-labelledby="title">
        <div class="brand">
          <span class="brand__mark" aria-hidden="true"></span>
          <span class="brand__name">Vyon</span>
        </div>

        <h1 id="title">Accedi</h1>
        <p class="sub">Rientra nella tua orbita.</p>

        <?php if (isset($_GET['error'])): ?>
        <div class="error" role="alert">
          <?= htmlspecialchars($_GET['error']) ?>
        </div>
        <?php endif; ?>


        <?php if (isset($_GET['success'])): ?>
        <div class="success" role="alert">
          <?= htmlspecialchars($_GET['success']) ?>
        </div>
        <?php endif; ?>

        <form class="form" action="/api/login" method="post">
          <div class="field">
            <label for="username">Username</label>
            <div class="input">
              <span class="ico" aria-hidden="true">◎</span>
              <input
                id="username"
                name="username"
                type="text"
                autocomplete="username"
                placeholder="es. vyon_user"
                required
              />
            </div>
          </div>

          <div class="field">
            <label for="password">Password</label>
            <div class="input">
              <span class="ico" aria-hidden="true">⟡</span>
              <input
                id="password"
                name="password"
                type="password"
                autocomplete="current-password"
                placeholder="••••••••"
                required
              />
            </div>

            <div class="row">
              <a class="link soft" href="/forgot-password">Password dimenticata?</a>
            </div>
          </div>

          <button class="btn primary" type="submit">Entra su Vyon</button>

          <div class="alt">
            <a class="link" href="/login-email">Accedi con email</a>
          </div>

          <p class="register">
            Non hai un account?
            <a class="link accent" href="/register">Registrazione</a>
          </p>
        </form>
      </section>
    </main>
  </body>
</html>
