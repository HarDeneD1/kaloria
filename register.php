<?php
session_start();

require_once('db.php'); 

function kapcsolodas($serverName, $username, $password, $databaseName)
{
    $kapcsolati_szoveg = "mysql:host=$serverName;dbname=$databaseName;charset=utf8mb4";
    $pdo = new PDO($kapcsolati_szoveg, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
}

require_once('db.php');
$kapcsolat = kapcsolodas($host, $username, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = ['success' => false];
    if (isset($_POST['usernameInput']) && isset($_POST['passwordInput'])) {
        $username = $_POST['usernameInput'];
        $password = $_POST['passwordInput'];

        // Ellenőrizze, hogy a felhasználónév még nem foglalt
        $stmt = $kapcsolat->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$existingUser) {
            // Regisztráció hozzáadása a users táblához
            $stmt = $kapcsolat->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->execute([$username, password_hash($password, PASSWORD_DEFAULT)]);

            $result['success'] = true;
        } else {
            $result['error'] = 'A felhasználónév már foglalt.';
        }
    } else {
        $result['error'] = 'Hiányzó adatok';
    }
    echo json_encode($result);
}
?>
