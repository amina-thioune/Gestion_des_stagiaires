<?php 
        require_once("identifier.php");
        require_once ('connexionbd.php');
        //pour recupErer l'id, le nom et le niveau de la filiere 
        $idf=isset($_GET['idF'])?$_GET['idF']:0;
        $requete="select * from filiere where idFiliere=$idf";
        $resultat=$pdo->query($requete);
        $filiere=$resultat->fetch();
        $nomf=$filiere['nomFiliere'];
        $niveau=strtolower($filiere['niveau']);

?> 

<!DOCTYPE HTML>
<HTMl>
<head>
        <meta charset="utf-8">
        <title>Edition d'une filière</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel = "stylesheet" href = "../css/bootstrap/css/bootstrap.css">
		<link rel = "stylesheet" href = "../css/monstyle.css">
    </head>

    <body>
        <?php include("menu.php") ; ?>
       
        <div class="container">

            <div class="panel panel-primary margetop">
                 <div class="panel-heading">Edition de la filière </div>
                <div class="panel-body">
                    <form method="post" action="updateFiliere.php" class="form">

                        <div class="form-group">
                            <label for="niveau"> id de la filiere:  <?php echo $idf ?> </label> 
                            <input type="hidden" name="idF" class="form-control" value="<?php echo $idf ?>">
                        </div> 

                        <div class="form-group">
                            <label for="niveau"> Nom de la filiere:</label>
                            <input type="text" name="nomF" placeholder="Nom de la filiere" class="form-control" value="<?php echo $nomf ?>">
                        </div> 

                        <div class="form-group">
                            <label for="niveau"> Niveau :</label> 
                            <select name="niveau" class="form-control" id="niveau">
                                <option value="m" <?php  if ($niveau=="m") echo "selected" ?> >Master</option>
                                <option value="l" <?php  if ($niveau=="l") echo "selected" ?> >Licence</option>
                                <option value="ts" <?php  if ($niveau=="ts") echo "selected" ?> >Technicien specialise</option>
                                <option value="t" <?php  if ($niveau=="t") echo "selected" ?> >Technicien</option>
                                <option value="q" <?php  if ($niveau=="q") echo "selected" ?> >Qualification</option>
                            </select>
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
