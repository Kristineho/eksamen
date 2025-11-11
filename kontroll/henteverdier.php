

<?php
// visning/henteverdier.php
require_once __DIR__ . '/../config.php';   // OBS: .. for å gå ut av /visning-mappa

$sql = "SELECT * FROM applications ORDER BY created_at DESC";
$stmt = db()->query($sql);
$soknader = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="no">
<head>
  <meta charset="UTF-8">
  <title>Innsendte søknader</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 2rem; }
    .card {
      border: 1px solid #ddd;
      border-radius: 8px;
      padding: 16px;
      margin-bottom: 16px;
    }
  </style>
</head>
<body>
  <h1>Alle innsendte søknader</h1>

  <?php if (empty($soknader)): ?>
    <p>Ingen søknader er sendt inn ennå.</p>
  <?php else: ?>
    <?php foreach ($soknader as $s): ?>
      <div class="card">
        <h3><?= htmlspecialchars($s['position']) ?></h3>
        <p><strong><?= htmlspecialchars($s['name']) ?></strong> (<?= htmlspecialchars($s['email']) ?>)</p>
        <p><?= nl2br(htmlspecialchars($s['application_text'])) ?></p>

        <?php if (!empty($s['cv_filename'])): ?>
          <p>
            <a href="../uploads/<?= htmlspecialchars($s['cv_filename']) ?>" target="_blank">
              Last ned CV
            </a>
          </p>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
</body>
</html>
