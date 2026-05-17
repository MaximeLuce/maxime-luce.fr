<?php $title = "Maxime LUCE"; ?>

<?php ob_start(); ?>

<section id="grid">
    <a href="https://le-max-de-culture.fr" class="grid" target="_blank" rel="noopener" aria-label="Visiter le site du Max De Culture.">
        <img src="<?= BASE_URL ?>contents/homepage/lmdc.png" alt="Représentation de l'esprit du Max De Culture avec des personnes qui échangent autour d'une table.">
        <div>
            <h3>Le Max De Culture</h3>
            <span>Depuis 2015</span>
        </div>
    </a>

    <a href="https://mms-en-vadrouille.fr" class="grid" target="_blank" rel="noopener" aria-label="Visiter le site des M&Ms en vadrouille/">
        <img src="<?= BASE_URL ?>contents/homepage/vadrouille.jpeg" alt="Photographie de la Loire lors d'un voyage à vélo illustrant le site des M&Ms en vardouille qui présente certains récits de voyages.">
        <div>
            <h3>Les M&Ms en vadrouille</h3>
            <span>Voyage et découverte</span>
        </div>
    </a>

    <a href="https://www.youtube.com/@lemaxdeculture_yt" class="grid" target="_blank" rel="noopener" aria-label="Visiter la chaîne YouTube du Max De Culture">
        <img src="<?= BASE_URL ?>contents/homepage/youtube.png" alt="Miniature d'une vidéo de la chaîne sur le théorème de Pythagore.">
        <div>
            <h3>Chaîne YouTube</h3>
            <span>Interviews</span>
        </div>
    </a>

    <a href="<?= BASE_URL ?>projects" class="grid" rel="noopener" aria-label="Découvrir certains de mes projets.">
        <img src="<?= BASE_URL ?>contents/homepage/projets.png" alt="Image d'un logiciel de capture de positions utilisé lors de mon TIPE, illustrant le lien vers la page qui décrit certains de mes projets.">
        <div>
            <h3>Projets</h3>
            <span>Académiques et perso</span>
        </div>
    </a>

    <a href="<?= BASE_URL ?>animation" class="grid" rel="noopener" aria-label="Découvrir certaines de mes activités de médiation scientifique.">
        <img src="<?= BASE_URL ?>contents/homepage/thionville2025.jpg" alt="Photographie d'une table recouverte d'origamis pour illustrer un des ateliers lors de la semaine des mathématiques.">
        <div>
            <h3>Animation</h3>
            <span>Festivals, exposés</span>
        </div>
    </a>

    <a href="https://github.com/MaximeLuce" class="grid" target="_blank" rel="noopener" aria-label="Visiter ma page GiThub contenant certains des codes sources de mes projets.">
        <img src="<?= BASE_URL ?>contents/homepage/github.png" alt="Illustration de programmation informatique : capture d'écran d'un code écrit en PHP.">
        <div>
            <h3>Github</h3>
            <span>Code source</span>
        </div>
    </a>

    
</section>


<?php $content = ob_get_clean(); ?>

<?php require('layoutHomepage.php') ?>