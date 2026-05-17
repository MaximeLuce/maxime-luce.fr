<?php $title = "Mentions légales"; ?>

<?php ob_start(); ?>


<h3>Informations générales</h3>

<p>Ce site est réalisé et édité par Maxime LUCE.</p>

<p>Contact : <a href="<?= BASE_URL ?>contact">Page de contact</a></p>

<p>Site : <a href="https://maxime-luce.fr">https://maxime-luce.fr</a></p>

<p>Le site est hébergé par la société <span>OVH, 2 rue Kellermann - 59100 Roubaix - France</span></p>

<h3>License</h3>

<p>Sauf mention explicite du contraire, toutes les images et productions sur ce site sont la propriété de Maxime LUCE. Ces ressources sont publiées avec la <a href="https://creativecommons.org/licenses/by-nc-nd/4.0/" target="_blank">License CC BY-NC-ND 4.0</a>.</p>


<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>