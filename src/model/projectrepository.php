<?php

namespace Application\Model;


use Application\Lib\DatabaseConnection;

class Project
{
    public int $identifier;
    public string $title;
    public string $titleLink;
    public string $category;
    public string $categoryLink;
    public string $dateProject;
    public string $content;
    public string $imageName;
    
}

class ProjectRepository
{
    public DatabaseConnection $connection;

    private function transformStringLinkable(string $string): string
    {
        $transformedString = mb_strtolower($string, 'UTF-8');
        $transformedString = str_replace(["'", "’"], "", $transformedString);
        $transformedString = preg_replace('/[^\p{L}\p{N}]+/u', '-', $transformedString);
        $transformedString = trim($transformedString, '-');

        return $transformedString;
    }
    public function getProjects(): array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT id, title, category, date_project, content, image_name FROM projects ORDER BY category ASC"
        );
        $projects = [];
        while (($row = $statement->fetch())) {
            $project = new Project();
            $project->identifier = $row['id'];
            $project->title = $row['title'];
            $project->titleLink = $this->transformStringLinkable($row['title']);
            $project->category = $row['category'];
            $project->categoryLink = $this->transformStringLinkable($row['category']);
            $project->dateProject = $row['date_project'];
            $project->content = $row['content'];
            $project->imageName = $row['image_name'];
            $projects[] = $project;
        }

        return $projects;
    }

    public function getProjectById(string $identifier): ?Project
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, title, category, date_project, content, image_name FROM projects WHERE id = :id"
        );
        
        $statement->execute(['id' => $identifier]);

        $row = $statement->fetch();

        if ($row === false) {
            return null;
        }

      
        $project = new Project();
        $project->identifier = $row['id'];
        $project->title = $row['title'];
        $project->titleLink = $this->transformStringLinkable($row['title']);
        $project->category = $row['category'];
        $project->categoryLink = $this->transformStringLinkable($row['category']);
        $project->dateProject = $row['date_project'];
        $project->content = $row['content'];
        $project->imageName = $row['image_name'];

        return $project;
    }


    public function createProject(string $title, string $category, string $date, string $content, string $imageName): bool
    {
        $pdo = $this->connection->getConnection();

        $statement = $pdo->prepare(
            "INSERT INTO projects(title, category, date_project, content, image_name) 
             VALUES (:title, :category, :date_project, :content, :image_name)"
        );

        $success = $statement->execute([
            'title'     => $title,
            'category' => $category,
            'date_project' => $date,
            'content' => $content,
            'image_name' => $imageName
        ]);

        return $success;
    }

    public function editProject(string $identifier, string $title, string $category, string $date, string $content, string $imageName): bool
    {
        $pdo = $this->connection->getConnection();

        $statement = $pdo->prepare(
            "UPDATE projects SET title = :title, category = :category, date_project = :date_project, content = :content, image_name = :image_name WHERE id = :id"
        );

        $success = $statement->execute([
            'id'    => $identifier,
            'title'     => $title,
            'category' => $category,
            'date_project' => $date,
            'content' => $content,
            'image_name' => $imageName
        ]);

        return $success;
    }

    public function deleteProject(string $identifier){
        $statement = $this->connection->getConnection()->query(
            "DELETE FROM projects WHERE id ='".$identifier."'"
        );

        return $statement;
    }
}
