<h1><?= $page ?></h1>

<form method="POST" name="<?= $page ?>" action="">

<?php
if ($page == 'login'){
	if($_GET['token'] && $_GET['token'] !== '') {
		$pdo = getDB($dbuser, $dbpassword, $dbhost,$dbname);
		$req = $pdo->prepare('SELECT * FROM users WHERE token = ?');
		$req->execute($_GET['token']);
		$user = $req->fetch();
		$req2 = $pdo->prepare('UPDATE users SET verify = ?, token = ? WHERE token = ?');
		$req2->execute([true, '', $_GET['token']]);
		if($user) {
			setFlashMessages('info', 'Votre compte est bien activé');
		}
	}


	echo    input("mail", "Votre Courriel","", "email");
	echo   input("password", "Votre Mot De Passe","", "password");
	  	
}else if ($page == 'register'){
	echo    input("mailVerify", "Vérification De Votre Courriel","", "email").
			input("lastname", "Votre Nom","").
	 		input("firstname", "Votre Prénom","").
	 		input("address", "Votre Adresse","").
	 		input("zipCode", "Votre Code Postal","").
	 		input("city", "Votre Ville","").
	 		input("country", "Votre Pays","").
	 		input("phone", "Votre Numéro De Portable","", "tel").
	  		input("password", "Votre Mot De Passe","", "password").
	  		input("passwordVerify", "Confirmez Votre Mot De Passe","", "password");
}
	echo input("robot", "","", "hidden");
?>
  	<button type="submit">Envoyez</button>
</form>
<a href="index.php?p=reset">Mot de passe oublié</a>