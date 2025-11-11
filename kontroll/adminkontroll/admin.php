<?php
// admin.php
declare(strict_types=1);

// --- SIKRERE SESSIONS ---
session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'domain' => '',
    'secure' => isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on',
    'httponly' => true,
    'samesite' => 'Lax',
]);
session_start();

// --- GODKJENTE BRUKERE ---
$allowed = [
    'sebastiata@uia.no',
    'robinfo@uia.no',
    'kristineho@uia.no'
];

// --- ADMIN-PASSORD (FELLES) ---
// PRODNIVÅ: sett miljøvariabel ADMIN_PASSWORD_HASH til password_hash(...) verdien.
// Fallback hvis miljøvariabel ikke finnes (BYTT DENNE!):
$envHash = getenv('ADMIN_PASSWORD_HASH') ?: '';
const FALLBACK_ADMIN_PASSWORD_HASH = '$2y$10$REPLACE_ME_WITH_YOUR_OWN_HASH___________________________';

// Den faktiske hash vi bruker
$ADMIN_PASSWORD_HASH = $envHash !== '' ? $envHash : FALLBACK_ADMIN_PASSWORD_HASH;




// --- UTLØS LOGGUTT ---
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

$error = "";
$logged_in = isset($_SESSION['admin_email']);

// --- SJEKK INNLOGGING ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Litt enkel anti-bruteforce venting
    usleep(200000); // 200 ms

    $email = strtolower(trim($_POST['email'] ?? ''));
    $password = $_POST['password'] ?? '';

    if ($email === '' || $password === '') {
        $error = "Vennligst fyll inn både e-post og passord.";
    } elseif (!in_array($email, $allowed, true)) {
        $error = "Innlogging feilet: e-posten er ikke godkjent.";
    } elseif (!password_verify($password, $ADMIN_PASSWORD_HASH)) {
        $error = "Innlogging feilet: passordet er feil.";
    } else {
        // OK: e-post er godkjent og passordet stemmer
        session_regenerate_id(true);
        $_SESSION['admin_email'] = $email;
        $logged_in = true;
    }
}
?>
<!doctype html>
<html lang="no">
<head>
    <meta charset="utf-8">
    <title>Admininnlogging</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body { font-family: Arial, sans-serif; margin:0; background:#f8f8f8; }
        header, footer { background:#a91f1f; color:#fff; padding:15px 20px; }
        header h2 { display:inline-block; margin:0; }
        .logout { float:right; background:#fff; color:#a91f1f; border:1px solid #a91f1f; border-radius:6px; padding:6px 12px; cursor:pointer; }
        .logout:hover { background:#a91f1f; color:#fff; }
        .container { max-width:700px; margin:80px auto; background:#fff; border-radius:10px; box-shadow:0 0 10px rgba(0,0,0,.1); padding:30px; }
        h1,h2,h3 { color:#a91f1f; margin-top:0; }
        label { font-weight:bold; }
        input { width:100%; padding:10px; margin:8px 0 16px 0; border:1px solid #ccc; border-radius:6px; }
        button { background:#a91f1f; color:#fff; padding:10px 20px; border:none; border-radius:6px; cursor:pointer; }
        button:hover { background:#8c1a1a; }
        .error { background:#ffd8d8; border:1px solid #a91f1f; padding:10px; color:#a91f1f; border-radius:6px; margin-bottom:20px; }
        footer { text-align:center; margin-top:50px; font-size:.9em; }
        .muted { color:#666; font-size:.9em; }
        .grid { display:grid; grid-template-columns: 1fr; gap:12px; }
        @media (min-width: 480px) {
            .grid-2 { grid-template-columns: 1fr 1fr; gap:16px; }
        }
    </style>
</head>
<body>

<header>
    <h2>Adminområde</h2>
    <?php if ($logged_in): ?>
        <a href="?logout"><button class="logout">Logg ut</button></a>
    <?php endif; ?>
</header>

<?php if (!$logged_in): ?>
    <div class="container">
        <h3>Innlogging</h3>

        <?php if ($error): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="post" autocomplete="current-password">
            <label for="email">E-post (må være godkjent)</label>
            <input
                type="email"
                id="email"
                name="email"
                placeholder="navn@uia.no"
                required
                inputmode="email"
            >

            <label for="password">Admin-passord</label>
            <input
                type="password"
                id="password"
                name="password"
                placeholder="••••••"
                minlength="8"
                required
                autocomplete="current-password"
            >

            <button type="submit">Logg inn</button>
            
        </form>
    </div>

<?php else: ?>
    <div class="container">
        <h3>Velkommen, <?= htmlspecialchars($_SESSION['admin_email']) ?></h3>
        <p>Du er nå innlogget som administrator.</p>

        <hr>

        <h4>Hva skjer videre?</h4>
        <ul>
            <li>Legge til / redigere stillingsannonser</li>
            <li>Se og filtrere innsendte søknader</li>
            <li>Eksport til CSV / PDF</li>
            <li>Tilgangsstyring og logger</li>
        </ul>
    </div>
        <div class="grid grid-2">
            <button disabled>Legg til stilling (kommer snart)</button>
            <button disabled>Se søknadsdatabase (kommer snart)</button>
        </div>

        
<?php endif; 
?>

<footer>
    <p>Universitetet i Agder &copy; <?= date("Y") ?></p>
</footer>

</body>
</html>



