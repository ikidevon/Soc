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
$req = $bdd->prepare('SELECT count(id) AS Pseudo FROM membres WHERE pseudo = :login');
$req->execute(array('login' => $_POST['Pseudo']));
 
$donnees = $req->fetch();
$nbre_occurences = $donnees['Pseudo'];
$req->closeCursor();

if ($nbre_occurences == 0)
{
    $inscription =$bdd->prepare('INSERT INTO membres VALUES(NULL,:pseudo,:mdp,:email)');

$inscription->bindValue(':pseudo',$_POST['Pseudo'],PDO::PARAM_STR);
$inscription->bindValue(':mdp',sha1($_POST['mdp']),PDO::PARAM_STR);
$inscription->bindValue(':email',$_POST['email'],PDO::PARAM_STR);
$inscriptionok =$inscription->execute();

if($inscriptionok){
    echo "Vous etes inscrit Redirection vers le site dans 5 secondes";
header ("Refresh: 5  ;URL=Membres.php");

}else {
echo "Une erreur est survenu Retour sur le site Redirection vers le site dans 5 secondes ";
header ("Refresh: 5 ;URL=index.php");

}
}
else
{
   echo "Votre pseudo est deja pris Redirection vers le site dans 5 secondes   ";

header ("Refresh: 5 ;URL=index.php");

  // pseudo déjà pris
}


?>
