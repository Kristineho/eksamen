<?php
// Databasekonfig
$host    = 'localhost';
$db      = 'eksamen';      // bytt til databasen din
$user    = 'root';
$pass    = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try 
{
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die('Database-feil: ' . $e->getMessage());
}

// DB-funksjonen skal bare stå ÉN gang i hele prosjektet
if (!function_exists('db')) {
    function db(): PDO {
        global $pdo;
        return $pdo;
    }
}
