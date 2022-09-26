<?php
        
        try{
            $option = [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];
        
            //Preparation des requetes PDO
            $PDO = new PDO($DB_DSN,$DB_USER,$DB_PASS);

            $selcomment = $PDO->prepare("SELECT * FROM commentaire");
            $selcomment->execute();
            $data_selcomment = $selcomment->fetchAll();
        }
        catch(PDOException $pe){
            echo 'ERREUR : '.$pe->getMessage();
        }

        echo '<div class="containeruser">';
        for($i=0;$i<sizeof($data_selcomment);$i++){
            echo '<div class="card">'. $data_selcomment[$i]["description"] ."<br>". $data_selcomment[$i]["id_utilisateur"] .
            '</div>';
        }
        ?>