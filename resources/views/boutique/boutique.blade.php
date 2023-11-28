@include("includes.bandeau")


<div>
    <h1 class="text-center">Boutique</h1>

    <div class="offre-speciale">
        <h2>Offre spéciale</h2>
        <!-- Affichage des items de l'offre spéciale -->
        @foreach($itemsOffreSpeciale as $item)
            <div>
                <h3>{{ $item->LIBELLE }} ({{ $item->itemCategory->LIBELLE }})</h3>
                @if($item->DESCRIPTION)
                    <p>{{ $item->DESCRIPTION }}</p>
                @endif
                <p>Prix : 100</p>
            </div>
        @endforeach

        <h2>Sortilège</h2>
        <!-- Affichage des compétences de l'offre spéciale-->
        @foreach($competencesOffreSpeciale as $competence)
            <div>
                <h3>{{ $competence->LIBELLE }} (Sortilège de classe {{ $competence->competenceCategory->CAT_LIBELLE }})</h3>
                @if($competence->DESCRIPTION)
                    <p>{{ $competence->DESCRIPTION }}</p>
                @endif
                <p>Prix : 100</p>
            </div>
        @endforeach
    </div>


</div>


@include("includes.footer")
