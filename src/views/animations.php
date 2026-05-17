<?php $title = "Animation"; ?>

<?php ob_start(); ?>

<p>Cette page présente certaines de mes activités de médiation scientifique. Si vous souhaitez que nous collaborions sur un projet, nous pouvons en discuter : <a href="<?= BASE_URL ?>contact">page de contact</a>.</p>
<main class="full-page">

    <?php foreach ($animations as $animation): ?>

        <article class="main-box">
            <h3><?= $animation->title ?></h3>
            <p><span class="fas fa-calendar-alt"></span> <?= $animation->dateAnimation ?></p>
            <p>
                <img src="<?= BASE_URL ?>contents/animation/<?= htmlspecialchars($animation->imageName) ?>" alt="">
                <?= nl2br($animation->content); ?>
            </p>
        </article>

    <?php endforeach; ?>


</main>

<?php if (isset($errorMessage)) {
    echo $errorMessage;
} ?>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
