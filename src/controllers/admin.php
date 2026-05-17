<?php

namespace Application\Controllers;

use Application\Lib\DatabaseConnection;
use Application\Model\AdminRepository;
use Application\Model\ProjectRepository;
use Application\Model\AnimationRepository;

class Admin
{
    private function checkAdmin(): void
    {
        // we check that the session are started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // if there is no session id, the user is not connected
        if (!isset($_SESSION['id'])) {
            header('Location: ' . BASE_URL . 'admin/login');
            exit();
        }
    }

    public function execute()
    {
        $errorMessage = "No attribute";

        require('src/views/error.php');
    }

    public function login()
    {
        $errorMessage = null;

        if (isset($_POST['connexion'])) {
            if (!empty($_POST['pseudo']) && !empty($_POST['mdp'])) {
                $pseudo = htmlspecialchars($_POST['pseudo']);
                $mdp = htmlspecialchars($_POST['mdp']);

                $connection = new DatabaseConnection();
                $adminRepository = new AdminRepository();
                $adminRepository->connection = $connection;

                $adminData = $adminRepository->getAdmin($pseudo);

                if ($adminData && password_verify($_ENV['MAGIC_WORD'] . $mdp, $adminData['psw'])) {

                    // we check if sessions are started
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }

                    // we save data in session
                    $_SESSION['name'] = $pseudo;
                    $_SESSION['id'] = $adminData['id'];

                    // redirection
                    header('Location: ' . BASE_URL . 'admin/panel');

                    exit();
                } else {
                    $errorMessage = "Les informations fournies sont incorrectes.";
                }
            } else {
                $errorMessage = "Veuillez remplir tous les champs.";
            }
        }
        require('src/views/panelAdmin/login.php');
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: ' . BASE_URL . 'homepage');
        exit();
    }

    public function panel()
    {
        $this->checkAdmin();
        require('src/views/panelAdmin/panel.php');
    }

    // Project

    public function createproject()
    {
        $this->checkAdmin();

        if (isset($_POST['submitProject'])) {
            if (isset($_POST['title']) && isset($_POST['category']) && isset($_POST['contentProject'])  && isset($_POST['dateProject']) && isset($_POST['imageName'])) {
                $title = htmlspecialchars($_POST['title']);
                $category = htmlspecialchars($_POST['category']);
                $content = $_POST['contentProject'];
                $date = htmlspecialchars($_POST['dateProject']);
                $imageName = htmlspecialchars($_POST['imageName']);

                $connection = new DatabaseConnection();
                $articleRepository = new ProjectRepository();
                $articleRepository->connection = $connection;

                $success = $articleRepository->createProject($title, $category, $date, $content, $imageName);

                if ($success) {
                    $errorMessage = "Le projet a été créé avec succès !";
                    header('Location: ' . BASE_URL . 'admin/listProjects');
                } else {
                    $errorMessage = "Une erreur est survenue lors de la création du projet.";
                }
            } else {
                $errorMessage = "Tous les champs du formulaire ne sont pas complets.";
            }
        }
        
        require('src/views/panelAdmin/createproject.php');
    }


    public function listProjects(){

        $this->checkAdmin();

        $projectRepository = new ProjectRepository();
        $projectRepository->connection = new DatabaseConnection();
        $allProjects = $projectRepository->getProjects();

        $projectsByCategory = [];

        foreach ($allProjects as $project) {
            $category = $project->category;

            $projectsByCategory[$category][] = $project;
        }

        require('src/views/panelAdmin/editproject.php');
    }
    public function editProject($identifier)
    {
        $this->checkAdmin();

        $projectRepository = new ProjectRepository();
        $projectRepository->connection = new DatabaseConnection();
        $project = $projectRepository->getProjectById($identifier);


        if (isset($_POST['submitProject'])) {
            if (isset($_POST['title']) && isset($_POST['category']) && isset($_POST['contentProject'])  && isset($_POST['dateProject']) && isset($_POST['imageName'])) {
                $title = htmlspecialchars($_POST['title']);
                $category = htmlspecialchars($_POST['category']);
                $content = $_POST['contentProject'];
                $date = htmlspecialchars($_POST['dateProject']);
                $imageName = htmlspecialchars($_POST['imageName']);

                $connection = new DatabaseConnection();
                $articleRepository = new ProjectRepository();
                $articleRepository->connection = $connection;

                $success = $articleRepository->editProject($identifier, $title, $category, $date, $content, $imageName);

                if ($success) {
                    $errorMessage = "Le projet a été modifié avec succès !";
                    header('Location: ' . BASE_URL . 'admin/listProjects');
                } else {
                    $errorMessage = "Une erreur est survenue lors de la modification du projet.";
                }
            } else {
                $errorMessage = "Tous les champs du formulaire ne sont pas complets.";
            }
        }

        
        require('src/views/panelAdmin/editproject.php');
        
    }

    public function deleteproject($identifier)
    {
        $this->checkAdmin();

        $projectRepository = new ProjectRepository();
        $projectRepository->connection = new DatabaseConnection();

        $success = $projectRepository->deleteProject($identifier);

        if ($success) {
            $errorMessage = "Le projet a été supprimé avec succès !";
            header('Location: ' . BASE_URL . 'admin/listProjects');

            exit();
        } else {
            $errorMessage = "Une erreur est survenue lors de la suppression du projet.";
        }
    }

    // Animation

    public function createAnimation()
    {
        $this->checkAdmin();

        if (isset($_POST['submitAnimation'])) {
            if (isset($_POST['title']) && isset($_POST['contentAnimation'])  && isset($_POST['dateAnimation']) && isset($_POST['imageName'])) {
                $title = $_POST['title'];
                $content = $_POST['contentAnimation'];
                $date = htmlspecialchars($_POST['dateAnimation']);
                $imageName = htmlspecialchars($_POST['imageName']);

                $connection = new DatabaseConnection();
                $animationRepository = new AnimationRepository();
                $animationRepository->connection = $connection;

                $success = $animationRepository->createAnimation($title, $date, $content, $imageName);

                if ($success) {
                    $errorMessage = "L'animation a été créée avec succès !";
                } else {
                    $errorMessage = "Une erreur est survenue lors de la création de l'animation.";
                }
            } else {
                $errorMessage = "Tous les champs du formulaire ne sont pas complets.";
            }
        }
        
        require('src/views/panelAdmin/createanimation.php');
    }


    public function listAnimations(){

        $this->checkAdmin();

        $animationRepository = new AnimationRepository();
        $animationRepository->connection = new DatabaseConnection();
        $animations = $animationRepository->getAnimations();


        require('src/views/panelAdmin/editanimation.php');
    }
    public function editAnimation($identifier)
    {
        $this->checkAdmin();

        $animationRepository = new AnimationRepository();
        $animationRepository->connection = new DatabaseConnection();
        $animation = $animationRepository->getAnimationById($identifier);


        if (isset($_POST['submitAnimation'])) {
            if (isset($_POST['title']) && isset($_POST['contentAnimation'])  && isset($_POST['dateAnimation']) && isset($_POST['imageName'])) {
                $title = htmlspecialchars($_POST['title']);
                $content = $_POST['contentAnimation'];
                $date = htmlspecialchars($_POST['dateAnimation']);
                $imageName = htmlspecialchars($_POST['imageName']);

                $connection = new DatabaseConnection();
                $animationRepository = new AnimationRepository();
                $animationRepository->connection = $connection;

                $success = $animationRepository->editAnimation($identifier, $title, $date, $content, $imageName);

                if ($success) {
                    $errorMessage = "L'animation a été modifiée avec succès !";
                    header('Location: ' . BASE_URL . 'admin/listAnimations');
                } else {
                    $errorMessage = "Une erreur est survenue lors de la modification de l'animation.";
                }
            } else {
                $errorMessage = "Tous les champs du formulaire ne sont pas complets.";
            }
        }

        
        require('src/views/panelAdmin/editanimation.php');
        
    }

    public function deleteAnimation($identifier)
    {
        $this->checkAdmin();

        $animationRepository = new AnimationRepository();
        $animationRepository->connection = new DatabaseConnection();

        $success = $animationRepository->deleteAnimation($identifier);

        if ($success) {
            $errorMessage = "L'animation a été supprimée avec succès !";
            header('Location: ' . BASE_URL . 'admin/editanimation');

            exit();
        } else {
            $errorMessage = "Une erreur est survenue lors de la suppression de l'animation.";
        }
    }
}
