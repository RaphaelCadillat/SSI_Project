<?php 

try{
    $option = [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    //Preparation des requetes PDO
    $PDO = new PDO($DB_DSN,$DB_USER,$DB_PASS);

    if(isset($_POST['delete_comment']))
    {
        $id_req = htmlentities($_POST['id_req']);
        
    
    $supp_user = $PDO->prepare("DELETE FROM commentaire WHERE id = :req_id");
    $supp_user->bindValue(':req_id',$id_req);
    $supp_user->execute();
    if($supp_user)
    {
        echo "<script>alert('id $id_req deleted ')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
    else{
        echo "<script>alert('Too bad, it failed :-/')</script>";
        echo "<script>window.open('index.php','_self')</script>";
        //rajouter la fonction de suppression de compte
    }
}}
catch(PDOException $pe){
    echo 'ERREUR : '.$pe->getMessage();
} 
?>