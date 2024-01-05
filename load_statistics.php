<?php
include_once 'db.php';

function getDailyStatistics($nap)
{
    global $kapcsolat;

    $lekerdezes = $kapcsolat->prepare("
        SELECT nap,
               COUNT(*) AS osszes_etel,
               AVG(kaloria) AS atlagos_kaloria,
               SUM(kaloria) AS osszeg_kaloria
        FROM etel
        WHERE nap = :nap
        GROUP BY nap
    ");

    $lekerdezes->execute([':nap' => $nap]);
    return $lekerdezes->fetchAll(PDO::FETCH_ASSOC);
}

function getAverageCaloriesPerDay()
{
    global $kapcsolat;

    $lekerdezes = $kapcsolat->prepare("
        SELECT AVG(kaloria) AS atlagos_kaloria
        FROM etel
    ");

    $lekerdezes->execute();
    return $lekerdezes->fetch(PDO::FETCH_ASSOC);
}

function getLegCaloricFood()
{
    global $kapcsolat;

    $lekerdezes = $kapcsolat->prepare("
        SELECT nev, kaloria
        FROM etel
        ORDER BY kaloria DESC
        LIMIT 1
    ");

    $lekerdezes->execute();
    return $lekerdezes->fetch(PDO::FETCH_ASSOC);
}

if (isset($_GET['day'])) {
    $kivnap = $_GET['day'];
    $napistatisztika = getDailyStatistics($kivnap);

    if ($napistatisztika) {
        echo '<p><strong>' . $kivnap . '</strong> statisztikája:</p>';
        echo '<p>Összes étel: ' . $napistatisztika[0]['osszes_etel'] . '</p>';
        echo '<p>Átlagos kalória: ' . $napistatisztika[0]['atlagos_kaloria'] . '</p>';
        echo '<p>Összes kalória: ' . $napistatisztika[0]['osszeg_kaloria'] . '</p>';
    } else {
        echo '<p>Nincs adat a kiválasztott napra.</p>';
    }
} else {
    echo '<p>Nap kiválasztása szükséges.</p>';
}

$averageCaloriesPerDay = getAverageCaloriesPerDay();
echo '<p>Átlagos napi kalória: ' . $averageCaloriesPerDay['atlagos_kaloria'] . '</p>';

$legkaloriadusabb = getLegCaloricFood();
echo '<p>A legkalóriadús étel: ' . $legkaloriadusabb['nev'] . ' (' . $legkaloriadusabb['kaloria'] . ' kalória)</p>';
?>
