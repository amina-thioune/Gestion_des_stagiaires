<?php 
    require_once("identifier.php");
?>
<!DOCTYPE HTML>
<HTMl>
<head>
        <meta charset="utf-8">
        <title>Nouvelle Filière</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel ="stylesheet"  href = "../css/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../css/monstyle.css">
</head>

   

    <body>
        <?php include("menu.php") ; ?>
       
        <div class="container" style = "flex :1">

            <div class="panel panel-primary margetop">
                 <div class="panel-heading">Veillez saisir les données de la nouvelle filière </div>
                <div class="panel-body">
                    <form method="post" action="insertFiliere.php" class="form">

                        <div class="form-group">
                            <label for="niveau"> Nom de la filiere:</label> 
                            <input type="text" name="nomF" placeholder="Nom de la filiere" class="form-control">
                        </div> 

                        <div class="form-group">
                            <label for="niveau"> Niveau :</label> 
                            <select name="niveau" class="form-control" id="niveau">
                                <option value="m">Master</option>
                                <option value="l">Licence</option>
                                <option value="ts" selected>Technicien specialise</option>
                                <option value="t">Technicien</option>
                                <option value="q">Qualification</option>
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

        <footer>
        <?php include "footer.php" ?>
        </footer>

    </body>
</HTMl>
