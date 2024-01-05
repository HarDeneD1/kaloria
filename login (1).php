<?php
session_start();

require_once('db.php'); 

function kapcsolodas($serverName, $username, $password, $dbname)
{
    $host = $GLOBALS['host'];
    $port = $GLOBALS['port'];
    $dbname = $GLOBALS['dbname'];
    $username = $GLOBALS['username'];
    $password = $GLOBALS['password'];

    $kapcsolati_szoveg = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
    $pdo = new PDO($kapcsolati_szoveg, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
}

$kapcsolat = kapcsolodas($host, $username, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = ['success' => false];
    if (isset($_POST['usernameInput']) && isset($_POST['passwordInput'])) {
        $username = $_POST['usernameInput'];
        $password = $_POST['passwordInput'];

        $stmt = $kapcsolat->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $username;
            $result['success'] = true;
        }
    }
    echo json_encode($result);
}
?>
