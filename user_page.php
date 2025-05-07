<?php
session_start();
echo "<h1>Welcome User, " . htmlspecialchars($_SESSION['name']) . "</h1>";
?>
