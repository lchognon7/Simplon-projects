<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Dés multifaces pour jeux de rôles">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet"> 
    <title>L'ouvre-boîte - dés</title>
</head>

<img src = "dice.svg">
<h1>L'OUVRE BOÎTE</h1>
   
    <div id="conteneur">
        <form method="POST" action="des.php">
        <div class = "form1">
            <label for="des">Combien de dés souhaitez vous jouer ?</label></br>
            <input name="des" id="des" type="number">
                
        </div> </br>
        <div class = "form2">
            <label for="faces">Combien de faces souhaitez-vous ?</label></br>
            <input name="faces" id="faces" type="number">
        </div>
                <input type="submit" value="LANCER" class = "bouton">
        
    </form>
</div>

</body>
</html>

