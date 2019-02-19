<?php 
$host="localhost";
$dbname="SOC";
$name="root";
$mdp="";

try
{
  // On se connecte à MySQL
  $bdd = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $name, $mdp);
}
catch(Exception $e)
{
  // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

include('inc/menu.php');

if(isset($_POST["login"]))
      {
           if(empty($_POST["pseudo"]) || empty($_POST["mdp"]))
           {
                $message = '<label>All fields are required</label>';
           }
           else
           {
                $query = "SELECT * FROM membres WHERE Pseudo = :pseudo AND mdp = :mdp";
                $statement = $bdd->prepare($query);
                $statement->execute(
                     array(
                          'pseudo'     =>     $_POST["Pseudo"],
                          'mdp'     =>    sha1( $_POST["mdp"] ) 
                     )
                );
                $count = $statement->rowCount();
                if($count > 0)
                {
                     $_SESSION["Pseudo"] = $_POST["Pseudo"];
                     header("location: Membres.php");
                }
                else
                {
                     $message = '<label>Wrong Data</label>';
                }
           }
      }


?>







<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=400, initial-scale=1">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

  <title>SOC U13</title>
	

</head>

<body style="background-color: green">
	
<form action="login.php" method="POST">
	<input placeholder="pseudo" name="Pseudo">

		<input placeholder="mdp" name="mdp">


		<button type="submit"> ok</button>
</form>
</body>

</html>