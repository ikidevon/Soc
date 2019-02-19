<?php
session_start();
?>


<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=400, initial-scale=1">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

  <title>SOC U13</title>
	

</head>



<body>

<?php 

include('inc/menu.php');
?>

<form action="register_log.php" method="POST">

	<input placeholder="pseudo" name="Pseudo">

		<input placeholder="mdp" name="mdp">

		<input placeholder="email"name="email">


<button type="submit"> ok</button>
</form>









</body>
</html>