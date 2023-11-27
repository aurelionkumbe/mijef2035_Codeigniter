	<?php
		require_once("aut/bdconnect.php");
		require_once("aut/session.php");
	?>
	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th> N°</th>
                <th> Avatar</th>
                <th> Pseudonyme</th>
                <th> Téléphone</th>                               
                <th> Type d'utilisation</th>                               
                <th> Type de compte</th>                               
                <th> Statut</th>
                <th> Action</th>
            </tr>
        </thead>
        <tbody>
	<?php
		$rue="";
		$params = explode('=',$_SERVER['HTTP_REFERER']);
		if(isset($params[1])){
			$pools = explode('%',$params[1]);
			$rue = $pools[0];
		}			
		
		$i = 1;
		if(!empty($rue))
			{
				if($rue == 1)
					{
						$reponse = $bdd ->query('SELECT * FROM kh_user WHERE statut != 0 ORDER BY nom_user ASC');
					}
				elseif($rue == 2)
					{
						$reponse = $bdd ->query('SELECT * FROM kh_user WHERE statut = 0 ORDER BY nom_user ASC');
					}
			}
		else
			{			
				$reponse = $bdd ->query('SELECT * FROM kh_user  ORDER BY nom_user ASC');
			}
		
		while ($donnees = $reponse ->fetch())
		   {
				$id = $donnees['id_user'];
                $avatar = $donnees['avatar'];
                $pseudo = $donnees['pseudo'];
                $tel = $donnees['telephone'];
                $tusr = $donnees['type_user'];
                $tcpt = $donnees['type_compte'];
                $stat = $donnees['statut'];
                $tuser = "";
                $tcompte = "";
				
				if($stat != 0){ $statu = 'fa fa-check-circle-o'; $btn = 'fa fa-times  fa-fw'; $clr = 'btn-warning';}
                else{ $statu = 'fa fa-times-circle-o'; $btn = 'fa fa-check  fa-fw'; $clr = 'btn-success';}
				
					if($tusr == 0){ $tuser = 'Aucun'; }
					elseif($tusr == 1){ $tuser = 'Offre de service'; }
					elseif($tusr == 2){ $tuser = 'Demande de service'; }

					if($tcpt == 0){ $tcompte = 'Classique'; }
					elseif($tcpt == 1){ $tcompte = 'Premuim'; }
				
							echo '<tr>';
                            echo '<td>'.$i.'</td>';
                            echo '<td><span class="photo">
                                        <img id="affslide" alt="Avatar" src="../img/avatar/'.$avatar.'">
                                    </span></td>';
                            echo '<td>'.$pseudo.'</td>';
                            echo '<td>'.$tel.'</td>';
                            echo '<td>'.$tuser.'</td>';
                            echo '<td>'.$tcompte.'</td>';
                            echo '<td><i class="fa '.$statu.'"></i></td>';
                            echo '<td class="action"><div class="btn-group">
							<button class="btn btn-primary" onclick="affich(1,'.$id.');" data-toggle="modal"><i class="fa fa-edit"></i></button>';
							if($_SESSION['pass'] != 3){ echo '<button id="pub" class="btn '.$clr.'" onclick="affich(2,'.$id.');"><i class="'.$btn.'"></i></button>';}
							echo '<button id="sup" class="btn btn-danger" onclick="affich(3,'.$id.');"><i class="fa fa-trash"></i></button>
					</div></td>';
				echo '</tr>';
			
				$i++ ;
			}
		$reponse->closeCursor();
	?>
	</tbody>
</table>