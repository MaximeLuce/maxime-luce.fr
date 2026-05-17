<?php

namespace Application\Controllers;

use Application\Lib\DatabaseConnection;
use Application\Model\AnimationRepository;

class Animation
{
    public function execute()
    {
        $animationRepository = new AnimationRepository();
        $animationRepository->connection = new DatabaseConnection();
        $animations = $animationRepository->getAnimations();


        require('src/views/animations.php');
    }
}
