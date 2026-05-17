<?php $title = "Panel Administrateur"; ?>

<?php ob_start(); ?>
<h1>Modification d'un projet par l'administateur <?= $_SESSION['name'] ?></h1>

<p><a href="<?= BASE_URL ?>admin/panel">Retour au panel administrateur</a> </p>

<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.15.3/dist/katex.min.css" integrity="sha384-KiWOvVjnN8qwAZbuQyWDIbfCLFhLXNETzBQjA/92pIowpC0d2O3nppDGQVgwd2nB" crossorigin="anonymous">
<script defer src="https://cdn.jsdelivr.net/npm/katex@0.15.3/dist/katex.min.js" integrity="sha384-0fdwu/T/EQMsQlrHCCHoH10pkPLlKA1jL5dFyUOvB3lfeT2540/2g6YgSi2BL14p" crossorigin="anonymous"></script>



<p><?php if(isset($errorMessage)){echo $errorMessage;} ?></p>


<?php 
if(!isset($identifier))
    {
?>

<h2>Liste des projets</h2>

<table>
    <caption>Liste des projets</caption>

    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">title</th>
            <th scope="col">category</th>
            <th scope="col">date_project</th>
            <th scope="col">content</th>
            <th scope="col">image_name</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($projectsByCategory as $categoryName => $categoryProjects): ?>
        
            <?php foreach ($categoryProjects as $project): ?>
                <tr>
                    <th scope="row"><?= $project->identifier ?></th>
                    <th scope="row"><?= $project->title ?></th>
                    <th scope="row"><?= $project->category ?></th>
                    <th scope="row"><?= $project->dateProject ?></th>
                    <th scope="row"><?= $project->content ?></th>
                    <th scope="row"><?= $project->imageName ?></th>
                    <th scope="row"> <a href="<?= BASE_URL ?>admin/deleteproject/<?= $project->identifier ?>">Supprimer</a> <a href="<?= BASE_URL ?>admin/editproject/<?= $project->identifier ?>">Modifier</a> </th>
                </tr>
                
            <?php endforeach; ?>
        </div>

    <?php endforeach; ?>
    </tbody>
</table>

<?php
    }

    if (isset($identifier)){
?>
<h2>Modification du projet <?= $project->title ?> d'identifiant <?= $identifier ?></h2>
<form method='post' id='ajout' action='' class='ligne'>
    <label for='title'>Titre du projet</label><input type='text' name='title' placeHolder="Titre du projet" value="<?= $project->title ?>" />
    <label for='category'>Catégorie </label><input type='text' name='category'  placeHolder="Catégorie du projet" value="<?= $project->category ?>" />
    <label for=''>Description du projet</label>
    <div id='editor'><?= $project->content ?? '' ?></div>
    <label for='dateProject'>Date du projet</label><input type='text' name='dateProject'  placeHolder="Date du projet" value="<?= $project->dateProject ?>" />
    <label for='imageName'>Nom de l'image </label><input type='text' name='imageName'  placeHolder="Nom de l'image" value="<?= $project->imageName ?>" />
    <input type='submit' name='submitProject' class='envoi' />
</form>

<?php 
    }
?>


<script>
var toolbarOptions = [
    ['bold', 'italic', 'underline', 'strike'],
    ['link', 'image', 'video'],

    [{
        'size': ['small', false, 'large', 'huge']
    }],
    [{
        'color': []
    }, {
        'background': []
    }],
    [{
        'align': []
    }],

    ['formula', 'blockquote', 'code-block'],

    [{
        'list': 'ordered'
    }, {
        'list': 'bullet'
    }],
    [{
        'script': 'sub'
    }, {
        'script': 'super'
    }],
    [{
        'indent': '-1'
    }, {
        'indent': '+1'
    }],

    ['clean']
];
var quill = new Quill('#editor', {
    theme: 'snow',
    modules: {
        toolbar: toolbarOptions
    }
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {
  const form = document.getElementById("ajout");

  // On vérifie que le formulaire existe pour éviter les erreurs
  if (form) {
    form.addEventListener("submit", function () {
      // Récupération du contenu HTML de l'éditeur
      const editor = document.querySelector('.ql-editor');
      const hvalue = editor ? editor.innerHTML : "";

      // Ajout du textarea invisible à la fin du formulaire
      this.insertAdjacentHTML(
        'beforeend', 
        "<textarea name='contentProject' style='display:none'>" + hvalue + "</textarea>"
      );
    });
  }
});
</script>
<?php $content = ob_get_clean(); ?>

<?php require('src/views/layout.php') ?>