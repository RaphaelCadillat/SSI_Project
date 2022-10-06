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

    
        $id_req = $_GET['id_req'];
        
    
    $supp_user = $PDO->prepare("DELETE FROM commentaire WHERE id = :req_id");
    $supp_user->bindValue(':req_id',$id_req);
    $supp_user->execute();
    if($supp_user)
    {
        echo "<script>alert('comment deleted ')</script>";
        echo "<script>window.open('commentaires.php','_self')</script>";
    }
    else{
        echo "<script>alert('Too bad, it failed :-/')</script>";
        echo "<script>window.open('commentaires.php','_self')</script>";
        //rajouter la fonction de suppression de compte
    }
}
catch(PDOException $pe){
    echo 'ERREUR : '.$pe->getMessage();
} 
?>