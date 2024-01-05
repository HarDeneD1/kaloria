<?php
$caesarSettings = _CS::load_caesar_settings();
$host = $caesarSettings->getMysqlHost();
$port = $caesarSettings->getMysqlPort();
$dbname = $caesarSettings->getMysqlDatabase();
$username = $caesarSettings->getMysqlUser();
$password = $caesarSettings->getMysqlPswd();

try {
    $kapcsolat = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4", $username, $password);
    // Hibaüzenetek bekapcsolása fejlesztés során
    $kapcsolat->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Hiba az adatbázishoz való kapcsolódás során: " . $e->getMessage());
}
?>
