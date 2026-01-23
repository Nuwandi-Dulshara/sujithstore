<?php
$path = __DIR__ . '/../database/database.sqlite';
$pdo = new PDO('sqlite:' . $path);
$pdo->exec('DELETE FROM sessions');
echo "sessions cleared\n";
