<head>
    <link rel="stylesheet" href="/css/player.css">
</head>

<div class="player-details">
    <p>Nom d'utilisateur : <span id="username">{{Auth::user()->name }}</span> - Classe : <span id="classe">{{Auth::user()->joueur->GRADE}}</span></p>
    <p>LVL : <span id="level">{{Auth::user()->joueur->LVL}}</span> - Coins : <span id="coins">{{Auth::user()->joueur->COINS}}</span></p>
</div>
