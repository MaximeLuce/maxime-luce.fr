<?php

namespace Application\Controllers;

use Application\Lib\DatabaseConnection;
use Application\Model\ProjectRepository;

class Projects
{
    public function execute()
    {
        $projectRepository = new ProjectRepository();
        $projectRepository->connection = new DatabaseConnection();
        $allProjects = $projectRepository->getProjects();

        $projectsByCategory = [];

        foreach ($allProjects as $project) {
            $category = $project->category;
            
            $projectsByCategory[$category][] = $project;
        }

        require('src/views/projects.php');
    }
}
