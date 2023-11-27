	<?php
		require_once("aut/bdconnect.php");
		require_once("aut/session.php");
	?>
	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th> N°</th>
                <th> Nom du metier</th>                              
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
			if($rue == 1)
				{
					$reponse = $bdd ->query('SELECT * FROM kh_metier WHERE statut != 0 ORDER BY nom_metier ASC');
				}
			elseif($rue == 2)
				{
					$reponse = $bdd ->query('SELECT * FROM kh_metier WHERE statut = 0 ORDER BY nom_metier ASC');
				}
			else
				{			
					$reponse = $bdd ->query('SELECT * FROM kh_metier ORDER BY nom_metier ASC');	
				}
			
			while ($donnees = $reponse ->fetch())
			   {
					$id = $donnees['id_metier'];
					$nom = $donnees['nom_metier'];
					$stat = $donnees['statut'];
					
					if($stat != 0){ $statu = 'fa fa-check-circle-o'; $btn = 'fa fa-times  fa-fw'; $clr = 'btn-warning';}
                    else{ $statu = 'fa fa-times-circle-o'; $btn = 'fa fa-check  fa-fw'; $clr = 'btn-success';}
					
						
					echo '<tr>';
					echo '<td>'.$i.'</td>';
					echo '<td>'.$nom.'</td>';
					echo '<td><i class="'.$statu.'"></i></td>';
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