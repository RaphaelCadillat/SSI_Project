<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8" />
        <title>Projet SSI</title>
        <link rel="stylesheet"href="utilisateur.css" />
    </head>
    <body>
    <body>
    <h1>Projet Sécurité Système d'Information</h1>
    <a href="index.php">Utilisateurs </a>
    <form method="POST" action="">
        <input type="txt" name="description" placeholder="description" required/>
        <input type="txt" name="id_utilisateur" placeholder="id_utilisateur" required/>
        <button type="submit" name="comment">Envoyer</button>

            
   
             <?php include("insert_comment.php"); ?> 
            <br>
            
    </form>
    
    <?php include("delete_comment.php"); ?>
    </div>
    <?php include("select_comment.php"); ?>
    </body>
</html>