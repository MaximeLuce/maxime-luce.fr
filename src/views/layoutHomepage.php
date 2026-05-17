<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO !-->
    <meta name="description" content="Site officiel de Maxime Luce, élève ingénieur et fondateur du Max de Culture. Découvrez mes projets et mes activités de médiation.">
    <link rel="canonical" href="https://maxime-luce.fr/">
    <meta name="title" content="<?= $title ?>"/>
    <meta name="keywords" content="maxime,luce,max,culture,projets,videos,animations,vulgarisation">
    <meta name="language" content="FR;fr">
    <meta name="date" content="2026">
    <meta name="droits" content="Maxime Luce">
    <meta name="copyright" content="Maxime Luce"/>
    <meta name="author" content="Maxime Luce"/>

    <!-- Open Graph protocol !-->
    <meta property="og:title" content="<?= $title ?>">
    <meta property="og:locale" content="fr_FR" />
    <meta property="og:description" content="Découvrez mes projets et mes activités de médiation.">
    <meta property="og:image" content="https://maxime-luce.fr/contents/background/background.png">
    <meta property="og:image:alt" content="Une image de fond avec des éléments artistiques pour décrire certains de mes projets tels que des éléments de traitement du signal, de la théorie de l'information, le vélo, le tennis ou encore le logo de la Renault 4CV." />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="1920" />
    <meta property="og:image:height" content="1080" />
    <meta property="og:url" content="https://maxime-luce.fr/">
    <meta property="og:type" content="website">

    <!-- favicon !-->
    <link rel="icon" href="favicon.ico">

    <!-- manifest !-->
    <link rel="manifest" href="manifest.json">

    <!-- CSS !-->
    <link href="<?= BASE_URL ?>css/variables.css" rel="stylesheet" />
    <link href="<?= BASE_URL ?>css/style.css" rel="stylesheet" />
    <link href="<?= BASE_URL ?>css/header.css" rel="stylesheet" />
    <link href="<?= BASE_URL ?>css/footer.css" rel="stylesheet" />
    <link href="<?= BASE_URL ?>css/navbar.css" rel="stylesheet" />
    <link href="<?= BASE_URL ?>css/form.css" rel="stylesheet" />
    <link href="<?= BASE_URL ?>css/homepage.css" rel="stylesheet" />

    <!-- Javascript !-->
     <script type="text/javascript" src="<?= BASE_URL ?>scripts/common.js" ></script>
      <script defer src="https://use.fontawesome.com/releases/v6.4.0/js/all.js"></script>
</head>

<body>
    <header role="banner">
        <section>
  
                <a href="<?= BASE_URL ?>homepage" />
                <h1>Maxime LUCE</h1>
            </a>

            <ul>
                <li><a href="https://www.linkedin.com/in/maxime-luce/" target="_blank" aria-label="Linkedin" rel="noopener"><span class="fab fa-linkedin fa-2x"></span></a></li>
                <li><a href="https://github.com/MaximeLuce" target="_blank" aria-label="Github" rel="noopener"><span class="fa-brands fa-github fa-2x"></span></a></li>
                <li><a href="https://discord.gg/4VhPeBZ" target="_blank" aria-label="Discord" rel="noopener"><span class="fab fa-discord fa-2x"></span></a></li>
                <li><a href="https://www.youtube.com/channel/UCcUIG4QC68iMr6iEEXVd8MQ" target="_blank" aria-label="YouTube" rel="noopener"><span class="fab fa-youtube fa-2x"></span></a></li>
                <li><a href="https://www.facebook.com/Le-Max-De-Culture-112009136970590" target="_blank" aria-label="Facebook" rel="noopener"><span class="fab fa-facebook fa-2x"></a></li>
                <li><a href="https://twitter.com/LeMaxDeCulture" target="_blank" aria-label="Twitter" rel="noopener"><span class="fab fa-twitter fa-2x"></a></li>
                <li><a href="https://www.instagram.com/le.max.de.culture/" target="_blank" aria-label="Instagram" rel="noopener"><span class="fab fa-instagram fa-2x"></a></li>
            </ul>
            

        </section>
    </header>



    <main id="page" role="main">
        <?= $content ?>
    </main>

    <footer>
        <section>
            <div>
                <p>&copy; Maxime LUCE</p>
                <p><a href="https://creativecommons.org/licenses/by-nc-nd/4.0/" target="_blank" aria-label="License BY-NC-ND 4.0" rel="noopener">License CC BY-NC-ND 4.0</a></p>
                <p>2026-<?= date("Y"); ?></p>
            </div>

         
                <ul>
                    <li><a href="<?= BASE_URL ?>contact">Contact</a></li>
                    <li><a href="<?= BASE_URL ?>legal">Mentions légales</a></li>
                </ul>
          
        </section>
    </footer>

    
</body>

</html>