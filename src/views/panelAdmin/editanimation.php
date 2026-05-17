<?php $title = "Panel Administrateur"; ?>

<?php ob_start(); ?>
<h1>Modification d'une animation par l'administateur <?= $_SESSION['name'] ?></h1>

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

<h2>Liste des animations</h2>

<table>
    <caption>Liste des animations</caption>

    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">title</th>
            <th scope="col">date_animation</th>
            <th scope="col">content</th>
            <th scope="col">image_name</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>

    <tbody>

            <?php foreach ($animations as $animation): ?>
                <tr>
                    <th scope="row"><?= $animation->identifier ?></th>
                    <th scope="row"><?= $animation->title ?></th>
                    <th scope="row"><?= $animation->dateAnimation ?></th>
                    <th scope="row"><?= $animation->content ?></th>
                    <th scope="row"><?= $animation->imageName ?></th>
                    <th scope="row"> <a href="<?= BASE_URL ?>admin/deleteanimation/<?= $animation->identifier ?>">Supprimer</a> <a href="<?= BASE_URL ?>admin/editanimation/<?= $animation->identifier ?>">Modifier</a> </th>
                </tr>
                
            <?php endforeach; ?>
       

    </tbody>
</table>

<?php
    }

    if (isset($identifier)){
?>
<h2>Modification de l'animation <?= $animation->title ?> d'identifiant <?= $identifier ?></h2>
<form method='post' id='ajout' action='' class='ligne'>
    <label for='title'>Titre de l'animation</label><input type='text' name='title' placeHolder="Titre du projet" value="<?= $animation->title ?>" />
    <label for=''>Description de l'animation</label>
    <div id='editor'><?= $animation->content ?? '' ?></div>
    <label for='dateAnimation'>Date de l'animation</label><input type='date' name='dateAnimation' value="<?= $animation->dateAnimation ?>" />
    <label for='imageName'>Nom de l'image </label><input type='text' name='imageName'  placeHolder="Nom de l'image" value="<?= $animation->imageName ?>" />
    <input type='submit' name='submitAnimation' class='envoi' />
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
        "<textarea name='contentAnimation' style='display:none'>" + hvalue + "</textarea>"
      );
    });
  }
});
</script>
<?php $content = ob_get_clean(); ?>

<?php require('src/views/layout.php') ?>