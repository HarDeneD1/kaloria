<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('db.php'); 

function kapcsolodas($serverName, $username, $password, $databaseName)
{
    $kapcsolati_szoveg = "mysql:host=$serverName;dbname=$databaseName;charset=utf8mb4";
    $pdo = new PDO($kapcsolati_szoveg, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
}

// Kapcsolódás az adatbázishoz
try {
    $kapcsolat = kapcsolodas($host, $username, $password, $dbname);
} catch (PDOException $e) {
    echo 'Adatbázis kapcsolódási hiba: ' . $e->getMessage();
    exit();
}

$result = ['success' => false];

if (isset($_SESSION['user'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
        if (isset($_POST['nev']) && isset($_POST['kaloria']) && isset($_POST['nap'])) {
            $nev = $_POST['nev'];
            $kaloria = $_POST['kaloria'];
            $nap = $_POST['nap'];

            if (is_numeric($kaloria) && $kaloria >= 0) {
                $stmt = $kapcsolat->prepare("INSERT INTO etel (nev, kaloria, nap) VALUES (?, ?, ?)");
                $stmt->execute([$nev, $kaloria, $nap]);

                $result['success'] = true;
            } else {
                $result['error'] = 'Hibás kalória érték';
            }
        } else {
            $result['error'] = 'Hiányzó adatok';
        }
    } else {
        $result['error'] = 'Érvénytelen kérési típus';
    }
} else {
    $result['error'] = 'Nincs bejelentkezve';
}

echo json_encode($result);
?>
