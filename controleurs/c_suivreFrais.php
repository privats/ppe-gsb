<?php
include("vues/v_sommaire.php");
$idVisiteur = $_SESSION['idVisiteur'];
$action = $_REQUEST['action'];
switch($action){
	case 'selectionnerVisiteur':{
		$lesVisiteurs=$pdo->getVisiteurs();
                $lesMois=$pdo->getLesMois();
		// Afin de sélectionner par défaut le dernier mois dans la zone de liste
		// on demande toutes les clés, et on prend la première,
		// les mois étant triés décroissants
                include("vues/v_listeVisiteurs.php");
		break;
	}
        case 'valFrais':{

            $lesVisiteurs=$pdo->getVisiteurs();
            $lesMois=$pdo->getLesMois();
            $leVisiteur = $_REQUEST['listVisiteur'];
            $leMois = $_REQUEST['listMois'];
            $moisASelectionner = $leMois;
            $visiteurASelectionner = $leVisiteur;
            include("vues/v_listeVisiteurs.php");
            $idSelectionne = $pdo->getIdSelectionne($leVisiteur);
            $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idSelectionne,$leMois);
            $lesFraisForfait= $pdo->getLesFraisForfait($idSelectionne,$leMois);
            $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idSelectionne,$leMois);
            $numAnnee =substr( $leMois,0,4);
            $numMois =substr( $leMois,4,2);
            $libEtat = $lesInfosFicheFrais['libEtat'];
            $montantValide = $lesInfosFicheFrais['montantValide'];
            $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
            $dateModif =  $lesInfosFicheFrais['dateModif'];
            $dateModif =  dateAnglaisVersFrancais($dateModif);
            include("vues/v_suivreFrais.php");
        }
}
?>