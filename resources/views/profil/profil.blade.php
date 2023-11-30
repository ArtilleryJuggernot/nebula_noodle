<head>
    <link rel="stylesheet" href="/css/profil.css">
</head>
@include("includes.bandeau")


@if(session('success'))
    <h2>{{session('success')}}</h2>
@endif

@if(session('error'))
    <h2>{{session('error')}}</h2>
@endif

<h1>Profil de : {{$user->name}}</h1>

<div class="profil-block">
    <h2>Descriptif du joueur</h2>
    <div class="player-info">
        <!-- Image de profil -->
        <img src="/img/profile/PP_basic_N&N.png" alt="Image de profil">

        <!-- Informations du joueur -->
        <div class="player-details">
            <p><strong>Nom d'utilisateur:</strong> {{ $user->name }}</p>
            <p><strong>Niveau:</strong> <span class="player-level">{{ $user->joueur->LVL }}</span></p>
            <p><strong>Nombre de pièces:</strong> <span class="player-coins">{{ $user->joueur->COINS }}</span></p>
            <p><strong>Grade Actuel :</strong> <span class="">{{ $user->joueur->GRADE }}</span></p>
            <p><strong>Classe de prédilection :</strong> <span class="">{{ $user->joueur->classePredilection() }}</span></p>

        </div>
    </div>
</div>


<div class="profil-block">
    <h2>Inventaire</h2>
    <div class="categories">
        @foreach($itemsByCategory as $category => $items)
            <h3>{{ $category }}</h3>
            <ul>
                @foreach($items as $item)
                    <li>{{ $item->LIBELLE }} (Quantité : {{ $item->pivot->NB_items }})</li>
                @endforeach
            </ul>
        @endforeach

    </div>

</div>

<div class="competences-block">
    <h2>Compétences par classe</h2>
    @foreach($competencesByClasse as $classe => $competences)
        <div class="classe">
            <h3>{{ $classe }}</h3>
            <ul class="competences-list">
                @foreach($competences as $competence)
                    <li>{{ $competence->LIBELLE }} - Niveau {{ $competence->pivot->Niveau }}</li>
                @endforeach
            </ul>
        </div>
    @endforeach
</div>



@include("includes.footer")
