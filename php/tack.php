<?php
declare(strict_types=1);

// Hämtar ett textfält från $_POST, trimmar mellanslag och sanerar mot XSS.
function falt(string $namn): string
{
    $varde = $_POST[$namn] ?? '';
    $varde = is_string($varde) ? trim($varde) : '';
    return $varde === '' ? 'Ej angivet' : htmlspecialchars($varde, ENT_QUOTES, 'UTF-8');
}

// Kontrollerar om sidan nåtts via ett skickat formulär (POST) eller direkt (GET).
$skickat = ($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST';

$namn       = falt('namn');
$epost      = falt('epost');
$amne       = falt('amne');
$roll       = falt('roll');
$meddelande = falt('meddelande');

// Översätter value-attributen från select och radio till läsbar svensk text.
$amnen = [
    'lia'         => 'LIA-plats',
    'anstallning' => 'Anställning',
    'samarbete'   => 'Samarbete eller projekt',
    'ovrigt'      => 'Övrigt',
];

$roller = [
    'rekryterare' => 'Rekryterare',
    'utvecklare'  => 'Utvecklare eller kollega',
    'student'     => 'Student',
    'annan'       => 'Annan',
];

$amneText = $amnen[$amne] ?? $amne;
$rollText = $roller[$roll] ?? $roll;
?>
<!DOCTYPE html>
<html lang="sv">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tack – Maxnoliam Pettholblad</title>
  <meta name="description" content="Bekräftelse på att meddelandet har skickats.">
  <link rel="stylesheet" href="../css/style.css">
  <script src="../js/script.js" defer></script>
</head>
<body>
  <a class="skip-link" href="#main-content">Hoppa till huvudinnehållet</a>

  <header class="masthead">
    <a class="masthead__logo" href="../html/index.html">Alex Lindqvist <span class="masthead__role">Systemutvecklare och IT-säkerhet</span></a>
    <nav class="main-menu" aria-label="Huvudmeny">
      <!-- JS: Visar och döljer menylistan på smala skärmar. Vid klick växlar knappens aria-expanded mellan "false" och "true" och listan med data-js-target="menu" visas eller döljs. Escape-tangenten ska stänga menyn och flytta fokus tillbaka till knappen. -->
      <button class="main-menu__toggle" type="button" data-js-action="toggle-menu" aria-expanded="false" aria-controls="main-menu-list">Meny</button>
      <ul class="main-menu__list" id="main-menu-list" data-js-target="menu">
        <li class="main-menu__item"><a class="main-menu__link" href="../html/index.html">Om mig</a></li>
        <li class="main-menu__item"><a class="main-menu__link" href="../html/kompetenser.html">Kompetenser</a></li>
        <li class="main-menu__item"><a class="main-menu__link" href="../html/projekt.html">Projekt</a></li>
        <li class="main-menu__item"><a class="main-menu__link" href="../html/utbildning.html">Utbildning och erfarenhet</a></li>
        <li class="main-menu__item"><a class="main-menu__link" href="../html/certifieringar.html">Certifieringar</a></li>
        <li class="main-menu__item"><a class="main-menu__link" href="../html/kontakt.html">Kontakt</a></li>
      </ul>
    </nav>
  </header>

  <main class="page" id="main-content">
    <h1 class="page__title"><?= $skickat ? "Tack för ditt meddelande, {$namn}!" : 'Inget meddelande har skickats' ?></h1>

  <?php if ($skickat): ?>
    <p class="page__intro">Jag har tagit emot ditt meddelande och svarar till <?= $epost ?> inom två arbetsdagar.</p>
    <section class="receipt" aria-labelledby="kvitto-rubrik">
      <h2 class="receipt__title" id="kvitto-rubrik">Det här skickade du</h2>
      <dl class="receipt__details">
        <dt class="receipt__term">Namn</dt>
        <dd class="receipt__value"><?= $namn ?></dd>
        <dt class="receipt__term">E-postadress</dt>
        <dd class="receipt__value"><?= $epost ?></dd>
        <dt class="receipt__term">Ämne</dt>
        <dd class="receipt__value"><?= $amneText ?></dd>
        <dt class="receipt__term">Kontaktar som</dt>
        <dd class="receipt__value"><?= $rollText ?></dd>
        <dt class="receipt__term">Meddelande</dt>
        <dd class="receipt__value"><?= nl2br($meddelande, false) ?></dd>
      </dl>
    </section>
    <p class="page__intro"><a class="page__link" href="../html/index.html">Tillbaka till startsidan Om mig</a></p>
<?php else: ?>
    <p class="page__intro">Den här sidan visar ett kvitto efter att kontaktformuläret har skickats. Den laddades utan formulärdata.</p>
    <p class="page__intro"><a class="page__link" href="../html/kontakt.html">Gå till kontaktformuläret och skriv ett meddelande</a></p>
<?php endif; ?>
  </main>

  <footer class="colophon">
    <p class="colophon__text">&copy; 2026 Maxnoliam Pettholblad. Fiktiv portfolio skapad i utbildningssyfte.</p>
    <ul class="colophon__links">
      <li class="colophon__item"><a class="colophon__link" href="https://github.com/exempel-alex-lindqvist">Alex Lindqvist på GitHub</a></li>
      <li class="colophon__item"><a class="colophon__link" href="https://www.linkedin.com/in/exempel-alex-lindqvist">Alex Lindqvist på LinkedIn</a></li>
    </ul>
  </footer>
</body>
</html>