<!DOCTYPE html>
<html lang="no">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Universitetet i Agder (UiA)</title>

  <!-- W3.CSS og fonter -->
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
    body, h1, h2, h3, h4, h5, h6 
    {
      font-family: "Roboto", sans-serif;
    }

    /* Fargepalett */
    .uai-red { background-color: #c62828; color: white; }
    .uai-light-red { background-color: #f28b82; color: black; }

    /* Kort for innhold */
    .card 
    {
      background-color: white;
      border-radius: 10px;
      padding: 32px;
    
      margin: 32px 0;
    }

    /* Topptekst */
    .hero 
    {
      background: linear-gradient(135deg, #c62828, #b71c1c);
      color: white;
      padding: 100px 16px;
      text-align: center;
    }

    /* Knappstil */
    .stilling-btn 
    {
      background-color: #c62828;
      color: white;
      padding: 12px 24px;
      border-radius: 8px;
      text-decoration: none;
      display: inline-block;
      margin-top: 12px;
    }
    .stilling-btn:hover 
    {
      background-color: #a91f1f;
    }
  </style>
</head>

<body>
<!-- Navigasjonsbar (navbar) som forsvinner ved scroll -->
  <div class="w3-bar uai-red w3-large">
    <a href="#" class="w3-bar-item w3-button w3-hover-white"><b>UiA</b></a>  
    <a href="#stillinger" class="w3-bar-item w3-button w3-hover-white">Ledige stillinger</a>
    <a href="#admin" class="w3-bar-item w3-button w3-hover-white">Administrasjon</a>
  </div>


  <!-- Toppseksjon -->
  <div class="hero">
    <h1>Universitetet i Agder</h1>
    <p>Et fremtidsrettet universitet med hjerte for kunnskap, mennesker og samfunn.</p>
  </div>

  <!-- Hovedinnhold -->
  <div class="w3-content" style="max-width:1100px; margin-top:40px;">

    <!-- Om UiA -->
    <section id="om" class="card">
      <h2 class="w3-text-red">Om UiA</h2>
      <p>
        Universitetet i Agder (UiA) er et moderne og fremtidsrettet universitet med campus i Kristiansand og Grimstad.
        Med et sterkt fokus på forskning, innovasjon og samarbeid med næringslivet, tilbyr UiA et bredt spekter av studier
        innen blant annet økonomi, teknologi, lærerutdanning, helse og kunstfag.
      </p>

      <p>
        UiA legger vekt på et inkluderende læringsmiljø, tett oppfølging av studentene og et levende studentmiljø
        som gjør studiehverdagen både faglig og sosialt engasjerende.
      </p>
    </section>

    <!-- Verdier -->
    <section id="verdier" class="card">
      <h2 class="w3-text-red">Verdiene til UiA</h2>
      <p>
        Universitetet i Agder bygger på verdiene <b>åpenhet, samarbeid og kvalitet</b>.
        Åpenhet handler om å dele kunnskap og være inkluderende.
        Samarbeid står sentralt i møtet mellom studenter, ansatte og samfunnsliv.
        Kvalitet preger både utdanning, forskning og formidling - med mål om å skape varig verdi for regionen og verden.
      </p>
    </section>

    <!-- Mål -->
    <section id="maal" class="card">
      <h2 class="w3-text-red">Målene til UiA</h2>
      <p>
        Universitetet i Agder har som mål å være et <b>åpent og innovativt universitet</b>
        som bidrar til <b>bærekraftig samfunnsutvikling</b>.
        UiA skal tilby utdanning og forskning av høy kvalitet,
        styrke samarbeidet med næringsliv og offentlig sektor,
        og skape et inkluderende læringsmiljø som fremmer kunnskap,
        kritisk tenkning og engasjement hos studentene.
      </p>
    </section>

  </div>
</body>
</html>
