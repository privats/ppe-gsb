<div id="contenu">

    <h2>Validation des frais par visiteur</h2>
    <form action="index.php?uc=validerFrais&action=valFrais" method="post">
        <label class="titre">Choisir le visiteur :</label>

        <select id="listVisiteur" name="listVisiteur" class="zone">
            <?php
            foreach ($lesVisiteurs as $unVisiteur) {
                $nom = $unVisiteur['nom'];
                if ($nom == $visiteurASelectionner) {
                    echo'<option selected value="'.$nom.'">'.$nom.'</option>';
                } else {
                    echo '<option value="' . $nom . '">' . $nom . '</option>';
                }
            }
            ?>
        </select>

        <label class="titre">Mois :</label> 
        <select id="listMois" name="listMois">  
            <?php
            foreach ($lesMois as $unMois) {
                $mois = $unMois['mois'];
                $numAnnee = $unMois['numAnnee'];
                $numMois = $unMois['numMois'];
                if ($mois == $moisASelectionner) {
                    ?>
                    <option selected value="<?php echo $mois ?>"><?php echo $numMois . "/" . $numAnnee ?> </option>
                    <?php
                } else {
                    ?>
                    <option value="<?php echo $mois ?>"><?php echo $numMois . "/" . $numAnnee ?> </option>
                    <?php
                }
            }
            ?>    
        </select>   


        <div class="piedForm">
            <p>
                <input id="ok" type="submit" value="Valider" size="20" />
                <input id="annuler" type="reset" value="Effacer" size="20" />
            </p>
        </div>

    </form>