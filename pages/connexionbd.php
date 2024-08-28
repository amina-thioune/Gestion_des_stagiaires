 <?php
     $host = 'localhost';
     $dbname = 'gestion_stagiaire';
     $username = 'votre_utilisateur';
     $password = 'votre_mot_de_passe';

     try {
          $pdo=new PDO("mysql:host=localhost;dbname=gestion_stagiaire","root","");
         //$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
      } catch(Exception $e) {
            die('Erreur de connexion:' .$e->getMessage());
       }
     ?>