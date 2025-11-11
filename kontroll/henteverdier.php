<?php

require_once __DIR__ . '/config.php';   // merk require_once

// IKKE funksjon db() her lenger – den ligger i config.php


$stmt = db()->query("SELECT * FROM users");


$sql = "SELECT id, name, email FROM users";
$stmt = db()->query($sql);     // query() brukes når du ikke har input fra bruker
$users = $stmt->fetchAll();    // hent alle rader

foreach ($users as $user) {
    echo "ID: " . $user['id'] . " – " . htmlspecialchars($user['name']) . " (" . $user['email'] . ")<br>";
}


require 'config.php';

$email = 'ola@example.com'; // du kan hente dette fra $_GET eller $_POST

$sql = "SELECT id, name, email FROM users WHERE email = :email";
$stmt = db()->prepare($sql);
$stmt->execute(['email' => $email]);

$user = $stmt->fetch(); // henter én rad

if ($user) {
    echo "Fant bruker: " . htmlspecialchars($user['name']);
} else {
    echo "Ingen bruker funnet.";
}


require 'config.php';

$author = 'Kari Nordmann';

$sql = "
    SELECT posts.title, posts.content, posts.created_at
    FROM posts
    JOIN users ON posts.user_id = users.id
    WHERE users.name = :author
    ORDER BY posts.created_at DESC
";
$stmt = db()->prepare($sql);
$stmt->execute(['author' => $author]);
$posts = $stmt->fetchAll();

if ($posts) {
    foreach ($posts as $p) {
        echo "<h3>" . htmlspecialchars($p['title']) . "</h3>";
        echo "<p>" . nl2br(htmlspecialchars($p['content'])) . "</p>";
        echo "<hr>";
    }
} else {
    echo "Ingen innlegg funnet for $author.";
}

$stmt = db()->query("SELECT COUNT(*) FROM users");
$antall = $stmt->fetchColumn();

echo "Antall brukere: $antall";

$stmt = db()->query("SELECT id, name FROM users");
while ($row = $stmt->fetch()) {
    echo $row['id'] . ': ' . htmlspecialchars($row['name']) . '<br>';
}

?>