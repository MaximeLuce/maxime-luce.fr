<?php $title = "A propos"; ?>

<?php ob_start(); ?>
<h1>A propos</h1>

<p>statique descrition</p>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
