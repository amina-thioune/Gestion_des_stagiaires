<?php 
        require_once("identifier.php");
        require_once ('connexionbd.php');

        $requeteF="select * from filiere";
        $resultatF=$pdo->query($requeteF);
?> 

<!DOCTYPE HTML>
<HTMl>
<head>
        <meta charset="utf-8">
        <title>Nouveau Stagiaire</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel = "stylesheet"  href = "../css/bootstrap/css/bootstrap.css">
		<link rel = "stylesheet"  href = "../css/monstyle.css">
    </head>

    <body>
        <?php include("menu.php") ; ?>
       
        <div class="container">

            <div class="panel panel-primary">
                 <div class="panel-heading">Veillez saisir les données du nouveau stagiaire </div>
                    <div class="panel-body">
                        <form method="post" action="insertStagiaire.php" class="form" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="nom"> Nom :</label>
                                <input type="text" name="nom" placeholder="Nom" class="form-control" >
                            </div> 

                            <div class="form-group">
                                <label for="prenom"> Prenom :</label>
                                <input type="text" name="prenom" placeholder="Prénom" class="form-control">
                            </div> 

                            <div class="form-group">
                                <label for="civilite"> Cvilite :</label>
                                <div class="radio">
                                    <label><input type="radio" name="civilite" value="F" checked> F </label> <br>
                                    <label><input type="radio" name="civilite" value="M"> M </label>
                                </div>
                            </div> 

                            <div class="form-group">
                                <label for="filiere"> Filière :</label> 
                                <select name="filiere" class="form-control" id="filiere">
                                    <?php  while($filiere=$resultatF->fetch()) {?>
                                        <option value="<?php echo $filiere['idFiliere']?>">
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
        </div> 

        <?php include("footer.php") ; ?>

    </body>
</HTMl>
