<head>
    <link rel="stylesheet" href="/css/boutique.css">
</head>

@include("includes.bandeau")

@if(session('success'))
    <div class="alert alert-success">
        <h1>{{ session('success') }}</h1>
    </div>
@endif


<div>
    <h1 class="text-center">Boutique</h1>

    <h2>Nombre de pièce : {{\Illuminate\Support\Facades\Auth::user()->joueur->COINS}}</h2>

    <div class="offre-speciale">
        <h2>Offre spécial ! </h2>
        @foreach($itemsOffreSpeciale as $item)
            <div class="item-container">
                <img src="/img/items/item_box.jpg" alt="Item Image">
                <div>
                    <h3>{{ $item->LIBELLE }} ({{ $item->itemCategory->LIBELLE }})</h3>
                    @if($item->DESCRIPTION)
                        <p>{{ $item->DESCRIPTION }}</p>
                    @endif
                    <p>Prix : </p><p class="{{$item->ID}}-price">{{$item->INITIAL_PRICE}}</p>
                    @if(Auth::user()->joueur->COINS >= $item->INITIAL_PRICE)
                        <!-- Bouton d'achat actif -->
                        <form method="post" action="{{ route('acheter-item') }}">
                            @csrf <!-- Ajoutez ceci pour assurer la protection contre les attaques CSRF -->

                            <input type="hidden" name="item" value="{{ $item->ID }}">
                            <!-- Reste du formulaire et bouton d'envoi -->
                            <button type="submit">Acheter</button>
                        </form>

                    @else
                        <!-- Bouton d'achat désactivé -->
                        <button disabled>Pas assez de fond</button>
                    @endif

                </div>
            </div>
        @endforeach
    </div>

    <div class="offre-speciale">
        <h2>Sortilège</h2>

        <!-- Affichage des compétences de l'offre spéciale-->
    @foreach($competencesOffreSpeciale as $competence)
        <div class="item-container">
            <img src="/img/items/spell_icon.png" alt="Spell Image">
            <div>
                <h3>{{ $competence->LIBELLE }} (Sortilège de classe {{ $competence->categorie->CAT_LIBELLE }})</h3>
                @if($competence->DESCRIPTION)
                    <p>{{ $competence->DESCRIPTION }}</p>
                @endif
                <p>Prix : </p><p class="{{$competence->ID}}-price">{{$competence->INITIAL_PRICE}}</p>
                @if(Auth::user()->joueur->COINS >= $competence->INITIAL_PRICE)
                    <!-- Bouton d'achat actif -->
                    <form method="post" action="{{ route('acheter-competence') }}">
                        @csrf <!-- Ajoutez ceci pour assurer la protection contre les attaques CSRF -->

                        <input type="hidden" name="competence" value="{{ $competence->ID }}">
                        <!-- Reste du formulaire et bouton d'envoi -->
                        <button type="submit">Acheter</button>
                    </form>

                @else
                    <!-- Bouton d'achat désactivé -->
                    <button disabled>Pas assez de fond</button>
                @endif
            </div>
        </div>
    @endforeach
    </div>
</div>



@include("includes.footer")
