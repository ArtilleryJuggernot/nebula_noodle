
@include("includes.bandeau")

    <!DOCTYPE html>
<html>
<head>
    <title>Liste des transactions actives</title>
    <!-- Ajoutez ici vos liens CSS, scripts, etc. -->
</head>
<body>

<h1>Liste des transactions actives</h1>


    @if(session('success'))
        <h2>{{session('success')}}</h2>
    @endif


@if(session('error'))
    <h2>{{session('error')}}</h2>
@endif

@if($ventesTerminees->isEmpty())
    <p>Il n'y a aucune transaction terminée</p>
@else
    <ul>
        @foreach ($ventesTerminees as $transaction)
            <li>
                <div class="details">
                    <h2>Transaction terminé n° {{$transaction->ID}}</h2>
                    <p class="detail-item">ID de la Vente : {{ $transaction->ID }}</p>
                    <p class="detail-item">Statut : {{ $transaction->Statut }}</p>
                    <p class="detail-item">Date de création : {{ $transaction->DT_CREATION }}</p>
                    <p class="detail-item">Quantité d'item : {{ $transaction->ITEM_QT }}</p>
                    <p class="detail-item">Item: {{ $transaction->item->LIBELLE }}</p>
                    <p class="detail-item">Quantité de pièces : {{ $transaction->PIECE_QT }}</p>
                    <p class="detail-item">Vendeur : <a href="{{ route('profile', ['ID' => $transaction->vendeur->ID]) }}">{{ $transaction->vendeur->user->name }}</a></p>
                    <p class="detail-item">Acheteur : <a href="{{ route('profile', ['ID' => $transaction->acheteur->ID]) }}">{{ $transaction->acheteur->user->name }}</a></p>
                </div>
            </li>
        @endforeach
    </ul>

    <!-- Affichage de la pagination -->
    {{ $ventesTerminees->links() }}
@endif

</body>
</html>

@include("includes.footer")
