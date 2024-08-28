<?php 
        require_once("identifier.php");
        require_once ('connexionbd.php');

        $nomf=isset($_POST['nomF'])?$_POST['nomF']:"";
        $niveau=isset($_POST['niveau'])?strtoupper($_POST['niveau']):"";

        $requete="insert into filiere(nomFiliere,niveau) values(?,?)";
        $params=array($nomf,$niveau);
        $resultat=$pdo -> prepare ($requete);
        $resultat -> execute ($params);

        //retourner a la page filiere
        header('location:filieres.php')
?> 
