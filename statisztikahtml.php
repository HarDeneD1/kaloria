<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kalóriaszámláló Statisztika</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
                <li class="nav-item">
                    <a class="nav-link" href="hozzaad.php">Étel hozzáadása</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="statisztikahtml.php">Statisztikák</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6">
                <h1>Statisztikák</h1>
                <?php
                include_once 'db.php';
                $days = ["Hétfő", "Kedd", "Szerda", "Csütörtök", "Péntek", "Szombat", "Vasárnap"];
                ?>
                <div class="form-group">
                    <label for="selectedDay">Válassz egy napot:</label>
                    <select class="form-control" id="selectedDay" onchange="loadStatistics()">
                        <?php foreach ($days as $day) : ?>
                            <option value="<?= $day ?>"><?= $day ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div id="statisticsContent">
                    <p>Válassz egy napot a statisztikák megjelenítéséhez.</p>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script>
        function loadStatistics() {
            var selectedDay = document.getElementById("selectedDay").value;
            var contentDiv = document.getElementById("statisticsContent");

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    contentDiv.innerHTML = xhr.responseText;
                }
            };
            xhr.open("GET", "statisztika.php?day=" + selectedDay, true);
          
            xhr.send();
          function loadStatistics() {
    var selectedDay = document.getElementById("selectedDay").value;
    var contentDiv = document.getElementById("statisticsContent");
}

loadStatistics();

        }
      

        loadStatistics();
    </script>
</body>

</html>
