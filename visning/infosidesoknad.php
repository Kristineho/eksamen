<!-- visning/infosidesoknad.php  -->
 <!-- endringer gjort for å publisere -->

<!DOCTYPE html>
<html lang="no">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Ledige Stillinger</title>
<style>
  body {
    font-family: 'Segoe UI', sans-serif;
    margin: 0;
    padding: 0;
    background: #fff5f5;
    color: #333;
  }

  header {
    background: linear-gradient(90deg, #b71c1c, #e53935);
    color: white;
    text-align: center;
    padding: 2.5rem 1rem;
    box-shadow: 0 2px 6px rgba(0,0,0,0.2);
  }

  header h1 {
    margin: 0;
    font-size: 2.2rem;
    letter-spacing: 1px;
  }

  .container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 2rem;
    padding: 3rem 1rem;
  }

  .card {
    background: white;
    border-radius: 14px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.12);
    width: 320px;
    padding: 1.5rem;
    transition: transform 0.2s, box-shadow 0.2s;
  }

  .card:hover {
    transform: translateY(-6px);
    box-shadow: 0 6px 18px rgba(0,0,0,0.18);
  }

  .card h2 {
    color: #c62828;
    margin-top: 0;
  }

  .card p {
    color: #555;
    line-height: 1.5;
  }

  .card button {
    background: #e53935;
    border: none;
    color: white;
    padding: 0.6rem 1.2rem;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 500;
    margin-top: 1rem;
    transition: background 0.2s;
  }

  .card button:hover {
    background: #b71c1c;
  }

  footer {
    text-align: center;
    padding: 1.5rem;
    background: #ffe3e3;
    color: #b71c1c;
    font-weight: 500;
  }
</style>
</head>

<body>
  <header>
    <h1>Ledige stillinger</h1>
    <p>Utforsk våre nyeste jobbmuligheter på Universitetet i Agder</p>
  </header>

  <main class="container">
    <div class="card">
      <h2>Innholdsprodusent</h2>
      <p>Er du kreativ og glad i å formidle budskap? Som innholdsprodusent hos oss vil du skape engasjerende innhold til nettsider og sosiale medier.</p>
      <button onclick="location.href='stilling_innhold.php'">Les mer</button> <!-- Her må det komme lenke til stillingsbeskrivelse og selve søknaden! -->
    </div>

    <div class="card">
      <h2>UiA-hjelp</h2>
      <p>UIA-hjelp er en studenttjeneste som tilbyr rask og enkel IT-hjelp. Vi hjelper deg med alt fra innlogging og utskrifter til programvare og tekniske problemer.</p>
      <button onclick="location.href='stilling_uiahjelp.php'">Les mer</button> <!-- Her må det komme lenke til stillingsbeskrivelse og selve søknaden! -->
    </div>

    <div class="card">
      <h2>Prosjektleder</h2>
      <p>Vi ser etter en strukturert og engasjert prosjektleder som trives med ansvar og samarbeid for positiv utvikling av universitetet.</p>
      <button onclick="location.href='stilling_prosjektleder.php'">Les mer</button>
    </div>
  </main>

  <footer>
    © 2025 Universitetet i Agder – Sammen om kunnskap ❤️
  </footer>
</body>
</html>