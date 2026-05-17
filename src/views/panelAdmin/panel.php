<?php $title = "Panel Administrateur"; ?>

<?php ob_start(); ?>
<h1>Panel administrateur</h1>

<p>Option</p>
<ul>
    <li>Projet</li>
    <ul>
        <li><a href="<?= BASE_URL ?>admin/createproject">Créer un projet</a></li>
        <li><a href="<?= BASE_URL ?>admin/listProjects">Liste des projets</a></li>
    </ul>

    <li>Animation</li>
    <ul>
        <li><a href="<?= BASE_URL ?>admin/createanimation">Créer une animation</a></li>
        <li><a href="<?= BASE_URL ?>admin/listAnimations">Modifier une animation</a></li>
    </ul>
    
    <li><a href="<?= BASE_URL ?>admin/logout">Se déconnecter</a></li>
</ul>
    
<?php $content = ob_get_clean(); ?>

<?php require('src/views/layout.php') ?> 
