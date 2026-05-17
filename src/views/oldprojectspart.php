<h2 id="Animation">Animation</h2>

        <?php
        foreach ($projects as $project) {
        ?>
            <div class="main-box">


                <div>
                    <h3 id="<?= htmlspecialchars($project->titleLink); ?>">
                        <?= htmlspecialchars($project->title); ?>
                    </h3>
                    <span><?= $project->dateProject; ?></span>
                    <p>
                        <img src="<?= BASE_URL ?>contents/projects/example.jpg" alt="">
                        <?= nl2br($project->content); ?>
                    </p>

                </div>

            </div>
        <?php
        }
        ?>