<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8" />
        <title>Projet SSI</title>
        <link rel="stylesheet"href="../Styles/signup.css" />
    </head>
    <body>
    <body>
    <h1>Projet Sécurité Système d'Information</h1>

    <form method="POST" action="">
        <input type="txt" name="description" placeholder="description" required/>
        <input type="txt" name="id_utilisateur" placeholder="id_utilisateur" required/>
        <button type="submit" name="comment">Envoyer</button>

            
   
             <?php include("insert_comment.php"); ?> 
            <br>
            
    </form>
    <form method="POST" action="">
    <input type = "txt" name ="id_req" placeholder="id delete" >
    <button type="submit" name="delete_comment">Supprimer un utilisateur de la base de donnée</button>
    <?php include("delete_comment.php"); ?>
    </form>
    </div>
    <?php include("select_comment.php"); ?>
    </body>
</html>