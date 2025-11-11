<?php
require_once __DIR__ . '/config.php';

// Hent verdier fra skjemaet
$navn     = $_POST['navn']     ?? '';
$epost    = $_POST['epost']    ?? '';
$stilling = $_POST['stilling'] ?? '';
$soeknad  = $_POST['soeknad']  ?? '';

// Håndter filopplasting (CV)
$cvFilnavn = null;
if (!empty($_FILES['cv']['name'])) {
    $opplastMappe = __DIR__ . '/../uploads/';
    if (!is_dir($opplastMappe)) {
        mkdir($opplastMappe, 0777, true);
    }

    $cvFilnavn = time() . '_' . basename($_FILES['cv']['name']);
    move_uploaded_file($_FILES['cv']['tmp_name'], $opplastMappe . $cvFilnavn);
}

// Lagre data i databasen
$sql = "INSERT INTO eksamen (name, email, position, application_text, cv_filename)
        VALUES (:name, :email, :position, :application_text, :cv_filename)";
$stmt = db()->prepare($sql);
$stmt->execute([
    'name'             => $navn,
    'email'            => $epost,
    'position'         => $stilling,
    'application_text' => $soeknad,
    'cv_filename'      => $cvFilnavn
]);

// Hvis du vil være 100% sikker på at vi kommer hit, kan du teste:
// die('Kom til lagre_soknad.php rett før redirect');

// Send brukeren videre til takk-siden i /visning


header('Location: ../visning/takk.php');
exit;
