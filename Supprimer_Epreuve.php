<?php
    require 'BD.php';

    $Matricule = "";
    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    $Matricule = checkInput($_POST['Matricule']);

    if(isset($_POST["oui"])) 
    {
        $db = database::connect();
        $statement = $db->prepare("DELETE FROM `diplome` WHERE Matricule = ?");
        $statement->execute(array("$Matricule"));
        database::disconnect();
        header("Location: index.php"); 
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Supprimer diplome</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="img/logo.jpg" rel="icon">
        <link href="img/logo.jpg" rel="apple-touch-icon">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    
    <body>
    <div class="container admin">
            <div class="row">
                <h1><strong>Supprimer un diplome</strong></h1>
                <br>
                <form class="form" action="supprimer.php" role="form" method="post">
                    <input type="hidden" name="id" value="<?php echo $Matricule;?>"/>
                    <p class="alert alert-warning">Etes vous sur de vouloir supprimer ?</p>
                    <div class="form-actions">
                      <button type="submit" name="oui" class="btn btn-warning">Oui</button>
                      <a class="btn btn-default" href="index.php">Non</a>
                    </div>
                </form>
            </div>
        </div>   
    </body>
</html>