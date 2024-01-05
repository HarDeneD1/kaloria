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
    session_start();

    if (isset($_SESSION['user'])) {
      echo "<a class='navbar-brand' id='udvUzenet'>Üdv " . $_SESSION['user'] . "</a>";
      echo "<a class='navbar-brand' href='logout.php' id='logout'>Kijelentkezés</a>";
    } else {
      echo "<a class='navbar-brand' href='login.html'>Bejelentkezés</a>";
      echo "<a class='navbar-brand' href='regisztracio.html'>Regisztráció</a>";
    }
    ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Kezdőlap</a>
        </li>
        <li class="nav-item active" >
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
      <div class="col-lg-6">
        <h1>Étel hozzáad</h1>
          <div class="container mt-5">
            <div class="row">
              <div class="col-md-6 offset-md-3">
                <h2>Kalória Bevitel</h2>
                <form id="kaloriaForm">
                  <div class="form-group">
                    <label for="nap">Válassz egy napot:</label>
                    <select class="form-control" id="nap" required>
                      <option value="hétfő">Hétfő</option>
                      <option value="kedd">Kedd</option>
                      <option value="szerda">Szerda</option>
                      <option value="csütörtök">Csütörtök</option>
                      <option value="péntek">Péntek</option>
                      <option value="szombat">Szombat</option>
                      <option value="vasárnap">Vasárnap</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="nev">Étel neve:</label>
                    <input type="text" class="form-control" id="nev" placeholder="Pl.: Csirkepörkölt" required>
                  </div>
                  <div class="form-group">
                    <label for="kaloria">Kalória mennyiség:</label>
                    <input type="number" class="form-control" id="kaloria" placeholder="Pl.: 350" required>
                  </div>
                  <button type="submit" class="btn btn-primary" id="mentes">Mentés</button>
                </form>
              </div>
            </div>
          </div>

          <script src="input.js"></script>
          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>