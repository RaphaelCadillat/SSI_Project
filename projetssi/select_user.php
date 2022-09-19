<?php
        
        try{
            $option = [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];
        
            //Preparation des requetes PDO
            $PDO = new PDO($DB_DSN,$DB_USER,$DB_PASS);

            $selusers = $PDO->prepare("SELECT * FROM utilisateurs");
            $selusers->execute();
            $data_selusers = $selusers->fetchAll();
        }
        catch(PDOException $pe){
            echo 'ERREUR : '.$pe->getMessage();
        }


        for($i=0;$i<sizeof($data_selusers);$i++){
            echo '<div>'. $data_selusers[$i]["Nom"] . $data_selusers[$i]["Prenom"] . $data_selusers[$i]["Datedenaissance"] 
            . $data_selusers[$i]["NumeroCB"] . $data_selusers[$i]["Ville"] .
            '</div>';

        }
        ?>