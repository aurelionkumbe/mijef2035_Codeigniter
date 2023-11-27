<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js">	
	</script>
</head>
<body>

<div class"container-fluid">
	<form class="col-md-offset-3 col-md-6">
  <div class="form-group col-md-12">
   <label for="Email1">Email address</label>
    <input type="email" class="form-control" id="Email" name="email" placeholder="Email">
  </div>
  <div class="form-group col-md-12">
  	<div class="col-md-6">
		  	<div class="row input-group" style="width: 100%">
			  	<label for="nom">Nom</label>
			    <input type="text" class="form-control" id="nom" name="nom"  placeholder="Nom" style="width: 100%"/>
	    	</div> 
	</div>
	<div class="col-md-6">
		  	
	    	<div class="row input-group" style="width: 100%">
			  	<label for="prenom">Prenom</label>
			    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prenom" style="width: 100%">
	    	</div>
	</div>
	   
  </div>
  <div class="form-group col-md-12">
    <div class="btn-group" data-toggle="buttons">
  <label class="btn btn-primary active">
    <input type="radio" name="sexe" id="option2" autocomplete="off" value="M"> homme
  </label>
  <label class="btn btn-primary">
    <input type="radio" name="sexe" id="option3" autocomplete="off" value="F"> femme
  </label>
</div>
  </div>
  <div class="form-group col-md-12">
    <label for="datenaiss">Datenaiss</label>
    <input type="text" class="form-control" id="datenaiss" name="dateNaissance" placeholder="datenaiss">
  </div>
  <div class="form-group col-md-12">
    <label for="Password">Password</label>
    <input type="password" class="form-control" id="Password" name="motdepasse" placeholder="Mot de passe">
  </div>
  <div class="form-group col-md-12">
    <label for="telephone">Telephone</label>
    <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="Telephone">
  </div>
  <div class="form-group col-md-12">
    <label for="etablissement">Etablissement</label>
    <input type="text" class="form-control" id="etablissement" name="etablissement"placeholder="Etablissement">
  </div>
  <div class="form-group col-md-12">
    <label for="residence">Residence</label>
    <input type="residence" class="form-control" id="residence" name="adresse" placeholder="Residence">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</body>
</html>