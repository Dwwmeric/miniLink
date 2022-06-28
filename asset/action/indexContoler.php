<?php
// CONNEXION DATABASE
require('dataBase.php');
// IS RECEIVED SHORTCUT
// if(isset($_GET['q'])){

// 	// VARIABLE
// 	$shortcut = htmlspecialchars($_GET['q']);

// 	// IS A SHORTCUT ?
// 	$bdd = new PDO('mysql:host=localhost;dbname=bitly;charset=utf8', 'root', '');
// 	$req =$bdd->prepare('SELECT COUNT(*) AS x FROM links WHERE shortcut = ?');
// 	$req->execute(array($shortcut));

// 	while($result = $req->fetch()){

// 		if($result['x'] != 1){
// 			header('location: ../?error=true&message=Adresse url non connue');
// 			exit();
// 		}

// 	}

// 	// REDIRECTION
// 	$req = $bdd->prepare('SELECT * FROM links WHERE shortcut = ?');
// 	$req->execute(array($shortcut));

// 	while($result = $req->fetch()){

// 		header('location: '.$result['url']);
// 		exit();

// 	}

// }

// IS SENDING A FORM
if(isset($_POST['url'])) {
	
	// VARIABLE
	$url = $_POST['url'];
	
	// VERIFICATION SI URL EXISTE PAS 
	if(!filter_var($url, FILTER_VALIDATE_URL)) {
		// PAS UN LIEN
			header('location: ../../index.php?error=true&message=Adresse url non valide');
		 	exit();
	 }
		
	// RACCOURCIE
	$linkCut = crypt($url, rand());
	
	// SI EXIST UNE FOIS ?
	$req = $bdd->prepare('SELECT COUNT(*) AS x FROM links WHERE url = ?');
	$req->execute(array($url));
	
	while($result = $req->fetch()){

		$req->closeCursor();
		
		// if($result['x'] != 0){
			// 	header('location: ../../index.php?error=true&message=Adresse déjà raccourcie');
			// 	exit();
			// }
			
		}
		
		// SAUVEGARDE BDD URL 
		$req = $bdd->prepare('INSERT INTO links(url, lite_url) VALUES(?, ?)');
		$req->execute(array($url, $linkCut));
		
		header('location: ../../index.php?short='.$linkCut);
		exit();
		
}
