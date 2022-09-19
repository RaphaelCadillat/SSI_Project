<?php 

$DB_DSN ='mysql:host=localhost;dbname=projet_ssi';
$DB_USER = 'root';
$DB_PASS = '';

try{
    $option = [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    //Preparation des requetes PDO
    $PDO = new PDO($DB_DSN,$DB_USER,$DB_PASS);

    if(isset($_POST['sign_up']))
    {
        //Securisation des données rentrées
        $first_name = htmlentities($_POST['prenom']); //$PDO->quote();
        $last_name = htmlentities($_POST['nom']);
        $date = htmlentities($_POST['date']);
        $CBNumber = htmlentities($_POST['cbNumber']);
        $ville = htmlentities($_POST['ville']);


        //Verification des longueurs des champs

        if(strlen($first_name) >30 || strlen($last_name) > 30)
        {
            echo"<script>alert('First and last names must to be less than 30 characters each one')</script>";
            exit();
        }

        if(strlen($CBNumber) != 16)
        {
            echo"<script>alert('CBnumber must be 16 characters')</script>";
            exit();
        }

        if(strlen($ville) > 30)
        {
            echo"<script>alert('Ville ')</script>";
            exit();
        }



        //Insertion des données dans la base sql
        $insert_user_cmd = 'INSERT INTO `utilisateurs` (`Nom`, `Prenom`, `Datedenaissance`, `NumeroCB`, `Ville`) VALUES(?, ?, ?, ?, ?)';
        $insert_user = $PDO->prepare($insert_user_cmd);
        $insert_user->bindValue(1, $first_name);
        $insert_user->bindValue(2, $last_name);
        $insert_user->bindValue(3, $date);
        $insert_user->bindValue(4, $CBNumber);
        $insert_user->bindValue(5, $ville);
        $insert_user->execute();


        
        //Finalisation de la requete
        if($insert_user)
        {
            echo "<script>alert('Good $first_name, your account is created')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
        else{
            echo "<script>alert('Too bad, registration failed :-/')</script>";
            echo "<script>window.open('index.php','_self')</script>";
            //rajouter la fonction de suppression de compte
        }
    }


}
catch(PDOException $pe){
    echo 'ERREUR : '.$pe->getMessage();
}