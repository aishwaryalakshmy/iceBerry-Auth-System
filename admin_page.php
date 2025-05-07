<?php
session_start();
echo "<h1>Welcome Admin, " . htmlspecialchars($_SESSION['name']) . "</h1>";
?>
