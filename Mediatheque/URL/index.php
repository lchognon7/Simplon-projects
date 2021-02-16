<?php

// Exercice 1

if(isset($_GET['nom'])&& isset($_GET['prenom'])){
    echo $_GET['nom'].$_GET['prenom'];
    }
else{
    echo 'Ces paramètres n\'existent pas';
    }

// Exercice 2

if(isset($_GET['age'])){
    echo $_GET['age'];
    }
else{
    echo 'Ces paramètres n\'existent pas';
    }

// Exercice 3

if(isset($_GET['dateDebut'])&& isset($_GET['dateFin'])){
    echo $_GET['dateDebut'].$_GET['dateFin'];
    }
else{
    echo 'Ces paramètres n\'existent pas';
    }
    
// Exercice 4

if(isset($_GET['langage'])&& isset($_GET['serveur'])){
    echo $_GET['langage'].$_GET['serveur'];
    }
else{
    echo 'Ces paramètres n\'existent pas';
    }

// Exercice 5

if(isset($_GET['semaine'])){
    echo $_GET['semaine'];
    }
else{
    echo 'Ces paramètres n\'existent pas';
    }

// Exercice 6

if(isset($_GET['batiment'])&& isset($_GET['salle'])){
    echo $_GET['batiment'].$_GET['salle'];
    }
else{
    echo 'Ces paramètres n\'existent pas';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!-- exercice 1 -->

    <form action="user.php" method='GET'>
    <input type="text" name="nomget" placeholder="nom">
    <input type="text" name="prenomget" placeholder="prenom">
    <input type="submit">
    </form>

<!-- Exercice 2 -->

    <form action="user.php" method='POST'>
    <input type="text" name="nompost" placeholder="nom">
    <input type="text" name="prenompost" placeholder="prenom">
    <input type="submit">
    </form>

<!-- exercice 5, 7 et 8-->

    <form action="index.php" method="POST">
        <select name="mrmme" id="mrmme">
            <option value="mr">mr</option>
            <option value="mme">mme</option>
        </select>
    <input type="text" name="nomform" placeholder="nom">
    <input type="text" name="prenomform" placeholder="prenom">
    <input type="file" name ="file" accept="pdf">
    <input type="submit">
    </form>

<?php

// Exercice 6 et 7

if(!empty($_POST['mrmme'])&&!empty($_POST['nomform'])&&!empty($_POST['prenomform'])){
    echo $_POST['mrmme'];
    echo $_POST['nomform'];
    echo $_POST['prenomform'];
    echo $_POST['file'];
}
else{
    echo "<form action='index.php' method='GET'>
    <select name='mrmme' id='mrmme'>
        <option value='mr'>mr</option>
        <option value='mme'>mme</option>
    </select>
    <input type='text' name='nomform' placeholder='nom'>
    <input type='text' name='prenomform' placeholder='prenom'>
    <input type='submit'>
    </form>";
}

// Exercice 8

$info = new SplFileInfo($_POST['file']);
var_dump($info->getExtension());

if($info == 'pdf'){
    echo 'c\'est bien un pdf';
}
else{
    echo 'Ce n\'est pas un pdf';
}



?>


</body>
</html>
