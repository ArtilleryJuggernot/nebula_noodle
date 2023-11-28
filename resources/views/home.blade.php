<h1>Bienvenue {{Auth::user()->name}} sur Nebula Noodle !!!!</h1>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nebula Noodle Accueil</title>
    <link rel="stylesheet" href="/css/player.css">
</head>
<body>

@include("includes.bandeau")


<div class="player-details">
    <p>Nom d'utilisateur : <span id="username">{{Auth::user()->name }}</span> - Classe : <span id="classe">{{Auth::user()->joueur->GRADE}}</span></p>
    <p>LVL : <span id="level">{{Auth::user()->joueur->LVL}}</span> - Coins : <span id="coins">{{Auth::user()->joueur->COINS}}</span></p>
</div>


@include("includes.footer")

</body>
</html>


<style>

</style>
