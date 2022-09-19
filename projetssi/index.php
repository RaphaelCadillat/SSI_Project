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
    <a href='./commentaires.php'>Commentaires</a>

    <form method="POST" action="">
        <input type="txt" name="prenom" placeholder="Prenom" required/>
        <input type="txt" name="nom" placeholder="Nom" required/>
        <input type="date" name="date" placeholder="Date de naissance" required/>
        <input type="txt" name="cbNumber" placeholder="Numéro de CB" required maxlength="16" />
        <input type="txt" name="ville" placeholder="Ville" required />
        <button type="submit" name="sign_up">Envoyer</button>

            
   
             <?php include("insert_user.php"); ?> 
            <br>
            
    </form>
    <form method="POST" action="">
    <input type = "txt" name ="id_req" placeholder="id delete" >
    <button type="submit" name="delete_user">Supprimer un utilisateur de la base de donnée</button>
    <?php include("delete_user.php"); ?>
    </form>
    </div>
    <?php include("select_user.php"); ?>
    </body>
</html>

