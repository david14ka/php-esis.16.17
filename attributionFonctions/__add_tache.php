<?php 
	require_once('tache.class.php');
	require_once('tache.dao.php');


	if (isset($_POST['description'], $_POST['datedebut'], $_POST['datefin'], $_POST['idagent']) 
		and !empty($_POST['description']) and !empty($_POST['datedebut']) and !empty($_POST['datefin']) and !empty($_POST['idagent'])) {

	$uneTache = new Tache(0, $_POST['description'], $_POST['datedebut'], $_POST['datefin'], $_POST['idagent']);
	$tdao = new TacheDAO();
	$lt = $tdao->getAllTache();
	$find = false;
	foreach ($lt as $t) {
		if ($uneTache->getDescription() == $t->getDescription()) {
			$find = true;
		}
	}
	if (!$find) {
		$tdao->ajouterTache($uneTache);
		header('Location: taches.php');
	}
		
	}else{
		echo 'Données manquantes';
	}
 ?>