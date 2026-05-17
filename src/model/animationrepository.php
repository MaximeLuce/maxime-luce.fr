<?php

namespace Application\Model;


use Application\Lib\DatabaseConnection;

class Animation
{
    public int $identifier;
    public string $title;
    public string $dateAnimation;
    public string $content;
    public string $imageName;
    
}

class AnimationRepository
{
    public DatabaseConnection $connection;


    public function getAnimations(): array
    {
        // "SELECT id, title, author_id, category, description_article, content, DATE_FORMAT(creation_date, '%d/%m/%Y') AS french_creation_date FROM articles WHERE category = '$category' ORDER BY creation_date DESC LIMIT 0, 5"

        $statement = $this->connection->getConnection()->query(
            "SELECT id, title, DATE_FORMAT(date_animation, '%d/%m/%Y') AS date_animation, content, image_name FROM animations ORDER BY date_animation DESC"
        );
        $animations = [];
        while (($row = $statement->fetch())) {
            $animation = new Animation();
            $animation->identifier = $row['id'];
            $animation->title = $row['title'];
            $animation->dateAnimation = $row['date_animation'];
            $animation->content = $row['content'];
            $animation->imageName = $row['image_name'];
            $animations[] = $animation;
        }

        return $animations;
    }

    public function getAnimationByID(string $identifier): ?Animation
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, title, date_animation, content, image_name FROM animations WHERE id = :id"
        );
        
        $statement->execute(['id' => $identifier]);

        $row = $statement->fetch();

        if ($row === false) {
            return null;
        }

      
        $animation = new Animation();
        $animation->identifier = $row['id'];
        $animation->title = $row['title'];
        $animation->dateAnimation = $row['date_animation'];
        $animation->content = $row['content'];
        $animation->imageName = $row['image_name'];

        return $animation;
    }


    public function createAnimation(string $title, string $date, string $content, string $imageName): bool
    {
        $pdo = $this->connection->getConnection();

        $statement = $pdo->prepare(
            "INSERT INTO animations(title, date_animation, content, image_name) 
             VALUES (:title, :date_animation, :content, :image_name)"
        );

        $success = $statement->execute([
            'title'     => $title,
            'date_animation' => $date,
            'content' => $content,
            'image_name' => $imageName
        ]);

        return $success;
    }

    public function editAnimation(string $identifier, string $title, string $date, string $content, string $imageName): bool
    {
        $pdo = $this->connection->getConnection();

        $statement = $pdo->prepare(
            "UPDATE animations SET title = :title, date_animation = :date_animation, content = :content, image_name = :image_name WHERE id = :id"
        );

        $success = $statement->execute([
            'id'    => $identifier,
            'title'     => $title,
            'date_animation' => $date,
            'content' => $content,
            'image_name' => $imageName
        ]);

        return $success;
    }

    public function deleteAnimation(string $identifier){
        $statement = $this->connection->getConnection()->query(
            "DELETE FROM animations WHERE id ='".$identifier."'"
        );

        return $statement;
    }
}
