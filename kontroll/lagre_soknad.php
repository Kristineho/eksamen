<?php
require_once __DIR__ . '/../config.php';

// Hent verdier fra skjema
$navn = $_POST['navn'] ?? '';
$epost = $_POST['epost'] ?? '';
$stilling = $_POST['stilling'] ?? '';
$soeknad = $_POST['soeknad'] ?? '';

// Håndter filopplasting
$cvFilnavn = null;
if (!empty($_FILES['cv']['name'])) {
    $opplastMappe = __DIR__ . '/../uploads/';
    if (!is_dir($opplastMappe)) mkdir($opplastMappe, 0777, true);

    $cvFilnavn = time() . '_' . basename($_FILES['cv']['name']);
    move_uploaded_file($_FILES['cv']['tmp_name'], $opplastMappe . $cvFilnavn);
}

// Lagre i databasen
$sql = "INSERT INTO eksamen (name, email, position, application_text, cv_filename)
        VALUES (:name, :email, :position, :application_text, :cv_filename)";
$stmt = db()->prepare($sql);
$stmt->execute([
    'name' => $navn,
    'email' => $epost,
    'position' => $stilling,
    'application_text' => $soeknad,
    'cv_filename' => $cvFilnavn
]);

header('Location: /eksamen/kontroll/henteverdier.php');
exit;
