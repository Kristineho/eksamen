<!DOCTYPE html>
<html lang="no">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Søknad - Universitetet i Agder</title>

  <!-- W3.CSS og font -->
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">

  <style>
    body, h1, h2, h3, h4, h5, h6 { font-family: "Roboto", sans-serif; }

    /* Rødfarger */
    .uai-red { background-color: #c62828; color: white; }
    .uai-light-red { background-color: #f28b82; }

    /* Hero-banner */
    .hero 
    {
      background: linear-gradient(135deg, #c62828, #b71c1c);
      color: white;
      text-align: center;
      padding: 80px 20px;
    }

    /* Kort-stil for skjema */
    .card 
    {
      background-color: white;
      border-radius: 10px;
      padding: 32px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      max-width: 700px;
      margin: 40px auto;
    }

    /* Send-knapp */
    .submit-btn 
    {
      background-color: #c62828;
      color: white;
      padding: 12px 24px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 16px;
    }
    .submit-btn:hover 
    {
      background-color: #a91f1f;
    }

    /* Input-stil */
    input[type=text], input[type=email], textarea 
    {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 8px;
      margin-top: 6px;
      margin-bottom: 16px;
      resize: vertical;
    }

    input[type=file] 
    {
      margin-top: 8px;
      margin-bottom: 16px;
    }

  </style>
</head>

<body>

  <!-- Toppseksjon -->
  <div class="hero">
    <h1>Søk på stilling</h1>
    <p>Universitetet i Agder - Sammen om kunnskap</p>
  </div>

  <!-- Søknadsskjema -->
  <div class="card">
    <h2 class="w3-text-red">Søknadsskjema</h2>
    <p>Fyll ut feltene under for å sende inn din søknad.</p>

    <form action="#" method="post" enctype="multipart/form-data">
      <label for="navn"><b>Navn</b></label>
      <input type="text" id="navn" name="navn" placeholder="Skriv inn ditt navn" required>

      <label for="epost"><b>E-post</b></label>
      <input type="email" id="epost" name="epost" placeholder="din@epost.no" required>

      <label for="stilling"><b>Hvilken stilling søker du?</b></label>
      <input type="text" id="stilling" name="stilling" placeholder="F.eks. Førsteamanuensis i økonomi" required>

      <label for="soeknad"><b>Søknadstekst</b></label>
      <textarea id="soeknad" name="soeknad" rows="8" placeholder="Skriv din søknad her..." required></textarea>

      <label for="cv"><b>Last opp CV</b></label>
      <input type="file" id="cv" name="cv" accept=".pdf,.doc,.docx" required>

      <button type="submit" class="submit-btn">Send søknad</button>
    </form>
  </div>

</body>
</html>

<!-- lenke til søknadsmalen: <a href="søknad.html" class="stilling-btn">Søk på stillingen</a> -->



