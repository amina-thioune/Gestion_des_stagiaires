<?php 
        require_once("identifier.php");
        require_once("connexionbd.php");

        $nomF=isset($_GET['nomF'])?$_GET['nomF']:"";
        $niveau=isset($_GET['niveau'])?$_GET['niveau']:"all";

        //declarer la taille d'affichage
        $size=isset($_GET['size'])?$_GET['size']:6;
        //declarer le nombre de page
        $page=isset($_GET['page'])?$_GET['page']:1;
        $offset=($page-1)*$size ;


        if($niveau=="all") {  
                $requete="select * from filiere 
                          where nomFiliere like '%$nomF%' 
                          limit $size 
                          offset $offset"; // nombre de ligne saute
                          

                //requete pour compter le nombre de filiere
                $requeteCount="select count(*) countF from filiere
                               where nomFiliere like '%$nomF%'";
        } else {
                $requete="select * from filiere 
                          where nomFiliere like '%$nomF%'
                          and niveau='$niveau' 
                          limit $size 
                          offset $offset ";
                $requeteCount="select count(*) countF from filiere
                               where nomFiliere like '%$nomF%' 
                               and niveau='$niveau' ";
        }

        $resultatF=$pdo->query($requete);

        //executer la requete pour compter
        $resultatCount=$pdo->query($requeteCount);
        //recuperer la ligne contenant le resultat(tableau associatif)
        $tabCount=$resultatCount->fetch();
        //recuperer la valeur du tableau associatif
        $nbrFiliere=$tabCount['countF'];
        //operateur modulo: le reste de la division euclidienne 
        //de $nbrFiliere par $size
        $reste=$nbrFiliere % $size ;

        if($reste===0) //$nbrFiliere est un multiple de $size 
            $nbrPage=$nbrFiliere/$size;
        else
            $nbrPage=floor ($nbrFiliere/$size)+1; //floor: partie entiere d'un nombre decimal

?>

<!DOCTYPE HTML>
<HTMl>
    <head>
        <meta charset="utf-8">
        <title>Gestion des filieres</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel ="stylesheet"  href = "../css/bootstrap/css/bootstrap.css">
		<link rel ="stylesheet"  href = "../css/monstyle.css">
    </head>

    <body>
    <?php include("menu.php"); ?>
         
        <div class="container">
            <div class="panel panel-success">
                 <div class="panel-heading">Rechercher des filieres....</div>
                <div class="panel-body">
                     <form method="get" action="filieres.php" class="form-inline">
                        <div class="form-group">
                            <input type="text" name="nomF" placeholder="Nom de la filiere" class="form-control" value="<?php echo $nomF ?>">
                        </div> &nbsp
                        <label for="niveau"> Niveau :</label> 
                        <select name="niveau" class="form-control" id="niveau" onchange="this.form.submit()">
                            <option value="all" <?php if($niveau=="all") echo "selected" ?> >Tous les niveaux</option>
                            <option value="m"   <?php if($niveau=="m") echo "selected" ?>>Master</option>
                            <option value="l"   <?php if($niveau=="l") echo "selected" ?> >Licence</option>
                            <option value="ts"  <?php if($niveau=="ts") echo "selected" ?>>Technicien specialise</option>
                            <option value="t"   <?php if($niveau=="t") echo "selected" ?>>Technicien</option>
                            <option value="q"   <?php if($niveau=="q") echo "selected" ?>>Qualification</option>
                        </select>
                        &nbsp
                        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-search"> </span>
                            Chercher...
                        </button>
                         &nbsp &nbsp
                         <?php if($_SESSION['user']['role']=='ADMIN'){?>
                            <a href="nouvelleFiliere.php">
                            <span class="glyphicon glyphicon-plus"> </span>    
                            Nouvelle filiere</a>
                        <?php } ?>

                    </form>
                </div>
            </div>

            <div class="panel panel-primary">
                 <div class="panel-heading">Liste des filieres (<?php echo $nbrFiliere ?> Filières)</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id filiere</th>
                                <th>Nom Filiere</th>
                                <th>Niveau</th>
                                <?php if($_SESSION['user']['role']=='ADMIN') { ?>
                                    <th>Actions</th>
                                <?php } ?>
                                
                            </tr>
                        </thead>

                        <tbody>
                            <?php while($filiere=$resultatF->fetch()) { ?>
                                <tr>
                                    <td> <?php echo $filiere['idFiliere'] ?> </td>
                                    <td> <?php echo $filiere['nomFiliere'] ?> </td>
                                    <td> <?php echo $filiere['niveau'] ?> </td>
                                    <?php if($_SESSION['user']['role']=='ADMIN') { ?>
                                        <td>
                                            <a href="editerFiliere.php?idF=<?php echo $filiere['idFiliere']?>"> 
                                                <span class="glyphicon glyphicon-edit"></span> 
                                            </a>
                                            &nbsp
                                            <a onclick="return confirm('Etes-vous sur de vouloir supprimer la filiere')" href="supprimerFiliere.php?idF=<?php echo $filiere['idFiliere']?>"> 
                                                <span class="glyphicon glyphicon-trash"></span> 
                                            </a>
                                        </td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div>
                    <!--pagination de la page -->
                        <ul class="pagination">
                            <?php for($i=1;$i<=$nbrPage;$i++) { ?>
                                <li class="<?php if($i==$page) echo 'active'; ?>"> 
                                        <a href="filieres.php?page=<?php echo $i; ?>&nomF=<?php echo $nomF; ?>&niveau=<?php echo $niveau; ?>">
                                        <?php echo $i; ?>
                                     </a>
                                </li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
            </div>

        </div> 
         
        <?php include("footer.php"); ?>

    </body>
</HTMl>
