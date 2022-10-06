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

    if(isset($_POST['comment']))
    {
        //Securisation des données rentrées
        $description = htmlentities($_POST['description']); //$PDO->quote();
        $id_utilisateur = htmlentities($_POST['id_utilisateur']);

        $verif_user = $PDO -> prepare("SELECT * from utilisateurs where id= :id_utilisateur");
        $verif_user -> bindValue(':id_utilisateur',$id_utilisateur);
        $verif_user -> execute();
       
        if($verif_user->rowCount()==0){

            echo"<script>alert('Impossible, utilisateur non existant')</script>";
        
        }
        else{

            if(strlen($description) >120)
            {
                echo"<script>alert('Description trop longue')</script>";
                exit();
            }
    
            
    
            //Insertion des données dans la base sql
            $insert_comment_cmd = 'INSERT INTO `commentaire` (`description`, `id_utilisateur`) VALUES(?, ?)';
            $insert_comment = $PDO->prepare($insert_comment_cmd);
            $insert_comment->bindValue(1, $description);
            $insert_comment->bindValue(2, $id_utilisateur);
            $insert_comment->execute();
    
    
            
            //Finalisation de la requete
            if($insert_comment)
            {
                echo "<script>alert('Good , your comment is created')</script>";
                echo "<script>window.open('commentaires.php','_self')</script>";
            }
            else{
                echo "<script>alert('Too bad, comment failed :-/')</script>";
                echo "<script>window.open('commentaires.php','_self')</script>";
                
            }
        }
    

        }
        

       

}
catch(PDOException $pe){
    echo 'ERREUR : '.$pe->getMessage();
}