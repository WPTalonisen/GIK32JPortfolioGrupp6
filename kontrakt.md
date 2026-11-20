# Kontrakt: namn för HTML, CSS och JS

Ändras bara tillsammans i gruppen.

## BEM-block

| Block | Element | Modifiers | Används på | Varför namnet |
|---|---|---|---|---|
|  skip-link|  |  |  Alla sidor|  Länken hoppar förbi menyn|
|  site-header|__logo, __role  |  |  Alla sidor|  sidhuvudet är samma för alla sidor|
|  main-menu|__toggle, __list, __item, __link|tillståndet is-open sätts av JS  |  Alla sidor|  Huvudnavigeringen för att skilja från andra menyer|
|  page|__title, __intro, __link  |  |  Alla sidor (__link bara på tack)|  Sidans huvudinnehåll|
|  topic|__title, __text, __points, __point, __subtitle|  |  Alla sidor|  En sektion som handlar om ett ämne|
|  profile|__photo, __credit  |  |  index|  Profilbild med bildtext|
|  sidebar|__title, __text, __link  |  |  index|  Rutan bredvid huvudtexten|
|  fact-list|__term, __value  |  |  index, utbildning|  En lista med fakta i par|
|  card| __title, __facts, __text, __screenshot, __image, __screenshot-text, __tags, __tag, __more, __subtitle, __link|  --featured|  certifieringar, projekt|  inramad ruta som går att återanvända för olika innehåll|
|  skill-matrix| __title, __row, __heading, __skill, __value|  |  kompetenser|  En tabell med kompetenser och nivåer|
|  contact-list| __item, __link, __copy, __status|  |  kontakt|  En lista med kontaktvägar|
|  contact-form| __hint, __field, __field-label, __text-field, __dropdown, __choices, __choices-title, __choice, __radio, __message, __counter, __submit| __field-label--inline |  kontakt|  kontaktformuläret|
|  projekt-list| |  |  projekt|  behållaren för projektkort|
|  receipt| __title, __details, __term, __value|  |  tack|  Kvittot som visar det som skickades i formuläret|
|  timeline| __item, __title, __period, __text|  |  utbildning|  Händelser i tidsordning|
|  site-footer| __text, __links, __item, __link|  |  alla sidor|  Sidfoten som är gemensam för hela webbsidan|


## JS-krokar

| Interaktion | ACTION (data-js-action) | DATA (data-*) | TARGET (data-js-target) | Sida |
|---|---|---|---|---|
|  öppna/stänga mobilmenyn|toggle-menu på <button>  |knappen har aria-expanded och aria-controls  |menu på <ul>  |Alla sidor |
|  kopiera e-postadress|copy-email på <button>  |data-email="example@example.com"  |copy-status på <p aria-live>  |kontakt  |
|  räkna tecken i meddelandet|count-characters på <textarea>  |data-max-length="1000"  |character-count på <p aria-live>  | kontakt |
