
<?php 
    $page = "Utilisateurs en doublons";
    $eng = "Duplicates users";
    require_once("aut/bdconnect.php");
    require_once("aut/session.php");
    
    $tabuser = array();

    $reponse = $bdd ->query('SELECT * FROM kh_user');
    
    while ($donnees = $reponse ->fetch())
       {
            $tabuser[] = 
                    array(
                        'id' => $donnees["id_user"],
                        'nom' => $donnees["nom_user"],
                        'pnom' => $donnees["prenom"],
                        'pseudo' => $donnees["pseudo"],
                        'tel' => $donnees["telephone"],
                        'kwat' => $donnees["kh_kwata_id"],
                        'secto' => $donnees["secto"]

                    );
        }
    $reponse->closeCursor();
    $nbre = count($tabuser);

    for($i = 0; $i < $nbre-1; $i++)
        {
            for($j = $i+1; $j < $nbre; $j++)
                {
                    if($tabuser[$i]['tel']==$tabuser[$j]['tel'] && ($tabuser[$i]['tel'] != 0))
                        {
                            $reponse = $bdd ->prepare('DELETE FROM kh_user WHERE id_user = ?');
                            $reponse ->execute(array($tabuser[$j]['id']));
                            
                        }
                }
        }
        header('location: liste_doublon.php');
    ?>