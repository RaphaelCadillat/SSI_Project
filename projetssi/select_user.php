<?php

        $DB_DSN ='mysql:host=localhost;dbname=projet_ssi';
        $DB_USER = 'user';
        $DB_PASS = 'niMBET)c7XG1uZnc';
        
        try{
            $option = [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];
        
            //Preparation des requetes PDO
            $PDO = new PDO($DB_DSN,$DB_USER,$DB_PASS);

            $selusers = $PDO->prepare("SELECT * FROM secure_utilisateurs");
            $selusers->execute();
            $data_selusers = $selusers->fetchAll();
        }
        catch(PDOException $pe){
            echo 'ERREUR : '.$pe->getMessage();
        }

        echo '<div class="containeruser">';
        for($i=0;$i<sizeof($data_selusers);$i++){
            $id_req = $data_selusers[$i]['id'];
            echo '<div class="card">'. $data_selusers[$i]["Nom"] ." ". $data_selusers[$i]["Prenom"]  
            . "<br>" . $data_selusers[$i]["Ville"] ."<br>". "<a class='delete' readonly='readonly' href='delete_user.php?id_req=". $id_req ."'>Delete user </a>" .
            '</div>' ;

        }
        ?>