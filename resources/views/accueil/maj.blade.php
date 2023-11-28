@include("includes.bandeau")


<div>
    <!-- Affichage des mises à jour -->
    @foreach($misesAJour as $miseAJour)
        <div class="mise-a-jour">
            <h3>{{ $miseAJour->TITRE }}</h3>
            <p>{{ $miseAJour->CONTENU }}</p>
            <p>Date de la mise à jour : {{ \Carbon\Carbon::parse($miseAJour->DT_CREATE)->format('d/m/Y H:i:s') }}</p>
            <p>Auteur : {{ $miseAJour->AUTEUR }}</p>
            <!-- Autres champs à afficher -->
        </div>
    @endforeach

    <!-- Affichage de la pagination -->
    {{ $misesAJour->links() }}

</div>

@include("includes.footer")
