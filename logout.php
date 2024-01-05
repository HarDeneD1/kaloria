<?php
session_start();

// $_SESSION változók törlése
session_unset();

// Munkamenet és a hozzá kapcsolódó fájlok törlése
session_destroy();

// Sütik törlése
setcookie(session_name(), '', time() - 3600, '/');

// Visszairányítás a bejelentkezési oldalra
header("Location: index.php");
exit();
?>
