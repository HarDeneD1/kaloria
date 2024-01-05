<!DOCTYPE html>
<html lang="hu">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Kalóriaszámláló</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <?php
    include_once 'db.php';
    session_start();

    if (isset($_SESSION['user'])) {
      // Bejelentkezve vagyunk, megjelenítjük az üdvözlő üzenetet és a kijelentkezés linket
      echo "<a class='navbar-brand' id='udvUzenet'>Üdv " . $_SESSION['user'] . "</a>";
      echo "<a class='navbar-brand' href='logout.php' id='logout'>Kijelentkezés</a>";
    } else {
      // Nincs bejelentkezve, megjelenítjük a bejelentkezési és regisztrációs linkeket
      echo "<a class='navbar-brand' href='login.html'>Bejelentkezés</a>";
      echo "<a class='navbar-brand' href='regisztracio.html'>Regisztráció</a>";
    }
    ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Kezdőlap</a>
        </li>
        <li class="nav-item " >
          <a class="nav-link" href="hozzaad.php">Étel hozzáadása</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="statisztikahtml.php">Statisztikák</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-12">
        <h1>Kezdőlap</h1>
        <p><h2>Üdvözöllek az oldalon!</h2>Válassz a fenti menüpontok közül a navigációhoz. <br>Az ételek hozzáadásához bejelentkezés szükséges</p>
                <p><a href="https://github.com/HarDeneD1/kaloria.git"><h3>GitHub elérhetősége</h3></a></p>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
