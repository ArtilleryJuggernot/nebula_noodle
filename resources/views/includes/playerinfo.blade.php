<head>
    <link rel="stylesheet" href="/css/player.css">
</head>

<div class="player-details">
    <p><strong>Nom d'utilisateur:</strong> {{ \Illuminate\Support\Facades\Auth::user()->name }}</p>
    <p><strong>Niveau:</strong> <span class="player-level">{{ \Illuminate\Support\Facades\Auth::user()->joueur->LVL }}</span></p>
    <p><strong>Nombre de pièces:</strong> <span class="player-coins">{{ \Illuminate\Support\Facades\Auth::user()->joueur->COINS }}</span></p>
    <p><strong>Grade Actuel :</strong> <span class="">{{ \Illuminate\Support\Facades\Auth::user()->joueur->GRADE }}</span></p>
    <p><strong>Classe de prédilection :</strong> <span class="">{{ \Illuminate\Support\Facades\Auth::user()->joueur->classePredilection() }}</span></p>

</div>
