<?php $title = "Les M&Ms en vadrouille"; ?>

<?php ob_start(); ?>
<h1>Page de connexion à l'espace administrateur</h1>

<form method="post" action="" class="colonne">
	<div class="titre">Connexion</div>
	<div class="sous_titre">Connectez-vous pour faire votre propre chasse aux nains !</div>

	<label for="pseudo">Identifiant (E-mail ou pseudo)</label>
	<input type="text" name="pseudo" id="pseudo" placeholder="Identifiant" required />
	<label for="mdp">Mot de Passe</label>
	<div class="conteneur_formulaire">
		<input type="password" name="mdp" id="mdp" placeholder="Mot de passe" required />
		<span id="oeil" onclick="changeStyleEyes()" class="fas fa-eye"></span>
	</div>

	<!-- <div class="justifie"><a href="">Mot de passe oublié ?</a></div> -->

	<input type="submit" value="Se connecter" name="connexion" class="envoi "/>
</form>
    
<?php $content = ob_get_clean(); ?>

<?php require('src/views/layout.php') ?> 
