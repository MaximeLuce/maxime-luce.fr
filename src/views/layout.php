<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO !-->
    <meta name="description" content="Site officiel de Maxime Luce, élève ingénieur et fondateur du Max de Culture. Découvrez mes projets et mes activités de médiation.">
    
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
    <link href="<?= BASE_URL ?>css/style.css" rel="stylesheet" />
    <link href="<?= BASE_URL ?>css/header.css" rel="stylesheet" />
    <link href="<?= BASE_URL ?>css/footer.css" rel="stylesheet" />
    <link href="<?= BASE_URL ?>css/variables.css" rel="stylesheet" />
    <link href="<?= BASE_URL ?>css/navbar.css" rel="stylesheet" />
    <link href="<?= BASE_URL ?>css/form.css" rel="stylesheet" />
    <link href="<?= BASE_URL ?>css/homepage.css" rel="stylesheet" />
    <link href="<?= BASE_URL ?>css/admin.css" rel="stylesheet" />

    <!-- Javascript !-->
     <script type="text/javascript" src="<?= BASE_URL ?>scripts/common.js"></script>
      <script defer src="https://use.fontawesome.com/releases/v6.4.0/js/all.js"></script>
</head>

<body>
    <header role="banner">
        <section>
  
                <a href="<?= BASE_URL ?>homepage" />
                <h1>Maxime LUCE</h1>
            </a>

            <h2><?= $title ?></h2>

           
            

        </section>
    </header>



    <main id="page" role="main" class="bg">
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