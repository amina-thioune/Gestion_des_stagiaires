<?php 
        require_once("identifier.php");
        require_once ('connexionbd.php');
        //pour recupErer l'id, le nom et le niveau de la filiere 
        $idS=isset($_GET['idS'])?$_GET['idS']:0;
        $requeteS="select * from stagiaire where idStagiaire=$idS";
        $resultatS=$pdo->query($requeteS);
        $stagiaire=$resultatS->fetch();
        $nom=$stagiaire['nom'];
        $prenom=$stagiaire['prenom'];
        $civilite=strtoupper($stagiaire['civilite']);
        $idFiliere=$stagiaire['idFiliere'];
        $nomPhoto=$stagiaire['photo'];
       
        $requeteF="select * from filiere";
        $resultatF=$pdo->query($requeteF);

?> 

<!DOCTYPE HTML>
<HTMl>
<head>
        <meta charset="utf-8">
        <title>Edition d'un stagiaire</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel = "stylesheet" href = "../css/bootstrap/css/bootstrap.css">
		<link rel = "stylesheet" href = "../css/monstyle.css">
    </head>

    <body>
        <?php include("menu.php") ; ?>
       
        <div class="container">

            <div class="panel panel-primary">
                 <div class="panel-heading">Edition du stagiaire </div>
                <div class="panel-body">
                    <form method="post" action="updateStagiaire.php" class="form" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="niveau"> id du stagiaire:  <?php echo $idS ?> </label> 
                            <input type="hidden" name="idS" class="form-control" value="<?php echo $idS ?>">
                        </div> 

                        <div class="form-group">
                            <label for="nom"> Nom :</label>
                            <input type="text" name="nom" placeholder="Nom" class="form-control" value="<?php echo $nom ?>">
                        </div> 

                        <div class="form-group">
                            <label for="prenom"> Prenom :</label>
                            <input type="text" name="prenom" placeholder="Prénom" class="form-control" value="<?php echo $prenom ?>">
                        </div> 

                        <div class="form-group">
                            <label for="civilite"> Cvilite :</label>
                            <div class="radio">
                                <label><input type="radio" name="civilite" value="F"
                                    <?php if($civilite==="F") echo "checked" ?> checked> F </label> <br>
                                <label><input type="radio" name="civilite" value="M"
                                    <?php if($civilite==="M") echo "checked" ?> > M </label>
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="filiere"> Filière :</label> 
                            <select name="filiere" class="form-control" id="filiere">
                                <?php  while($filiere=$resultatF->fetch()) {?>
                                    <option value="<?php echo $filiere['idFiliere']?>" <?php if($idFiliere===$filiere['idFiliere']) echo "selected" ?>>
                                        <?php echo $filiere['nomFiliere']?>
                                    </option>
                                <?php }?>
                            </select>
                        </div>
                         
                        <div class="form-group">
                            <label for="photo"> Photo :</label>
                            <input type="file" name="photo">
                        </div> 

                        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-save"> </span>
                            Enregistrer
                        </button>
                    </form>
                </div>
            </div>
            
        </div> 

        <?php include("footer.php") ; ?>

    </body>
</HTMl>
