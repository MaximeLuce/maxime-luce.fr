<?php $title = "Contact"; ?>

<?php ob_start(); ?>

<p>Une idée de projet ? Un échange ?</p>

<p>Vous pouvez me contacter sur mes différents réseaux actifs ou par mail à : <span>contact</span> arobase <span>maxime-luce.fr</span></p>



<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>